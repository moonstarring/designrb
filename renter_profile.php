<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Rentbox</title>
    <link rel="icon" type="image/png" href="images/brand/rb logo white.png">
    <link href="vendor/bootstrap-5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="vendor/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container-fluid image-bg m-0 p-0">
        <!-- navbar -->
        <?php require_once 'navbar.php'; ?>

        <!-- body -->
        <div class="row container-fluid bg-body-secondary px-3 pb-5 pt-3 m-0">
            <div class="col-3 bg-body p-4 rounded-3 shadow-sm">
                <div class="d-flex align-items-center">
                    <img src="images/user/pfp.png" class="img-thumbnail rounded-circle pfp me-3" alt="">
                    <div class="d-flex flex-column">
                        <p class="fs-5 fw-bold m-0 p-0">User Name</p>
                        <div class="d-flex">
                            <a href="" class="text-secondary text-decoration-none"><small><i class="bi bi-pen-fill pe-1"></i>Edit Profile</small></a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="d-flex flex-column gap-2 mt-3">
                    <a class="fs-6 fw-bold ext-decoration-none text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                        <i class="bi bi-person-fill-gear me-1"></i>My Account</a>
                    <div class="collapse show ps-3" id="collapse1">
                        <div class="d-flex align-items-start flex-column gap-1">
                            <a href="#" class="fs-6 text-decoration-none text-secondary">Profile</a>
                            <a href="#" class="fs-6 text-decoration-none text-secondary">Banks & Cards</a>
                            <a href="#" class="fs-6 text-decoration-none text-secondary">Address</a>
                            <a href="#" class="fs-6 text-decoration-none text-secondary">Change Password</a>
                            <a href="#" class="fs-6 text-decoration-none text-secondary">Privacy Settings</a>
                            <a href="#" class="fs-6 text-decoration-none text-secondary">Notification Settings</a>
                        </div>
                    </div>
                    <a class="fs-6 fw-bold border-0 text-decoration-none text-dark" href=""><i class="bi bi-box2-heart-fill me-1"></i>My Rentals</a>
                    <a class="fs-6 fw-bold border-0 text-decoration-none text-dark" href=""><i class="bi bi-bell-fill me-1"></i>Notifications</a>
                    <a class="fs-6 fw-bold border-0 text-decoration-none text-dark" href=""><i class="bi bi-ticket-fill me-1"></i>Promos and Vouchers</a>
                </div>
            </div>

            <div class="col ms-3 bg-body rounded-3 shadow-sm pb-5 pt-3 px-3">
                <div class="ms-3">
                    <p class="fs-5 fw-bold text-dark m-0 p-0">My Profile</p>
                    <p class="text-secondary">Manage and protect your account</p>
                </div>
                <hr>
                <div class="container px-5">
                    <form>
                        <div class="mb-3 me-5">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="usersname">
                            <div id="emailHelp" class="form-text">Username can only be changed once.</div>
                        </div>
                        <div class="mb-3 me-5">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email address</label>
                            <p>u*****@gmail.com</p>
                            <a href="#">Change</a>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email address</label>
                            <p>u*****@gmail.com</p>
                            <a href="#">Change</a>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>


            </div>





        </div>
    </div>

    </div>


</body>
<script src="vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>