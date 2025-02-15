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
        <div class="container bg-body rounded-top-5 d-flex">
            <div class="mx-5 my-4 container-fluid d-flex justify-content-between align-items-center">
                <p class="fs-4 fw-bold my-auto rb">Rent Gadgets, Your Way</p>
                <div class="d-flex gap-3">
                    <input class="form-control rounded-5 px-3 shadow-sm" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                    <datalist id="datalistOptions">
                    <option value="San Francisco">
                    <option value="New York">
                    <option value="Seattle">
                    <option value="Los Angeles">
                    <option value="Chicago">
                    </datalist>
                    <button type="button" class="btn btn-success rounded-5 px-4 py-0 m-0 shadow-sm">Search</button>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-light rounded-start-3">
            <div class="row"> 
                <!-- side bar - Categories -->
                <?php require_once 'browse_side.php'; ?>
                <!-- products -->
                <div class="col-9 pt-3 rounded-start-3 bg-body-secondary">
                    <div class="row mb-3 container rounded-start-3 bg-body-secondary">
                    <?php include "browse_product.php"; ?>
                    </div>

                    <!-- page count -->
                    <div class="mx-3 mb-5">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-light text-start" data-bs-toggle="button"><small><i class="bi bi-caret-left-fill"></i></small></button>
                            <div class="">
                                <button type="button" class="btn btn-light text-start" data-bs-toggle="button"><small>1</small></button>
                                <button type="button" class="btn btn-light text-start" data-bs-toggle="button"><small>2</small></button>
                                <button type="button" class="btn btn-light text-start" data-bs-toggle="button"><small>3</small></button>
                                <button type="button" class="btn btn-light text-start" data-bs-toggle="button"><small>...</small></button>
                                
                            </div>
                            <button type="button" class="btn btn-light text-start" data-bs-toggle="button"><small><i class="bi bi-caret-right-fill"></i></small></button>   
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recommendations -->
            <div class="px-5 py-5 bg-body">
                <div class="d-flex justify-content-between">
                    <p class="fs-5 fw-bold mb-3 active">Explore our Recommendations</p>
                    <div>
                        <i class="bi bi-arrow-left me-2"></i>
                        <i class="bi bi-arrow-right"></i>
                    </div>
                </div> 
                <div class="row mb-3">
                    <?php include "browse_product.php"; ?>
                </div> 
            </div>



            <footer class="text-center text-lg-start bg-body-tertiary text-muted border-top">
                <section class="">
                    <div class="container text-center text-md-start mt-5">
                        <div class="row mt-3">
                            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                                <h5 class="text-uppercase fw-bold mb-4">
                                    <a href="" class="rb text-decoration-none"><img src="images/brand/rb logo colored.png" class="me-1" alt="" width="50px" height="auto">Rentbox</a></h5>
                                <p>Rentbox is a peer to peer platform where you can borrow and share gadgets from other owners!<br>Rent Gadgets, Your Way</p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Our Socials
                            </h6>
                            <p><a href="#" class="me-4 text-reset"><i class="bi bi-facebook"></i></a></p>
                            <p><a href="#" class="me-4 text-reset"><i class="bi bi-twitter-x"></i></a></p>
                            <p><a href="#" class="me-4 text-reset"><i class="bi bi-linkedin"></i></a></p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Useful links
                            </h6>
                            <p>
                                <a href="#" class="text-decoration-none text-reset">My Profile</a>
                            </p>
                            <p>
                                <a href="#" class="text-decoration-none text-reset">Rentals</a>
                            </p>
                            <p>
                                <a href="#" class="text-decoration-none text-reset">About Us</a>
                            </p>
                            <p>
                                <a href="#" class="text-decoration-none text-reset">Customer Service</a>
                            </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Contact Us</h6>
                            <p><i class="bi bi-house-door-fill me-2"></i>Zamboanga City, 7000, PH</p>
                            <p><i class="bi bi-envelope-fill me-2"></i>rentbox@gmail.com</p>
                            <p><i class="bi bi-telephone-fill me-2"></i>+63 930 219 4166</p>
                            </div>
                            <!-- Grid column -->
                        </div>
                    <!-- Grid row -->
                    </div>
                </section>
                <!-- Section: Links  -->

                <!-- Copyright -->
                <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                    © 2025 Copyright:
                    <a class="text-reset fw-bolder" href="#">RENTBOX</a>
                </div>
                <!-- Copyright -->
                </footer>



        </div>
        
        









    </div>
</body>
<script src="vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>