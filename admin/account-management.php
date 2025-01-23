<?php
        require_once 'includes/owner-header-sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Account Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .main-content {
            margin-left: 260px; /* Adjust to match the sidebar width */
            padding: 80px 20px;
            background: #f8f9fa;
            min-height: 100vh;
        }
        .header {
            background: white;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .badge-role {
            font-size: 0.9rem;
            padding: 5px 10px;
            border-radius: 20px;
        }
        .table-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .action-icons i {
            cursor: pointer;
            margin-right: 10px;
        }
        .pagination {
            justify-content: center;
        }
    </style>
</head>
<body>

    <div class="main-content">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Account Management</h2>
                <button class="btn btn-primary"><i class="fas fa-user-plus me-2"></i>Add User</button>
            </div>

            <!-- Search and Filters -->
            <div class="d-flex justify-content-between mb-3">
                <input type="text" class="form-control w-50" placeholder="Search">
                <div class="d-flex">
                    <select class="form-select me-2" style="width: auto;">
                        <option selected>Sort by</option>
                        <option value="1">Name</option>
                        <option value="2">Role</option>
                    </select>
                    <button class="btn btn-outline-secondary"><i class="fas fa-filter"></i></button>
                </div>
            </div>

            <!-- User Table -->
            <div class="table-container">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Create Date</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Rows -->
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="includes/user1.jpg" alt="User" class="rounded-circle me-3" width="40" height="40">
                                    <div>
                                        <p class="mb-0 fw-bold">David Wagner</p>
                                        <small> david_wagner@example.com</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-primary badge-role">Admin</span></td>
                            <td>24 Oct, 2015</td>
                            <td>+631234567899</td>
                            <td class="action-icons">
                                <i class="fas fa-pen text-primary"></i>
                                <i class="fas fa-trash text-danger"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="includes/user2.jpg" alt="User" class="rounded-circle me-3" width="40" height="40">
                                    <div>
                                        <p class="mb-0 fw-bold">Juan dela Cruz</p>
                                        <small> windler.warren@runte.net</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-danger badge-role">Owner</span></td>
                            <td>24 Oct, 2015</td>
                            <td>+631234567899</td>
                            <td class="action-icons">
                                <i class="fas fa-pen text-primary"></i>
                                <i class="fas fa-trash text-danger"></i>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
                <!-- Pagination -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>