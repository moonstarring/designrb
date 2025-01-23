<!DOCTYPE html>
<html lang="en">
<?php
        require_once 'includes/owner-header-sidebar.php';
        
?>
    <body>
    <div class="main-content">
        <div class="row">
            <div class="col-md-9 offset-md-3 mt-4">
                <!-- Welcome Section -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h2 class="welcome">Welcome back, Gustavo!</h2>
                        <p class="overview">Here's Your Current Sales Overview</p>
                    </div>
                </div>

                <!-- Overview Cards -->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="card card-hover shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title title-with-line">Earnings this Month</h5>
                                <div>
                                    <h3>₱ 2,023 <span class="text-success fs-5">&#x25B2;</span></h3>
                                    <p class="card-text text-muted">Increase compared to last week</p>
                                    <a href="#" class="text-decoration-none">Revenues report &rarr;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-hover shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title title-with-line">Total Rentals</h5>
                                <div>
                                    <h3>5</h3>
                                    <p class="card-text text-muted">You closed 5 out of 27 Rentals.</p>
                                    <a href="#" class="text-decoration-none">All Rents &rarr;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-hover shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title title-with-line">Top Earning Gadgets</h5>
                                <div>
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="includes/ps5.jpg" alt="Playstation 5" class="prod-img-db me-3">
                                        <div>
                                            <p class="mb-0 device-name">Playstation 5</p>
                                            <span class="device-status text-muted">Rented</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="includes/gopro.jpg" alt="GoPro GXR69" class="prod-img-db me-3">
                                        <div>
                                            <p class="mb-0 device-name">GoPro GXR69</p>
                                            <span class="device-status text-muted">Available</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Listed Gadgets -->
                    <div class="col-md-8">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body">
                                <h5 class="card-title title-with-line">Listed Gadgets</h5>
                                <div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Gadget</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="d-flex align-items-center">
                                                    <img src="includes/ps5.jpg" alt="Playstation 5" class="prod-img-db me-3">
                                                    <span class="device-name">Playstation 5</span>
                                                </td>
                                                <td class="text-status">Pending</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></button>
                                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-flex align-items-center">
                                                    <img src="includes/gopro.jpg" alt="GoPro GXR69" class="prod-img-db me-3">
                                                    <span class="device-name">GoPro GXR69</span>
                                                </td>
                                                <td class="text-status">Available</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></button>
                                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-primary">+ Add Gadget</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Alerts & Reminders -->
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body">
                                <h5 class="card-title title-with-line">Alerts & Reminders</h5>
                                <div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6><i class="fas fa-exclamation-circle"></i> Gadget Handover</h6>
                                                <small>Reminders! Tomorrow is the day you meet up with Juan dela Cruz for the Gadget Handover.</small>
                                            </div>
                                            <span class="badge bg-danger">1 hr</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6><i class="fas fa-check-circle"></i> First Rent Confirmation</h6>
                                                <small>Congratulations! Your gadget has been requested for rent. Please confirm the rental to proceed.</small>
                                            </div>
                                            <span class="badge bg-danger">1 hr</span>
                                        </li>
                                    </ul>
                                    <a href="#" class="text-decoration-none">View All &rarr;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>