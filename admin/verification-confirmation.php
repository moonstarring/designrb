<?php
require_once 'includes/auth.php';
require_once '../db/db.php';

// Handle User Approvals and Rejections in the Same File (Optional)
// Alternatively, use separate scripts as done for gadgets

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $_SESSION['error_message'] = "Invalid CSRF token.";
        header("Location: verification-confirmation.php");
        exit();
    }

    if (isset($_POST['action']) && isset($_POST['user_id'])) {
        $action = $_POST['action'];
        $user_id = intval($_POST['user_id']); // Ensure it's an integer

        if ($action === 'approve') {
            // Approve the user by updating their role or verification status
            $stmt = $conn->prepare("UPDATE users SET role = 'renter', email_verified_at = NOW() WHERE id = :id");
            $stmt->execute(['id' => $user_id]);

            if ($stmt->rowCount()) {
                $_SESSION['success_message'] = "User approved successfully.";
            } else {
                $_SESSION['error_message'] = "Failed to approve the user. They may not exist.";
            }
        } elseif ($action === 'reject') {
            // Reject the user by deleting or setting a status
            $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
            $stmt->execute(['id' => $user_id]);

            if ($stmt->rowCount()) {
                $_SESSION['success_message'] = "User rejected and removed successfully.";
            } else {
                $_SESSION['error_message'] = "Failed to reject the user. They may not exist.";
            }
        }

        // Redirect back to verification-confirmation.php
        header("Location: verification-confirmation.php");
        exit();
    }
}

// Generate CSRF Token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Fetch Pending Users (assuming 'renter' users need verification)
$stmt = $conn->prepare("SELECT id, name, email, created_at FROM users WHERE role = 'renter' AND email_verified_at IS NULL");
$stmt->execute();
$pendingUsers = $stmt->fetchAll();

// Fetch Pending Gadgets (assuming 'pending_approval' status)
$stmt = $conn->prepare("SELECT p.id, p.name, u.name AS owner_name, p.category, p.created_at FROM products p JOIN users u ON p.owner_id = u.id WHERE p.status = 'pending_approval'");
$stmt->execute();
$pendingGadgets = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verification Confirmation - Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .main-content {
            margin-left: 260px; /* Matches the sidebar width */
            padding: 80px 20px; /* Adjust padding for header spacing */
            background: #f8f9fa;
            min-height: 100vh;
        }
        .table-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .badge-role {
            font-size: 0.9rem;
            padding: 5px 10px;
            border-radius: 20px;
        }
        .nav-tabs .nav-link {
            font-size: 1rem;
            font-weight: 500;
        }
        .nav-tabs .nav-link.active {
            background-color: #f8f9fa;
            border-color: #dee2e6 #dee2e6 #f8f9fa;
        }
        .action-icons i {
            cursor: pointer;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<?php 
require_once 'includes/owner-header-sidebar.php';
 ?>

<div class="main-content">
    <div class="container">
        <h2 class="mb-4">Verification Confirmation</h2>
        
        <!-- Display Success Message -->
        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_SESSION['success_message']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>
        
        <!-- Display Error Message -->
        <?php if (isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_SESSION['error_message']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>
        
        <!-- Tabs for Users and Gadgets -->
        <ul class="nav nav-tabs mb-3" id="verificationTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab" aria-controls="users" aria-selected="true">Users</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="gadgets-tab" data-bs-toggle="tab" data-bs-target="#gadgets" type="button" role="tab" aria-controls="gadgets" aria-selected="false">Gadgets</button>
            </li>
        </ul>

        <div class="tab-content" id="verificationTabsContent">
            <!-- Users Tab -->
            <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                <!-- Search and Sort -->
                <div class="d-flex justify-content-between mb-3">
                    <input type="text" class="form-control w-50" id="userSearch" placeholder="Search Users">
                    <div class="d-flex">
                        <select class="form-select me-2" id="userSort" style="width: auto;">
                            <option selected>Sort by</option>
                            <option value="name">Name</option>
                            <option value="date">Date</option>
                        </select>
                        <button class="btn btn-outline-secondary" id="userFilterBtn"><i class="fas fa-filter"></i></button>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="table-container">
                    <table class="table table-hover align-middle" id="usersTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Applied On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($pendingUsers)): ?>
                                <?php foreach ($pendingUsers as $user): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user['name']) ?></td>
                                        <td><?= htmlspecialchars($user['email']) ?></td>
                                        <td><?= htmlspecialchars(date('d M, Y', strtotime($user['created_at']))) ?></td>
                                        <td class="action-icons">
                                            <!-- Approve Form -->
                                            <form method="POST" action="" style="display:inline;">
                                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                                                <input type="hidden" name="action" value="approve">
                                                <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['id']) ?>">
                                                <button type="submit" class="btn btn-sm btn-success" title="Approve">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                            
                                            <!-- Reject Form -->
                                            <form method="POST" action="" style="display:inline;">
                                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                                                <input type="hidden" name="action" value="reject">
                                                <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['id']) ?>">
                                                <button type="submit" class="btn btn-sm btn-danger" title="Reject" onclick="return confirm('Are you sure you want to reject this user?');">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">No pending users found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <!-- Pagination (Optional) -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <small>Items per page:</small>
                        <select class="form-select w-auto">
                            <option>6</option>
                            <option>12</option>
                            <option>24</option>
                        </select>
                        <nav aria-label="Page navigation">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Gadgets Tab -->
            <div class="tab-pane fade" id="gadgets" role="tabpanel" aria-labelledby="gadgets-tab">
                <!-- Search and Sort -->
                <div class="d-flex justify-content-between mb-3">
                    <input type="text" class="form-control w-50" id="gadgetSearch" placeholder="Search Gadgets">
                    <div class="d-flex">
                        <select class="form-select me-2" id="gadgetSort" style="width: auto;">
                            <option selected>Sort by</option>
                            <option value="name">Name</option>
                            <option value="date">Date</option>
                        </select>
                        <button class="btn btn-outline-secondary" id="gadgetFilterBtn"><i class="fas fa-filter"></i></button>
                    </div>
                </div>

                <!-- Gadgets Table -->
                <div class="table-container">
                    <table class="table table-hover align-middle" id="gadgetsTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Owner</th>
                                <th>Category</th>
                                <th>Applied On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($pendingGadgets)): ?>
                                <?php foreach ($pendingGadgets as $gadget): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($gadget['name']) ?></td>
                                        <td><?= htmlspecialchars($gadget['owner_name']) ?></td>
                                        <td><?= htmlspecialchars($gadget['category']) ?></td>
                                        <td><?= htmlspecialchars(date('d M, Y', strtotime($gadget['created_at']))) ?></td>
                                        <td class="action-icons">
                                            <!-- Approve Form -->
                                            <form method="POST" action="approve_gadget.php" style="display:inline;">
                                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                                                <input type="hidden" name="gadget_id" value="<?= htmlspecialchars($gadget['id']) ?>">
                                                <button type="submit" class="btn btn-sm btn-success" title="Approve">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                            
                                            <!-- Reject Form -->
                                            <form method="POST" action="reject_gadget.php" style="display:inline;">
                                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                                                <input type="hidden" name="gadget_id" value="<?= htmlspecialchars($gadget['id']) ?>">
                                                <button type="submit" class="btn btn-sm btn-danger" title="Reject" onclick="return confirm('Are you sure you want to reject this gadget?');">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">No pending gadgets found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <!-- Pagination (Optional) -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <small>Items per page:</small>
                        <select class="form-select w-auto">
                            <option>6</option>
                            <option>12</option>
                            <option>24</option>
                        </select>
                        <nav aria-label="Page navigation">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Ensure it's loaded after jQuery if used) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Optional: JavaScript for Search and Sort Functionality -->
<script>
    // Implement search and sort functionality using JavaScript or server-side processing
    // This is optional and depends on your specific requirements
</script>
</body>
</html>