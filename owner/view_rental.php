<?php
// owner/view_rental.php
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

// Get rental ID from query parameters
if (!isset($_GET['rental_id'])) {
    header('Location: rentals.php');
    exit();
}

$rentalId = intval($_GET['rental_id']);

// Fetch rental details
$sql = "SELECT r.*, p.name AS product_name, u.name AS renter_name
        FROM rentals r
        INNER JOIN products p ON r.product_id = p.id
        INNER JOIN users u ON r.renter_id = u.id
        WHERE r.id = :rentalId AND r.owner_id = :ownerId";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':rentalId', $rentalId, PDO::PARAM_INT);
$stmt->bindParam(':ownerId', $ownerId, PDO::PARAM_INT);
$stmt->execute();
$rental = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$rental) {
    $_SESSION['error'] = "Rental not found.";
    header('Location: rentals.php');
    exit();
}

// Handle form submission for uploading proof
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Determine which action is being performed based on a hidden input
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'upload_proof' && isset($_FILES['proof_of_delivery'])) {
            $uploadDir = '../img/proofs/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $uploadFile = $uploadDir . basename($_FILES['proof_of_delivery']['name']);

            // Validate the uploaded file
            $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES['proof_of_delivery']['tmp_name']);
            if($check !== false && in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                // Generate a unique filename to prevent overwriting
                $uniqueName = uniqid('proof_', true) . '.' . $imageFileType;
                $uploadFile = $uploadDir . $uniqueName;

                if (move_uploaded_file($_FILES['proof_of_delivery']['tmp_name'], $uploadFile)) {
                    // Update rental with proof and change status to 'delivered'
                    $updateSql = "UPDATE rentals SET proof_of_delivery = :proof, current_status = 'delivered' WHERE id = :rentalId";
                    $updateStmt = $conn->prepare($updateSql);
                    $updateStmt->bindParam(':proof', $uploadFile, PDO::PARAM_STR);
                    $updateStmt->bindParam(':rentalId', $rentalId, PDO::PARAM_INT);
                    $updateStmt->execute();

                    $_SESSION['success'] = "Proof of delivery uploaded successfully.";
                    header("Location: view_rental.php?rental_id=$rentalId");
                    exit();
                } else {
                    $_SESSION['error'] = "Failed to upload the proof.";
                }
            } else {
                $_SESSION['error'] = "Invalid file type. Only images are allowed.";
            }
        } elseif ($action === 'approve') {
            // Approve the rental
            $updateSql = "UPDATE rentals SET current_status = 'approved' WHERE id = :rentalId";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bindParam(':rentalId', $rentalId, PDO::PARAM_INT);
            $updateStmt->execute();

            $_SESSION['success'] = "Rental approved successfully.";
            header("Location: view_rental.php?rental_id=$rentalId");
            exit();
        } elseif ($action === 'cancel') {
            // Cancel the rental
            $updateSql = "UPDATE rentals SET current_status = 'cancelled' WHERE id = :rentalId";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bindParam(':rentalId', $rentalId, PDO::PARAM_INT);
            $updateStmt->execute();

            $_SESSION['success'] = "Rental cancelled successfully.";
            header("Location: view_rental.php?rental_id=$rentalId");
            exit();
        } elseif ($action === 'start_rent') {
            // Start the rent countdown
            $today = date('Y-m-d');
            $updateSql = "UPDATE rentals SET current_status = 'rent_started', rent_start_date = :today WHERE id = :rentalId";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bindParam(':today', $today, PDO::PARAM_STR);
            $updateStmt->bindParam(':rentalId', $rentalId, PDO::PARAM_INT);
            $updateStmt->execute();

            $_SESSION['success'] = "Rent countdown started successfully.";
            header("Location: view_rental.php?rental_id=$rentalId");
            exit();
        }
    }
}

// Status progression for display
$statusFlow = [
    'pending_confirmation' => 'Rent Pending',
    'approved' => 'Rent Confirmed',
    'delivery_in_progress' => 'Delivery in Progress',
    'delivered' => 'Delivered',
    'completed' => 'Completed',
    'returned' => 'Returned',
    'cancelled' => 'Cancelled',
    'overdue' => 'Overdue'
];

$currentStatus = $rental['current_status'];

// Helper function to determine if a status should be active
function isStatusActive($statusKey, $currentStatus, $statusFlow) {
    $keys = array_keys($statusFlow);
    $currentIndex = array_search($currentStatus, $keys);
    $statusIndex = array_search($statusKey, $keys);

    if ($statusIndex === false) {
        return false;
    }

    return $statusIndex <= $currentIndex;
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>View Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* Ensure content is not blocked by header and sidebar */
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 56px;
        background-color: #343a40;
        color: white;
        display: flex;
        align-items: center;
        padding: 0 20px;
        z-index: 101;
        border-bottom: 1px solid #ddd;
    }

    #sidebarMenu {
        position: fixed;
        top: 56px; /* Matches the header height */
        bottom: 0;
        left: 0;
        width: 240px;
        background-color: #f8f9fa;
        border-right: 1px solid #ddd;
        z-index: 100;
        overflow-y: auto;
    }

    main {
        margin-left: 240px; /* Matches the sidebar width */
        margin-top: 56px; /* Matches the header height */
        padding: 20px;
        display: flex; /* Flexbox to center content */
        flex-direction: column;
        align-items: center; /* Horizontally center content */
        justify-content: flex-start; /* Vertically align to the top with some spacing */
        min-height: calc(100vh - 56px); /* Full viewport height minus header */
        background-color: #f9f9f9;
    }

    .card {
        width: 100%;
        max-width: 800px; /* Limits the content width */
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-top: 20px; /* Add spacing between multiple cards if present */
    }

    @media (max-width: 768px) {
        #sidebarMenu {
            position: relative;
            width: 100%;
            height: auto;
            border-right: none;
        }

        main {
            margin-left: 0;
            margin-top: 56px; /* Matches the header height */
        }
    }
    </style>
</head>
<body>
    <?php include '../owner/includes/owner-header-sidebar.php'; ?>
    <main>
        <div class="container mt-4">
            <h2>Rental Details</h2>

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

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Product: <?= htmlspecialchars($rental['product_name']) ?></h5>
                    <p class="card-text"><strong>Renter:</strong> <?= htmlspecialchars($rental['renter_name']) ?></p>
                    <p class="card-text"><strong>Start Date:</strong> <?= htmlspecialchars($rental['start_date']) ?></p>
                    <p class="card-text"><strong>End Date:</strong> <?= htmlspecialchars($rental['end_date']) ?></p>
                    <p class="card-text"><strong>Status:</strong> <?= htmlspecialchars(ucfirst(str_replace('_', ' ', $rental['current_status']))) ?></p>

                    <!-- Display Proofs -->
                    <div class="mb-3">
                        <h6>Proof of Delivery:</h6>
                        <?php if ($rental['proof_of_delivery']): ?>
                            <img src="<?= htmlspecialchars($rental['proof_of_delivery']) ?>" alt="Proof of Delivery" class="img-thumbnail" width="200">
                        <?php else: ?>
                            <p>No proof uploaded.</p>
                        <?php endif; ?>
                    </div>

                    <!-- Action Buttons Based on Status -->
                    <div class="mb-3">
                        <?php
                        // Determine which buttons to show based on current_status
                        switch ($rental['current_status']) {
                            case 'pending_confirmation':
                                // Approve and Cancel Buttons
                                ?>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="action" value="approve">
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="action" value="cancel">
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </form>
                                <?php
                                break;
                            case 'approved':
                                // Upload Proof of Delivery Form
                                ?>
                                <form method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="action" value="upload_proof">
                                    <div class="mb-3">
                                        <label for="proof_of_delivery" class="form-label">Upload Proof of Delivery</label>
                                        <input class="form-control" type="file" id="proof_of_delivery" name="proof_of_delivery" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Upload Proof</button>
                                </form>
                                <?php
                                break;
                            case 'delivered':
                                // Start Rent Button
                                ?>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="action" value="start_rent">
                                    <button type="submit" class="btn btn-warning">Start Rent</button>
                                </form>
                                <?php
                                break;
                            case 'rent_started':
                                // Display Countdown or Rent Started Message
                                ?>
                                <span class="badge bg-success">Rent Countdown Started</span>
                                <?php
                                break;
                            // Add more cases as needed for other statuses
                            default:
                                // No action available
                                ?>
                                <span class="badge bg-secondary">No Action Available</span>
                                <?php
                                break;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>