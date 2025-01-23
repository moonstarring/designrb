<?php
// renter/rental_details.php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection
require_once '../db/db.php';

// Check if user is logged in
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'renter') {
    header('Location: ../renter/login.php');
    exit();
}

// Get rental ID from query parameters
if (!isset($_GET['rental_id'])) {
    header('Location: rentals.php'); // Redirect back if rental_id is not provided
    exit();
}

$rentalId = intval($_GET['rental_id']);

// Fetch rental details
$sql = "SELECT r.*, p.name AS product_name, p.brand, p.image, p.rental_period, p.rental_price, 
               u.name AS owner_name, u.email AS owner_email, p.id AS product_id
        FROM rentals r
        INNER JOIN products p ON r.product_id = p.id
        INNER JOIN users u ON r.owner_id = u.id
        WHERE r.id = :rentalId AND r.renter_id = :renterId";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':rentalId', $rentalId, PDO::PARAM_INT);
$stmt->bindParam(':renterId', $_SESSION['id'], PDO::PARAM_INT);
$stmt->execute();

$rental = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$rental) {
    $_SESSION['error'] = "Rental not found.";
    header('Location: rentals.php');
    exit();
}

// Determine if the rental is overdue
$currentDate = date('Y-m-d');
$isOverdue = false;
if ($rental['end_date'] && $currentDate > $rental['end_date'] && !in_array($rental['current_status'], ['returned', 'completed', 'cancelled', 'overdue'])) {
    $isOverdue = true;
    // Update status to 'overdue' in the database
    $updateStatusSql = "UPDATE rentals SET current_status = 'overdue' WHERE id = :rentalId";
    $updateStatusStmt = $conn->prepare($updateStatusSql);
    $updateStatusStmt->bindParam(':rentalId', $rentalId, PDO::PARAM_INT);
    $updateStatusStmt->execute();
    $rental['current_status'] = 'overdue';
}

// Update $currentStatus after potential status change
$currentStatus = $rental['current_status'];

// Handle form submissions for uploading proofs
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF Protection
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $_SESSION['error'] = "Invalid CSRF token.";
        header("Location: rental_details.php?rental_id=$rentalId");
        exit();
    }

    // Upload Proof of Delivery
    if (isset($_FILES['proof_of_delivered']) && $currentStatus === 'delivery_in_progress') {
        $uploadDir = '../img/proofs/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $uploadFile = $uploadDir . basename($_FILES['proof_of_delivered']['name']);

        // Validate the uploaded file
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES['proof_of_delivered']['tmp_name']);
        if ($check !== false && in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            // Generate a unique filename to prevent overwriting
            $uniqueName = uniqid('proof_delivered_', true) . '.' . $imageFileType;
            $uploadFile = $uploadDir . $uniqueName;

            if (move_uploaded_file($_FILES['proof_of_delivered']['tmp_name'], $uploadFile)) {
                // Begin Transaction
                $conn->beginTransaction();
                try {
                    // Update rental with proof and status
                    $updateSql = "UPDATE rentals SET proof_of_delivered = :proof, current_status = 'delivered' WHERE id = :rentalId";
                    $updateStmt = $conn->prepare($updateSql);
                    $updateStmt->bindParam(':proof', $uploadFile, PDO::PARAM_STR);
                    $updateStmt->bindParam(':rentalId', $rentalId, PDO::PARAM_INT);
                    $updateStmt->execute();

                    // Fetch current product quantity
                    $productId = $rental['product_id'];
                    $quantitySql = "SELECT quantity FROM products WHERE id = :productId FOR UPDATE";
                    $quantityStmt = $conn->prepare($quantitySql);
                    $quantityStmt->bindParam(':productId', $productId, PDO::PARAM_INT);
                    $quantityStmt->execute();
                    $currentQuantity = $quantityStmt->fetchColumn();

                    if ($currentQuantity > 0) {
                        // Decrease quantity by 1
                        $newQuantity = $currentQuantity - 1;
                        $updateQuantitySql = "UPDATE products SET quantity = :newQuantity WHERE id = :productId";
                        $updateQuantityStmt = $conn->prepare($updateQuantitySql);
                        $updateQuantityStmt->bindParam(':newQuantity', $newQuantity, PDO::PARAM_INT);
                        $updateQuantityStmt->bindParam(':productId', $productId, PDO::PARAM_INT);
                        $updateQuantityStmt->execute();

                        // Commit Transaction
                        $conn->commit();

                        // Update local variables
                        $currentStatus = 'delivered';
                        $rental['current_status'] = 'delivered';

                        $_SESSION['success'] = "Proof of delivery uploaded successfully.";
                        header("Location: rental_details.php?rental_id=$rentalId");
                        exit();
                    } else {
                        // Rollback if no quantity available
                        $conn->rollBack();
                        $_SESSION['error'] = "Cannot confirm rental. Product is out of stock.";
                    }
                } catch (Exception $e) {
                    // Rollback on error
                    $conn->rollBack();
                    $_SESSION['error'] = "An error occurred while updating the rental.";
                    // Optionally log the error: error_log($e->getMessage());
                }
            } else {
                $_SESSION['error'] = "Failed to upload the proof.";
            }
        } else {
            $_SESSION['error'] = "Invalid file type. Only images are allowed.";
        }
    }

    // Upload Proof of Returned
    if (isset($_FILES['proof_of_returned']) && $currentStatus === 'completed') {
        $uploadDir = '../img/proofs/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $uploadFile = $uploadDir . basename($_FILES['proof_of_returned']['name']);

        // Validate the uploaded file
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES['proof_of_returned']['tmp_name']);
        if ($check !== false && in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            // Generate a unique filename to prevent overwriting
            $uniqueName = uniqid('proof_returned_', true) . '.' . $imageFileType;
            $uploadFile = $uploadDir . $uniqueName;

            if (move_uploaded_file($_FILES['proof_of_returned']['tmp_name'], $uploadFile)) {
                // Begin Transaction
                $conn->beginTransaction();
                try {
                    // Update rental with proof, status, and end_date
                    $updateSql = "UPDATE rentals SET proof_of_returned = :proof, current_status = 'returned', end_date = :endDate WHERE id = :rentalId";
                    $updateStmt = $conn->prepare($updateSql);
                    $updateStmt->bindParam(':proof', $uploadFile, PDO::PARAM_STR);
                    $endDate = date('Y-m-d'); // Current date
                    $updateStmt->bindParam(':endDate', $endDate, PDO::PARAM_STR);
                    $updateStmt->bindParam(':rentalId', $rentalId, PDO::PARAM_INT);
                    $updateStmt->execute();

                    // Fetch current product quantity
                    $productId = $rental['product_id'];
                    $quantitySql = "SELECT quantity FROM products WHERE id = :productId FOR UPDATE";
                    $quantityStmt = $conn->prepare($quantitySql);
                    $quantityStmt->bindParam(':productId', $productId, PDO::PARAM_INT);
                    $quantityStmt->execute();
                    $currentQuantity = $quantityStmt->fetchColumn();

                    // Increase quantity by 1
                    $newQuantity = $currentQuantity + 1;
                    $updateQuantitySql = "UPDATE products SET quantity = :newQuantity WHERE id = :productId";
                    $updateQuantityStmt = $conn->prepare($updateQuantitySql);
                    $updateQuantityStmt->bindParam(':newQuantity', $newQuantity, PDO::PARAM_INT);
                    $updateQuantityStmt->bindParam(':productId', $productId, PDO::PARAM_INT);
                    $updateQuantityStmt->execute();

                    // Commit Transaction
                    $conn->commit();

                    // Update local variables
                    $currentStatus = 'returned';
                    $rental['current_status'] = 'returned';
                    $rental['end_date'] = $endDate;

                    $_SESSION['success'] = "Proof of returned uploaded successfully.";
                    header("Location: rental_details.php?rental_id=$rentalId");
                    exit();
                } catch (Exception $e) {
                    // Rollback on error
                    $conn->rollBack();
                    $_SESSION['error'] = "An error occurred while updating the rental.";
                    // Optionally log the error: error_log($e->getMessage());
                }
            } else {
                $_SESSION['error'] = "Failed to upload the proof.";
            }
        } else {
            $_SESSION['error'] = "Invalid file type. Only images are allowed.";
        }
    }

    // Handle status confirmation from renter
    if (isset($_POST['confirm_rent']) && $currentStatus === 'delivered') {
        // Begin Transaction
        $conn->beginTransaction();
        try {
            // Update rental status to 'completed' and set end_date
            $updateSql = "UPDATE rentals SET current_status = 'completed', end_date = :endDate WHERE id = :rentalId";
            $updateStmt = $conn->prepare($updateSql);
            $endDate = date('Y-m-d'); // Current date
            $updateStmt->bindParam(':endDate', $endDate, PDO::PARAM_STR);
            $updateStmt->bindParam(':rentalId', $rentalId, PDO::PARAM_INT);
            $updateStmt->execute();

            // Commit Transaction
            $conn->commit();

            // Update local variables
            $currentStatus = 'completed';
            $rental['current_status'] = 'completed';
            $rental['end_date'] = $endDate;

            $_SESSION['success'] = "Rental marked as completed.";
            header("Location: rental_details.php?rental_id=$rentalId");
            exit();
        } catch (Exception $e) {
            // Rollback on error
            $conn->rollBack();
            $_SESSION['error'] = "An error occurred while updating the rental.";
            // Optionally log the error: error_log($e->getMessage());
        }
    }
}

// Define the initial status flow
$statusFlow = [
    'pending_confirmation' => 'Rent Pending',
    'approved' => 'Rent Confirmed',
    'delivery_in_progress' => 'Delivery',
    'delivered' => 'Delivered',
    'completed' => 'Completed',
    'returned' => 'Returned'
];

// Adjust statusFlow based on current status
if ($currentStatus === 'cancelled') {
    // Only show 'Rent Pending' and 'Cancelled'
    $statusFlow = [
        'pending_confirmation' => 'Rent Pending',
        'cancelled' => 'Cancelled'
    ];
} elseif ($isOverdue) {
    // Insert 'Overdue' between 'completed' and 'returned'
    $statusFlow = array_slice($statusFlow, 0, 5, true) + ['overdue' => 'Overdue'] + array_slice($statusFlow, 5, null, true);
}

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

// Generate CSRF token for security
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        /* Main Content Styling */
        main {
            margin-top: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Progress Steps Styling */
        .progress-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 30px 0;
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
            border-radius: 2px;
        }

        .progress-step {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 16.6%; /* Adjust based on number of steps */
        }

        .progress-step .circle {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background-color: #ddd;
            margin: 0 auto;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #fff;
            font-size: 0.8rem;
        }

        .progress-step.active .circle {
            background-color: #28a745;
        }

        .progress-step .label {
            margin-top: 10px;
            font-size: 0.9rem;
            color: #6c757d;
            font-weight: bold;
        }

        .progress-step.active .label {
            color: #28a745;
        }

        /* Rental Summary Styling */
        .rental-summary img {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .rental-summary h5 {
            font-weight: bold;
        }

        .rental-summary p {
            margin: 0;
            font-size: 0.9rem;
            color: #555;
        }

        /* Disabled Button Styles */
        .btn-disabled {
            cursor: not-allowed;
            opacity: 0.6;
        }

        /* Additional Styling */
        .card-header {
            font-weight: bold;
            font-size: 1.1rem;
            background-color: #f8f9fa;
            border-bottom: none;
        }

        .form-label {
            font-weight: bold;
        }

        button {
            transition: all 0.3s ease;
        }

        button:hover {
            transform: scale(1.03);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .img-thumbnail {
            border-radius: 10px;
            transition: transform 0.2s;
        }

        .img-thumbnail:hover {
            transform: scale(1.05);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            main {
                padding: 10px;
            }

            .progress-step {
                width: 20%;
            }

            .progress-line {
                left: 10%;
                width: 80%;
            }
        }
    </style>
</head>
<body>
    <?php include '../includes/navbar.php'; ?>

    <main>
        <div class="card centered-card">
            <div class="card-header">Rental Details</div>
            <div class="card-body">
                <h5 class="card-title">Rental ID: <?= htmlspecialchars($rental['id']) ?></h5>
                <p class="card-text"><strong>Rental Date:</strong> <?= htmlspecialchars($rental['created_at'] ?? 'N/A') ?></p>
                <p class="card-text"><strong>Meet-up Date:</strong> <?= htmlspecialchars($rental['start_date'] ?? 'N/A') ?></p>

                <!-- Progress Steps -->
                <div class="progress-container">
                    <div class="progress-line"></div>
                    <?php foreach ($statusFlow as $key => $label): ?>
                        <div class="progress-step <?= isStatusActive($key, $currentStatus, $statusFlow) ? 'active' : '' ?>">
                            <div class="circle"><?= $key === $currentStatus ? "✔" : "" ?></div>
                            <div class="label"><?= htmlspecialchars($label) ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Rental Summary -->
                <div class="rental-summary d-flex align-items-center mt-4">
                    <img src="../img/uploads/<?= htmlspecialchars($rental['image']) ?>" alt="<?= htmlspecialchars($rental['product_name']) ?>" style="width: 150px; height: auto; object-fit: cover;">
                    <div class="ms-3">
                        <h5><?= htmlspecialchars($rental['product_name']) ?></h5>
                        <p>Brand: <?= htmlspecialchars($rental['brand']) ?></p>
                        <p><strong>₱<?= number_format($rental['rental_price'], 2) ?></strong> / <?= htmlspecialchars($rental['rental_period']) ?></p>
                    </div>
                </div>

                <!-- Proof Section -->
                <div class="mt-4">
                    <h6>Proof of Delivery from Owner:</h6>
                    <?php if ($rental['proof_of_delivered']): ?>
                        <img src="<?= htmlspecialchars($rental['proof_of_delivered']) ?>" alt="Proof of Delivery" class="img-thumbnail" width="200">
                    <?php else: ?>
                        <p>No proof uploaded by owner.</p>
                    <?php endif; ?>
                </div>

                <div class="mt-4">
                    <h6>Your Proof of Delivery:</h6>
                    <?php if ($rental['proof_of_delivered']): ?>
                        <img src="<?= htmlspecialchars($rental['proof_of_delivered']) ?>" alt="Your Proof of Delivery" class="img-thumbnail" width="200">
                    <?php else: ?>
                        <p>No proof uploaded yet.</p>
                    <?php endif; ?>
                </div>

                <div class="mt-4">
                    <h6>Your Proof of Returned:</h6>
                    <?php if ($rental['proof_of_returned']): ?>
                        <img src="<?= htmlspecialchars($rental['proof_of_returned']) ?>" alt="Your Proof of Returned" class="img-thumbnail" width="200">
                    <?php else: ?>
                        <p>No proof uploaded yet.</p>
                    <?php endif; ?>
                </div>

                <!-- Actions Based on Status -->
                <div class="d-flex flex-wrap mt-3">
                    <?php if ($currentStatus === 'delivery_in_progress'): ?>
                        <form method="post" enctype="multipart/form-data" class="me-2 mb-2">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                            <div class="mb-3">
                                <label for="proof_of_delivered" class="form-label">Upload Proof of Delivery</label>
                                <input class="form-control" type="file" id="proof_of_delivered" name="proof_of_delivered" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload Proof</button>
                        </form>
                    <?php elseif ($currentStatus === 'delivered'): ?>
                        <form method="post" class="me-2 mb-2">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                            <button type="submit" name="confirm_rent" class="btn btn-success">Confirm Rent</button>
                        </form>
                    <?php elseif ($currentStatus === 'completed'): ?>
                        <form method="post" enctype="multipart/form-data" class="me-2 mb-2">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                            <div class="mb-3">
                                <label for="proof_of_returned" class="form-label">Upload Proof of Returned</label>
                                <input class="form-control" type="file" id="proof_of_returned" name="proof_of_returned" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload Proof</button>
                        </form>
                    <?php endif; ?>
                    <!-- Removed the Contact Owner button as per request -->
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>