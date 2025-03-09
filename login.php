<?php require_once 'head.php'; ?>
<?php require_once 'navbar.php'; ?>

<body class="container-fluid bg-dark-subtle m-0 p-0">
    <div class="row d-flex justify-content-center m-0">
        <div class="card col-4 rounded-5 shadow-sm mb-5">
            <div class="card-body d-flex flex-column justify-content-center">
                <h4 class="text-center mt-4 mb-4 fw-bold">Login</h4>
        
                <!-- Display error message if credentials are incorrect or account pending 
                <?php if ($errorMessage): ?>
                    <div class="alert alert-danger text-center"><?php echo htmlspecialchars($errorMessage); ?></div>
                <?php endif; ?> -->
        
                <form method="POST" action="" class="col">
                    <div class="form-floating mb-3 mx-3">
                        <input type="email" name="email" class="form-control ps-4 rounded-5 focus-ring" id="floatingInput" placeholder="Email" required value="" style="--bs-focus-ring-color: rgba(var(--bs-success-rgb), .25)">
                        <label for="floatingInput" class="ps-4">Email</label>
                    </div>
        
                    <div class="form-floating mb-1 mx-3">
                        <input type="password" name="password" class="form-control ps-4 rounded-5 focus-ring" id="floatingPassword" placeholder="Password" required value="" style="--bs-focus-ring-color: rgba(var(--bs-success-rgb), .25)">
                        <label for="floatingPassword" class="ps-4">Password</label>
                    </div>
        
                    <div class="d-flex justify-content-end mb-4 mx-5">
                        <small><a class="link-hover link-secondary" href="forgot-password.php">Forgot Password?</a></small>
                    </div>
                    
                    <div class="d-flex flex-column justify-content-center align-items-center mb-4 mx-3 mb-3 gap-2">
                        <button type="submit" class="btn gradient-success shadow-sm rounded-5 px-5 py-2 ">Login</button>
                        <p class="text-secondary p-0 m-0">or</p>
                        <a href="signup.php" class="btn btn-outline-success shadow-sm mb-3 rounded-5 px-5 py-2">Create Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>
</body>
</html>