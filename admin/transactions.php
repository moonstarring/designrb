<?php
    require_once 'includes/owner-header-sidebar.php'; // Includes header and sidebar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Transaction Management</title>
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
        .nav-tabs .nav-link {
            font-size: 1rem;
            font-weight: 500;
        }
        .nav-tabs .nav-link.active {
            background-color: #f8f9fa;
            border-color: #dee2e6 #dee2e6 #f8f9fa;
        }
        .table img {
            width: 50px;
            height: auto;
            border-radius: 5px;
        }
        .action-icons i {
            cursor: pointer;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="main-content">
    <div class="container">
        <h2 class="mb-4">Transaction Management</h2>

        <!-- Tabs for Transaction Filters -->
        <ul class="nav nav-tabs mb-3" id="transactionTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="meetup-tab" data-bs-toggle="tab" data-bs-target="#meetup" type="button" role="tab" aria-controls="meetup" aria-selected="false">For Meetup/Delivery</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="rented-tab" data-bs-toggle="tab" data-bs-target="#rented" type="button" role="tab" aria-controls="rented" aria-selected="false">Rented</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="returned-tab" data-bs-toggle="tab" data-bs-target="#returned" type="button" role="tab" aria-controls="returned" aria-selected="false">Returned</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled" type="button" role="tab" aria-controls="cancelled" aria-selected="false">Cancelled</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="dispute-tab" data-bs-toggle="tab" data-bs-target="#dispute" type="button" role="tab" aria-controls="dispute" aria-selected="false">For Dispute</button>
            </li>
        </ul>

        <!-- Search and Sort -->
        <div class="d-flex justify-content-between mb-3">
            <input type="text" class="form-control w-50" placeholder="Search">
            <div class="d-flex">
                <select class="form-select me-2" style="width: auto;">
                    <option selected>Sort by</option>
                    <option value="1">Rental ID</option>
                    <option value="2">Gadget</option>
                </select>
                <button class="btn btn-outline-secondary"><i class="fas fa-filter"></i></button>
            </div>
        </div>

        <!-- Transactions Table -->
        <div class="table-container">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Rental ID</th>
                        <th>Gadgets</th>
                        <th>Owners</th>
                        <th>Renters</th>
                        <th>Started On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Row -->
                    <tr>
                        <td>RENT-562389</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="includes/ps5.jpg" alt="Gadget">
                                <span class="ms-3">Playstation 5</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="includes/user1.jpg" alt="Owner" class="rounded-circle me-2" width="40" height="40">
                                <div>
                                    <p class="mb-0 fw-bold">Gustavo Xavier</p>
                                    <small>gustavoxavier@gmail.com</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="includes/user2.jpg" alt="Renter" class="rounded-circle me-2" width="40" height="40">
                                <div>
                                    <p class="mb-0 fw-bold">Juan dela Cruz</p>
                                    <small>juandelacruz@example.com</small>
                                </div>
                            </div>
                        </td>
                        <td>24 Oct, 2024</td>
                        <td class="action-icons">
                            <i class="fas fa-eye text-primary"></i>
                            <i class="fas fa-trash text-danger"></i>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>