<?php
// owner/rentals.php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection
require_once '../db/db.php';

// Check if owner is logged in
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'owner') {
    header('Location: ../owner/login.php');
    exit();
}

$ownerId = $_SESSION['id'];

// Fetch rentals for the owner
$sql = "SELECT r.*, p.name AS product_name, u.name AS renter_name
        FROM rentals r
        INNER JOIN products p ON r.product_id = p.id
        INNER JOIN users u ON r.renter_id = u.id
        WHERE r.owner_id = :ownerId
        ORDER BY r.created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':ownerId', $ownerId, PDO::PARAM_INT);
$stmt->execute();
$rentals = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calculate remaining_days for each rental
foreach ($rentals as &$rental) {
    if (in_array($rental['current_status'], ['completed', 'returned'])) {
        $rental['remaining_days'] = 'Completed';
    } elseif (!empty($rental['end_date'])) { // Ensure correct field name
        $today = new DateTime();
        $endDate = new DateTime($rental['end_date']);
        $interval = $today->diff($endDate);
        $days = (int)$interval->format('%R%a'); // %R gives the sign

        if ($days > 0) {
            $rental['remaining_days'] = $days . ' day' . ($days > 1 ? 's' : '');
        } elseif ($days < 0) {
            $rental['remaining_days'] = 'Overdue';
        } else {
            $rental['remaining_days'] = 'Due Today';
        }
    } else {
        $rental['remaining_days'] = 'N/A';
    }
}
unset($rental); // Break the reference

?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <title>Rentals Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Existing styles */
        #sidebarMenu {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding-top: 56px;
            overflow-x: hidden;
            overflow-y: auto;
            background-color: #f8f9fa;
        }
        main {
            padding-top: 56px;
        }
        @media (max-width: 768px) {
            #sidebarMenu {
                position: relative;
                height: auto;
                padding-top: 0;
            }
            main {
                padding-top: 0;
            }
        }
    </style>
</head>
<body>
    <?php include '../owner/includes/owner-header-sidebar.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="bg-secondary-subtle my-3">
                    <div class="card rounded-3">
                        <div class="d-flex justify-content-between align-items-center mt-4 mb-2 mx-5">
                            <h2 class="mb-0">Rentals Management</h2>
                        </div>

                        <!-- Success Message -->
                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success alert-dismissible fade show mx-5" role="alert">
                                <?= htmlspecialchars($_SESSION['success']) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php unset($_SESSION['success']); ?>
                        <?php endif; ?>

                        <!-- Error Message -->
                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger alert-dismissible fade show mx-5" role="alert">
                                <?= htmlspecialchars($_SESSION['error']) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php unset($_SESSION['error']); ?>
                        <?php endif; ?>

                        <div class="card-body rounded-5">
                            <div class="table-container">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered text-center">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No.</th>
                                                <th>Renter Name</th>
                                                <th>Product Name</th>
                                                <th>Start Date</th>
                                                <th>Due Date</th>
                                                <th>Days Remaining</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
    <?php if (!empty($rentals)): ?>
        <?php foreach ($rentals as $index => $rental): ?>
            <tr>
                <td><?= htmlspecialchars($index + 1) ?></td>
                <td><?= htmlspecialchars($rental['renter_name'] ?? 'Unknown') ?></td>
                <td><?= htmlspecialchars($rental['product_name'] ?? 'Unknown') ?></td>
                <td><?= htmlspecialchars($rental['start_date'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($rental['end_date'] ?? 'N/A') ?></td>
                <td>
                    <?php if ($rental['remaining_days'] === 'Completed'): ?>
                        <span class="badge bg-success"><?= htmlspecialchars($rental['remaining_days']) ?></span>
                    <?php elseif ($rental['remaining_days'] === 'Overdue'): ?>
                        <span class="badge bg-danger"><?= htmlspecialchars($rental['remaining_days']) ?></span>
                    <?php elseif ($rental['remaining_days'] === 'Due Today'): ?>
                        <span class="badge bg-warning text-dark"><?= htmlspecialchars($rental['remaining_days']) ?></span>
                    <?php elseif ($rental['remaining_days'] !== 'N/A'): ?>
                        <span class="badge bg-<?= ($rental['remaining_days'] > 0) ? 'success' : 'danger' ?>">
                            <?= $rental['remaining_days'] > 0 ? $rental['remaining_days'] . ' day' . ($rental['remaining_days'] > 1 ? 's' : '') : 'Overdue' ?>
                        </span>
                    <?php else: ?>
                        <span class="badge bg-secondary">N/A</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php
                    // Handle status display with defaults using 'current_status'
                    $statusClass = 'secondary'; // Default class for unknown statuses
                    $statusLabel = 'Unknown';

                    // Assuming 'current_status' is the correct field. Adjust if necessary.
                    switch ($rental['current_status'] ?? 'unknown') {
                        case 'pending_confirmation':
                            $statusClass = 'warning';
                            $statusLabel = 'Pending Confirmation';
                            break;
                        case 'approved':
                            $statusClass = 'primary';
                            $statusLabel = 'Approved';
                            break;
                        case 'delivery_in_progress':
                            $statusClass = 'info';
                            $statusLabel = 'Delivery in Progress';
                            break;
                        case 'delivered':
                            $statusClass = 'info';
                            $statusLabel = 'Delivered';
                            break;
                        case 'completed':
                            $statusClass = 'success';
                            $statusLabel = 'Completed';
                            break;
                        case 'returned':
                            $statusClass = 'success';
                            $statusLabel = 'Returned';
                            break;
                        case 'cancelled':
                            $statusClass = 'danger';
                            $statusLabel = 'Cancelled';
                            break;
                        case 'overdue':
                            $statusClass = 'danger';
                            $statusLabel = 'Overdue';
                            break;
                        default:
                            $statusClass = 'secondary';
                            $statusLabel = 'Unknown';
                            break;
                    }
                    ?>
                    <span class="badge bg-<?= $statusClass ?>"><?= htmlspecialchars($statusLabel) ?></span>
                </td>
                <td>
                    <!-- Only View Button -->
                    <a href="view_rental.php?rental_id=<?= htmlspecialchars($rental['id']) ?>" class="btn btn-info btn-sm">View</a>
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
                        </div>
                    </div>
                </main>
            </div>
        </div>

    </body>
</html>