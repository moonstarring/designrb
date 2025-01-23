<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'db/db.php';

// Initialize variables
$email = '';
$password = '';
$errorMessage = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input and sanitize
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password']; // Passwords should not be sanitized to allow all characters

    if (!$email) {
        $errorMessage = 'Please enter a valid email address.';
    } else {
        // Query to check if the email exists in the database
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if user exists and verify password
        if ($user && password_verify($password, $user['password'])) {
            // Start session and set user data
            $_SESSION['id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['username'] = $user['username']; // Optional: store username

            // Regenerate session ID to prevent session fixation
            session_regenerate_id(true);

            // Redirect based on user role
            switch ($user['role']) {
                case 'admin':
                    header('Location: admin/dashboard.php'); // Redirect to admin dashboard
                    break;
                case 'owner':
                    header('Location: owner/dashboard.php'); // Redirect to owner dashboard
                    break;
                case 'renter':
                    header('Location: renter/browse.php'); // Redirect to renter browse page
                    break;
                default:
                    // If role is undefined, log out the user
                    header('Location: logout.php');
                    break;
            }
            exit(); // Make sure the script stops after redirection
        } else {
            // Incorrect email or password
            $errorMessage = 'Invalid email or password.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Rentbox - Login</title>
        <link rel="icon" type="image/png" href="images/rb logo white.png">
        <link href="vendor/bootstrap-5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="vendor/font/bootstrap-icons.css">
        <style>
        </style>
    </head>
    <body>
        <?php require_once 'includes/navbar.php'; ?>
        
        <hr class="m-0 p-0">
        
        <main class="container-fluid">
            <div class="container-fluid">
                <div class="card mx-auto my-5 border border-0" style="width:500px;">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="text-center mt-4 mb-3 fw-bold">Login</h5>
                        
                        <!-- Display error message if credentials are incorrect -->
                        <?php if ($errorMessage): ?>
                            <div class="alert alert-danger text-center"><?php echo htmlspecialchars($errorMessage); ?></div>
                        <?php endif; ?>

                        <form method="POST" action="">
                            <div class="form-floating mb-3 mx-3" style="font-size: 14px;">
                                <input type="email" name="email" class="form-control ps-4 rounded-5" id="floatingInput" placeholder="Email" required value="<?= htmlspecialchars($email) ?>">
                                <label for="floatingInput" class="ps-4">Email</label>
                            </div>
                        
                            <div class="form-floating mb-3 mx-3" style="font-size: 14px;">
                                <input type="password" name="password" class="form-control ps-4 rounded-5" id="floatingPassword" placeholder="Password" required>
                                <label for="floatingPassword" class="ps-4">Password</label>
                            </div>

                            <div class="d-flex mb-3 mx-4 justify-content-between" style="font-size: 12px;">
                                <a class="text-secondary" href="signup.php">Create an account</a>
                                <a class="text-secondary" href="forgot-password.php">Forgot Password?</a>
                            </div>

                            <button type="submit" class="btn btn-success just rounded-5 mx-5 my-3 shadow">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <footer class="mt-5 px-3">
            <div class="d-flex flex-column flex-sm-row justify-content-between py-2 border-top">
                <p>© 2024 Rentbox. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a href="#"><i class="bi bi-facebook text-body"></i></a></li>
                    <li class="ms-3"><a href="#"><i class="bi bi-twitter-x text-body"></i></a></li>
                    <li class="ms-3"><a href="#"><i class="bi bi-linkedin text-body"></i></a></li>
                </ul>
            </div>
        </footer>
        
        <script src="vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>