<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
        <link rel="stylesheet" href="../vendor/bootstrap-5.3.3/dist/css/bootstrap.min.css">
        <link rel="icon" type="image/png" href="../images/rb logo white.png">
    </head>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-primary pt-3 pb-3" aria-label="navbar">
            <div class="container-fluid">
                <a href="browse.php">
                    <img class="ms-5 my-auto mt-1" src="images\rb logo text colored.png" alt="Logo" height="50px">
                </a>

                <button class="navbar-toggler button-outline-info" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbar">
                    <!-- Conditional link and dropdown based on login status -->
                    <?php if (!isset($_SESSION['id'])): ?>
                        <!-- Menu for non-logged-in users -->
                        <a class="ms-auto me-4 nav-link fw-bold" href="owner.landing.php">Become an Owner</a> 
                        <div class="nav-item dropdown navbar-nav me-5 rounded-bottom-4 border border-0">
                            <button class="btn rounded-pill shadow-sm btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle ms-2 text-success" style="font-size: 30px;"></i>
                                <span><i class="bi bi-list ms-1 me-2 text-success" style="font-size: 30px;"></i></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end mb-0 rounded-bottom-3 shadow border border-0">
                                <li><a class="dropdown-item fw-bold pe-5" href="signup.php">Sign Up</a></li>
                                <li><a class="dropdown-item pe-5" href="/rb/login.php">Login</a></li>
                                <li><a class="dropdown-item rounded-bottom-4 pe-5" href="login.php">Lease your gadgets</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item pe-5" href="">Help Center</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <!-- Menu for logged-in users -->
                        <a class="ms-auto me-4 nav-link fw-bold" href="">Become an Owner</a>
                        <div class="nav-item dropdown navbar-nav me-5 rounded-bottom-4 border border-0">
                            <button class="btn rounded-pill shadow-sm btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle ms-2 text-success" style="font-size: 30px;"></i>
                                <span><i class="bi bi-list ms-1 me-2 text-success" style="font-size: 30px;"></i></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end mb-0 rounded-bottom-3 shadow border border-0">
                                <li><a class="dropdown-item pe-5" href="profile.php">Profile</a></li>
                                <li><a class="dropdown-item pe-5" href="message.php">Messages</a></li>
                                <li><a class="dropdown-item pe-5" href="rentals.php">Rentals</a></li>
                                <li><a class="dropdown-item pe-5" href="cart.php">Cart</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item rounded-bottom-4 pe-5" href="">Lease your gadgets</a></li>
                                <li><a class="dropdown-item pe-5" href="">Help Center</a></li>
                                <li><a class="dropdown-item pe-5" href="supports.php">Supports</a></li>
                                <li><a class="dropdown-item pe-5" href="file_dispute.php">File Dispute</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item text-danger fw-bold pe-5" href="../includes/logout.php">Logout</a></li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </nav>

    </body>
</html>