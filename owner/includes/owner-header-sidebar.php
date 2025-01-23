
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="includes/owner-style.css">
    <title>RentBox Dashboard</title>
</head>
<body>
    <div id="overlay"></div>
    <div class="container-fluid">
        <div class="row">
            <!-- Header -->
            <div class="col-12 header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <!-- Sidebar Toggle Button for small screens -->
                    <button id="toggleSidebarBtn" class="btn btn-outline-secondary me-3 d-md-none" type="button">
                        <i class="fas fa-bars"></i>
                    </button>
                    <!-- Logo -->
                    <img src="/rb/owner/includes/logo.png" alt="RentBox Logo" class="logo" style="width: 50px; height: 50px; object-fit: contain;">
                    <h4 class="m-0">RentBox</h4>
                </div>
                <div class="d-flex align-items-center">
                <!-- Messages Dropdown -->
                <div class="dropdown me-3">
                    <a href="#" class="text-decoration-none d-flex align-items-center" data-bs-toggle="dropdown">
                        <i class="fas fa-comment fs-5"></i> <span class="ms-2">Messages</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end p-3 shadow message-drawer" style="width: 280px; height: 450px; overflow-y: auto;">
                        <li class="fw-bold mb-2">Recent Messages</li>
                        
                        <!-- Sample messages with consistent avatar size -->
                        <li class="message-item d-flex align-items-center mb-3">
                            <div class="avatar-container">
                                <img src="includes/user1.jpg" alt="Juan dela Cruz" class="avatar">
                            </div>
                            <div>
                                <p class="mb-0 fw-bold">Juan dela Cruz</p>
                                <small class="text-muted">Hi, I'm interested in renting your gadget. Is it available?</small>
                            </div>
                        </li>
                        <li class="message-item d-flex align-items-center mb-3">
                            <div class="avatar-container">
                                <img src="includes/user2.jpg" alt="Lena Page" class="avatar">
                            </div>
                            <div>
                                <p class="mb-0 fw-bold">Lena Page</p>
                                <small class="text-muted">Would it be possible to extend the rental period?</small>
                            </div>
                        </li>
                        <li class="message-item d-flex align-items-center mb-3">
                            <div class="avatar-container">
                                <img src="includes/user3.jpg" alt="Devin Harmon" class="avatar">
                            </div>
                            <div>
                                <p class="mb-0 fw-bold">Devin Harmon</p>
                                <small class="text-muted">What's the earliest I can pick up the gadget?</small>
                            </div>
                        </li>
                        <li class="message-item d-flex align-items-center mb-3">
                            <div class="avatar-container">
                                <img src="includes/user4.jpg" alt="Eula Horton" class="avatar">
                            </div>
                            <div>
                                <p class="mb-0 fw-bold">Eula Horton</p>
                                <small class="text-muted">Hi! I just made the payment, can you confirm?</small>
                            </div>
                        </li>
                        <li class="message-item d-flex align-items-center mb-3">
                            <div class="avatar-container">
                                <img src="includes/user5.jpg" alt="Victoria Perez" class="avatar">
                            </div>
                            <div>
                                <p class="mb-0 fw-bold">Victoria Perez</p>
                                <small class="text-muted">Are there any accessories included with the gadget?</small>
                            </div>
                        </li>
                        <li class="message-item d-flex align-items-center mb-3">
                            <div class="avatar-container">
                                <img src="includes/user6.jpg" alt="Cora Medina" class="avatar">
                            </div>
                            <div>
                                <p class="mb-0 fw-bold">Cora Medina</p>
                                <small class="text-muted">How do we arrange the handover for the gadget?</small>
                            </div>
                        </li>

                        <!-- "View All Messages" Link (Positioned Below the List) -->
                        <li class="text-center mt-3"><a href="#" class="text-decoration-none text-primary fw-bold">View All Messages</a></li>
                    </ul>
                </div>



            <!-- Notifications Dropdown -->
            <div class="dropdown me-3">
                <a href="#" class="text-decoration-none d-flex align-items-center" data-bs-toggle="dropdown">
                    <i class="fas fa-bell fs-5"></i> <span class="ms-2">Notifications</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end p-3 shadow notification-drawer" style="width: 280px; height: 500px; overflow-y: auto;">
                    <div class="d-flex justify-content-between mb-3">
                        <a href="#" class="text-decoration-none fw-bold active-tab">All</a>
                        <a href="#" class="text-decoration-none ms-4 text-muted">Unread</a>
                    </div>

                    <!-- Sample notifications (repeat to create scrolling effect) -->
                    <li class="notification-item d-flex align-items-start mb-3">
                        <i class="fas fa-box me-3 fs-4"></i>
                        <div>
                            <p class="mb-0 fw-bold">Transaction Updates</p>
                            <small class="text-muted">Congratulations! Your gadget has been requested for rent. Please confirm the rental to proceed.</small>
                            <div class="text-muted"><small>1 hr ago</small></div>
                        </div>
                    </li>
                    <li class="notification-item d-flex align-items-start mb-3">
                        <i class="fas fa-shield-alt me-3 fs-4"></i>
                        <div>
                            <p class="mb-0 fw-bold">Safety Guide</p>
                            <small class="text-muted">Guide: Learn how to conduct a safe and secure transaction.</small>
                            <div class="text-muted"><small>2 days ago</small></div>
                        </div>
                    </li>
                    <li class="notification-item d-flex align-items-start mb-3">
                        <i class="fas fa-box-open me-3 fs-4"></i>
                        <div>
                            <p class="mb-0 fw-bold">First Gadget Listed</p>
                            <small class="text-muted">Your first gadget has been successfully listed. Start accepting rentals!</small>
                            <div class="text-muted"><small>2 days ago</small></div>
                        </div>
                    </li>
                    <li class="notification-item d-flex align-items-start mb-3">
                        <i class="fas fa-user-check me-3 fs-4"></i>
                        <div>
                            <p class="mb-0 fw-bold">Profile Update Complete</p>
                            <small class="text-muted">Your profile has been updated successfully.</small>
                            <div class="text-muted"><small>1 week ago</small></div>
                        </div>
                    </li>
                    <li class="notification-item d-flex align-items-start mb-3">
                        <i class="fas fa-user-plus me-3 fs-4"></i>
                        <div>
                            <p class="mb-0 fw-bold">Complete Your Profile</p>
                            <small class="text-muted">Ensure your profile is fully set up to enhance trust and visibility.</small>
                            <div class="text-muted"><small>2 weeks ago</small></div>
                        </div>
                    </li>
                    <li class="notification-item d-flex align-items-start mb-3">
                        <i class="fas fa-check-circle me-3 fs-4"></i>
                        <div>
                            <p class="mb-0 fw-bold">Account Verified</p>
                            <small class="text-muted">Your account is now verified. You can start listing gadgets for rent!</small>
                            <div class="text-muted"><small>2 weeks ago</small></div>
                        </div>
                    </li>

                    <!-- "View All Notifications" Link (Positioned Below the List) -->
                    <li class="text-center mt-3"><a href="#" class="text-decoration-none text-primary fw-bold">View All Notifications</a></li>
                </ul>
            </div>




                    <!-- Profile Dropdown -->
                    <div class="dropdown">
                        <a href="#" class="text-decoration-none d-flex align-items-center" data-bs-toggle="dropdown">
                            <img src="/rb/owner/includes/profile.jpg" alt="User Profile" class="profile-img">
                            <div class="d-flex flex-column align-items-start profile-details">
                                <span class="fw-bold">Gustavo Xavier</span>
                                <span class="badge bg-warning text-dark">Owner</span>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="/rb/owner/manage-account-owner.php" class="dropdown-item">Profile</a></li>
                            <li><a href="#" class="dropdown-item">Settings</a></li>
                            <li><a href="#" class="dropdown-item text-danger">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Sidebar -->
            <div id="sidebar" class="sidebar">
                <input type="text" class="form-control my-3" placeholder="Search">
                <a href="/rb/owner/dashboard.php" class="active"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
                <a href="/rb/owner/gadget.php"><i class="fas fa-tablet-alt me-2"></i> Gadgets</a>
                <a href="/rb/owner/rentals.php"><i class="fas fa-sync-alt me-2"></i> Rentals</a>
                <a href="/rb/owner/messages.php"><i class="fas fa-comment-alt me-2"></i> Messages</a>
                <a href="/rb/owner/all-reports.php"><i class="fas fa-file-alt me-2"></i> All reports</a>
                <a href="/rb/owner/gadgets_assessment.php"><i class="fas fa-file-alt me-2"></i>Assess Gadgets</a>
                <a href="/rb/owner/logout.php" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i> Log out</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="includes/owner-js.js"></script>

