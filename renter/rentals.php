<?php
// renter/rentals.php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection
require_once '../db/db.php';

// Check if renter is logged in
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'renter') {
    header('Location: ../renter/login.php');
    exit();
}

$renterId = $_SESSION['id'];

// Handle AJAX request for fetching rentals
if (isset($_GET['action']) && $_GET['action'] === 'fetch_rentals') {
    header('Content-Type: application/json');

    // Fetch rentals for the renter
    $sql = "SELECT r.*, p.name AS product_name, p.brand, p.image, p.rental_period, p.rental_price, u.name AS owner_name
            FROM rentals r
            INNER JOIN products p ON r.product_id = p.id
            INNER JOIN users u ON r.owner_id = u.id
            WHERE r.renter_id = :renterId
            ORDER BY r.created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':renterId', $renterId, PDO::PARAM_INT);
    $stmt->execute();
    $rentals = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Calculate remaining_days for each rental
    foreach ($rentals as &$rental) {
        if ($rental['current_status'] === 'returned') {
            $rental['remaining_days'] = 'Completed';
        } elseif ($rental['current_status'] === 'cancelled') {
            $rental['remaining_days'] = 'Cancelled';
        } elseif (!empty($rental['end_date'])) {
            $today = new DateTime();
            $endDate = new DateTime($rental['end_date']);
            $interval = $today->diff($endDate);
            $days = (int)$interval->format('%R%a'); // %R gives the sign

            if ($days > 0) {
                $rental['remaining_days'] = $days;
            } elseif ($days < 0) {
                $rental['remaining_days'] = $days;
            } else {
                $rental['remaining_days'] = 0;
            }
        } else {
            $rental['remaining_days'] = 'N/A';
        }
    }
    unset($rental); // Break reference

    echo json_encode(['rentals' => $rentals]);
    exit();
}

// Initialize rentals variable to avoid the warning
$rentals = [];

// Fetch rentals for the renter
$sql = "SELECT r.*, p.name AS product_name, p.brand, p.image, p.rental_period, p.rental_price, u.name AS owner_name
        FROM rentals r
        INNER JOIN products p ON r.product_id = p.id
        INNER JOIN users u ON r.owner_id = u.id
        WHERE r.renter_id = :renterId
        ORDER BY r.created_at DESC"; // Optional: Order by creation date
$stmt = $conn->prepare($sql);
$stmt->bindParam(':renterId', $renterId, PDO::PARAM_INT);
$stmt->execute();
$rentals = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calculate remaining_days for each rental
foreach ($rentals as &$rental) {
    if ($rental['current_status'] === 'returned') {
        $rental['remaining_days'] = 'Completed';
    } elseif ($rental['current_status'] === 'cancelled') {
        $rental['remaining_days'] = 'Cancelled';
    } elseif (!empty($rental['end_date'])) {
        $today = new DateTime();
        $endDate = new DateTime($rental['end_date']);
        $interval = $today->diff($endDate);
        $days = (int)$interval->format('%R%a'); // %R gives the sign

        if ($days > 0) {
            $rental['remaining_days'] = $days;
        } elseif ($days < 0) {
            $rental['remaining_days'] = $days;
        } else {
            $rental['remaining_days'] = 0;
        }
    } else {
        $rental['remaining_days'] = 'N/A';
    }
}
unset($rental); // Break reference

// Helper functions
function getStatusBadgeColor($status) {
    switch($status) {
        case 'pending_confirmation':
            return 'warning';
        case 'approved':
            return 'success';
        case 'delivery_in_progress':
            return 'info';
        case 'delivered':
            return 'info';
        case 'completed':
            return 'success';
        case 'returned':
            return 'success';
        case 'cancelled':
            return 'danger';
        case 'overdue':
            return 'danger';
        default:
            return 'secondary';
    }
}

function getRemainingDaysBadgeColor($remaining_days) {
    if ($remaining_days === 'Completed') {
        return 'success';
    } elseif ($remaining_days === 'Cancelled') {
        return 'danger';
    } elseif ($remaining_days === 'N/A') {
        return 'secondary';
    } elseif ($remaining_days > 0) {
        return 'success';
    } elseif ($remaining_days < 0) {
        return 'danger';
    } else { // $remaining_days == 0
        return 'warning';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Rentals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        main {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: auto;
            padding-top: 20px;
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 100%;
            max-width: 1200px;
            padding: 2rem;
        }
        .table-responsive {
            max-height: 70vh;
            overflow-y: auto;
        }
        .img-thumbnail {
            height: 100px; /* Consistent small size */
            width: 100px; /* Equal to height for a square appearance */
            object-fit: cover; /* Fit image without distortion */
            margin: auto; /* Center within the cell */
        }
        .table th,
        .table td {
            vertical-align: middle; /* Align content centrally */
            text-align: center; /* Center text and images */
            height: 50px; /* Consistent row height */
        }
        .progress-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
            margin-bottom: 30px;
            position: relative;
        }
        .progress-line {
            position: absolute;
            top: 50%;
            left: 5%;
            width: 90%;
            height: 4px;
            background-color: #ddd;
            z-index: 1;
        }
        .progress-step {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 16.6%; /* Adjust width for 6 steps */
        }
        .progress-step .circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #ddd;
            margin: 0 auto;
            position: relative;
        }
        .progress-step.active .circle {
            background-color: #28a745;
        }
        .progress-step .label {
            margin-top: 10px;
            font-weight: bold;
            color: #6c757d;
        }
        .progress-step.active .label {
            color: #28a745;
        }
    </style>
</head>
<body>
    <?php require_once '../includes/navbar.php'; ?>

    <main>
        <div class="card">
            <h2 class="text-center mb-4">My Rentals</h2>

            <!-- Success Message -->
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= htmlspecialchars($_SESSION['success']) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <!-- Error Message -->
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= htmlspecialchars($_SESSION['error']) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Gadget</th>
                            <th>Owner</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Remaining Days</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="rentals-table-body">
                        <?php if (!empty($rentals)): ?>
                            <?php foreach ($rentals as $index => $rental): ?>
                                <tr>
                                    <td><?= htmlspecialchars($index + 1) ?></td>
                                    <td>
                                        <div class="d-flex flex-column align-items-center">
                                            <img src="../img/uploads/<?= htmlspecialchars($rental['image']) ?>" 
                                                 alt="<?= htmlspecialchars($rental['product_name']) ?>" 
                                                 class="img-thumbnail">
                                            <p class="small mt-1 mb-0"><?= htmlspecialchars($rental['product_name']) ?> (<?= htmlspecialchars($rental['brand']) ?>)</p>
                                        </div>
                                    </td>
                                    <td><?= htmlspecialchars($rental['owner_name'] ?? 'Unknown') ?></td>
                                    <td><?= htmlspecialchars($rental['start_date'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($rental['end_date'] ?? 'N/A') ?></td>
                                    <td>
                                        <span class="badge bg-<?= getStatusBadgeColor($rental['current_status']) ?>">
                                            <?= htmlspecialchars(ucfirst(str_replace('_', ' ', $rental['current_status']))) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php
                                        // Determine the display for remaining_days
                                        if ($rental['remaining_days'] === 'Completed') {
                                            $remainingDisplay = 'Completed';
                                            $badgeColor = 'success';
                                        } elseif ($rental['remaining_days'] === 'Cancelled') {
                                            $remainingDisplay = 'Cancelled';
                                            $badgeColor = 'danger';
                                        } elseif ($rental['remaining_days'] === 'N/A') {
                                            $remainingDisplay = 'N/A';
                                            $badgeColor = 'secondary';
                                        } elseif ($rental['remaining_days'] > 0) {
                                            $remainingDisplay = $rental['remaining_days'] . ' day' . ($rental['remaining_days'] > 1 ? 's left' : ' left');
                                            $badgeColor = 'success';
                                        } elseif ($rental['remaining_days'] < 0) {
                                            $remainingDisplay = abs($rental['remaining_days']) . ' day' . (abs($rental['remaining_days']) > 1 ? 's overdue' : ' overdue');
                                            $badgeColor = 'danger';
                                        } else { // $rental['remaining_days'] === 0
                                            $remainingDisplay = 'Due Today';
                                            $badgeColor = 'warning text-dark';
                                        }
                                        ?>
                                        <span class="badge bg-<?= $badgeColor ?>"><?= htmlspecialchars($remainingDisplay) ?></span>
                                    </td>
                                    <td>
                                        <a href="rental_details.php?rental_id=<?= htmlspecialchars($rental['id']) ?>" class="btn btn-info btn-sm">View</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">No rentals found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to fetch rentals and update the table
        async function fetchRentals() {
            try {
                const response = await fetch('rentals.php?action=fetch_rentals');
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const data = await response.json();
                const rentals = data.rentals;
                const tbody = document.getElementById('rentals-table-body');
                tbody.innerHTML = ''; // Clear existing rows

                if (rentals.length > 0) {
                    rentals.forEach((rental, index) => {
                        // Determine badge color based on status
                        let statusColor = getStatusBadgeColor(rental.current_status);

                        // Determine remaining days badge color and display text
                        let remainingColor = '';
                        let remainingText = '';

                        if (rental.remaining_days === 'Completed') {
                            remainingColor = 'success';
                            remainingText = 'Completed';
                        } else if (rental.remaining_days === 'Cancelled') {
                            remainingColor = 'danger';
                            remainingText = 'Cancelled';
                        } else if (rental.remaining_days === 'N/A') {
                            remainingColor = 'secondary';
                            remainingText = 'N/A';
                        } else if (rental.remaining_days > 0) {
                            remainingColor = 'success';
                            remainingText = rental.remaining_days + ' day' + (rental.remaining_days > 1 ? 's left' : ' left');
                        } else if (rental.remaining_days < 0) {
                            remainingColor = 'danger';
                            remainingText = Math.abs(rental.remaining_days) + ' day' + (Math.abs(rental.remaining_days) > 1 ? 's overdue' : ' overdue');
                        } else { // rental.remaining_days === 0
                            remainingColor = 'warning text-dark';
                            remainingText = 'Due Today';
                        }

                        // Create table row
                        const tr = document.createElement('tr');

                        tr.innerHTML = `
                            <td>${index + 1}</td>
                            <td>
                                <div class="d-flex flex-column align-items-center">
                                    <img src="../img/uploads/${rental.image}" 
                                         alt="${rental.product_name}" 
                                         class="img-thumbnail">
                                    <p class="small mt-1 mb-0">${rental.product_name} (${rental.brand})</p>
                                </div>
                            </td>
                            <td>${rental.owner_name || 'Unknown'}</td>
                            <td>${rental.start_date || 'N/A'}</td>
                            <td>${rental.end_date || 'N/A'}</td>
                            <td>
                                <span class="badge bg-${statusColor}">
                                    ${rental.current_status.charAt(0).toUpperCase() + rental.current_status.slice(1).replace(/_/g, ' ')}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-${remainingColor}">
                                    ${remainingText}
                                </span>
                            </td>
                            <td>
                                <a href="rental_details.php?rental_id=${rental.id}" class="btn btn-info btn-sm">View</a>
                            </td>
                        `;
                        tbody.appendChild(tr);
                    });
                } else {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td colspan="8" class="text-center">No rentals found.</td>
                    `;
                    tbody.appendChild(tr);
                }
            } catch (error) {
                console.error('Error fetching rentals:', error);
            }
        }

        // Helper function to determine status badge color
        function getStatusBadgeColor(status) {
            switch(status) {
                case 'pending_confirmation':
                    return 'warning';
                case 'approved':
                    return 'success';
                case 'delivery_in_progress':
                    return 'info';
                case 'delivered':
                    return 'info';
                case 'completed':
                    return 'success';
                case 'returned':
                    return 'success';
                case 'cancelled':
                    return 'danger';
                case 'overdue':
                    return 'danger';
                default:
                    return 'secondary';
            }
        }

        // Initial fetch
        fetchRentals();

        // Fetch rentals every 10 seconds
        setInterval(fetchRentals, 10000);
    </script>
</body>
</html>