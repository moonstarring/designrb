<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Rentbox</title>
    <link rel="icon" type="image/png" href="../images/rb logo white.png">
    <link href="vendor/bootstrap-5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="vendor/font/bootstrap-icons.css">
    <link rel="stylesheet" href="browse_new.css">
    <style>
    </style>
</head>
<body>
    <div class="container-fluid bg-secondary bg-gradient m-0 p-0">
        <div class="container bg-body rounded-bottom-5 d-flex mb-5 py-3">
            <a href="#">
                <img class="ms-5 my-4" src="images\rb logo text colored.png" alt="Logo" height="50px">
            </a>
            <div class="my-auto mx-auto d-flex gap-3">
                <a href="#" class="fs-5 text-decoration-none navlink fw-bold active">Browse</a>
                <a href="#" class="fs-5 text-decoration-none navlink fw-bold text-secondary">Become an Owner</a>
            </div>
            <div class="d-flex me-5 align-items-center gap-3">
                <div class="green d-flex align-items-center justify-content-center rounded-circle border border-subtle">
                    <i class="bi bi-search fs-5 text-dark"></i>
                </div>
                <div class="green d-flex align-items-center justify-content-center rounded-circle border border-subtle">
                    <i class="bi bi-basket3 fs-5 text-dark"></i>   
                </div>
                <div class="d-flex object-fit-cover border rounded-circle" height="60px" width="60px">
                    <img src="#" alt="pfp">
                </div>
            </div>
        </div>

        <div class="container bg-body rounded-top-5 d-flex">
            <div class="mx-5 my-4 container-fluid d-flex justify-content-between align-items-center">
                <p class="fs-4 fw-bold active my-auto">Rent Gadgets, Your Way</p>
                <div class="d-flex gap-3">
                    <input class="form-control rounded-5 px-3 shadow-sm" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                    <datalist id="datalistOptions">
                    <option value="San Francisco">
                    <option value="New York">
                    <option value="Seattle">
                    <option value="Los Angeles">
                    <option value="Chicago">
                    </datalist>
                    <button type="button" class="btn btn-success rounded-5 px-4 py-0 m-0 shadow-lg">Search</button>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <div class="row"> 
                <div class="col-3 pt-3 bg-body">
                    <div class="p-3">
                        <p class="fs-5 fw-bold mb-2 active">Categories</p>
                        <p class="fs-6 fw-bold mb-2 ms-2 active"><i class="bi bi-gift me-1"></i>All Gadgets</p>
                        <div class="d-flex align-items-start flex-column ms-3">
                            <div class="">
                                <button type="button" class="btn btn-outline-secondary text-start mx-auto mb-2" data-bs-toggle="button"><small>Photography/Videography</small></button>
                                <button type="button" class="btn btn-outline-secondary text-start mx-auto mb-2" data-bs-toggle="button"><small>Audio and Music</small></button>
                                <button type="button" class="btn btn-outline-secondary text-start mx-auto mb-2" data-bs-toggle="button"><small>Consumer Electronics</small></button>
                                <button type="button" class="btn btn-outline-secondary text-start mx-auto mb-2" data-bs-toggle="button"><small>Gaming and Entertainment</small></button>
                                <button type="button" class="btn btn-outline-secondary text-start mx-auto mb-2" data-bs-toggle="button"><small>Smart Home and IoT</small></button>
                                <button type="button" class="btn btn-outline-secondary text-start mx-auto mb-2" data-bs-toggle="button"><small>Wearables</small></button>                    
                            </div>    
                        </div>
                        <p class="fs-6 fw-bold mb-2 ms-2"><i class="bi bi-bag me-1"></i>Newly Posted</p>
                        <p class="fs-6 fw-bold mb-2 ms-2"><i class="bi bi-stars me-1"></i>Top Ratings</p>
                        <p class="fs-6 fw-bold mb-2 ms-2"><i class="bi bi-percent me-1"></i>On Discount</p>
                    </div>
                </div>





                <div class="col-9 pt-3 rounded-3">
                    <div class="row mb-3">
                        <div class="col-3">
                            <div class="border rounded-3 p-3 bg-body">
                                <img src="airpods-4-anc-select-202409.jpg" alt="Airpods" class="img-thumbnail shadow-sm product-image">
                                <p class="fs-5 mt-2 ms-2 mb-0">Apple Airpods Pro</p>
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <small class="ms-1 mb-0 text-secondary"><i class="bi bi-star-fill text-warning me-1"></i>5.0 (2 Reviews)</small>
                                    <p class="fs-5 ms-auto mb-0">₱200<small class="text-secondary">/day</small></p>
                                </div>
                                <div class="d-flex justify-content-between align-items-baseline mx-3 mt-2">
                                    <button class="btn btn-success btn-sm rounded-5 px-3 shadow">Rent Now</button>
                                    <button class="btn btn-dark btn-sm rounded-5 px-3 shadow">Add to Cart</button>
                                </div>
                            </div>
                        </div>   
                    </div>

                    
                    <div>
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

            <div class="mt-5 px-5 py-5 bg-body">
                <div class="d-flex justify-content-between">
                    <p class="fs-5 fw-bold mb-3 active">Explore our Recommendations</p>
                    <div>
                        <i class="bi bi-arrow-left me-2"></i>
                        <i class="bi bi-arrow-right"></i>
                    </div>
                </div> 
                <div class="row mb-3">
                    <div class="col-3">
                        <div class="border rounded-3 p-3 bg-body">
                            <img src="airpods-4-anc-select-202409.jpg" alt="Airpods" class="img-thumbnail shadow-sm product-image">
                            <p class="fs-5 mt-2 ms-2 mb-0">Apple Airpods Pro</p>
                            <div class="d-flex justify-content-between align-items-baseline">
                                <small class="ms-1 mb-0 text-secondary"><i class="bi bi-star-fill text-warning me-1"></i>5.0 (2 Reviews)</small>
                                <p class="fs-5 ms-auto mb-0">₱200<small class="text-secondary">/day</small></p>
                            </div>
                            <div class="d-flex justify-content-between align-items-baseline mx-3 mt-2">
                                <button class="btn btn-success btn-sm rounded-5 px-3 shadow">Rent Now</button>
                                <button class="btn btn-dark btn-sm rounded-5 px-3 shadow">Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="border rounded-3 p-3 bg-body">
                            <img src="airpods-4-anc-select-202409.jpg" alt="Airpods" class="img-thumbnail shadow-sm product-image">
                            <p class="fs-5 mt-2 ms-2 mb-0">Apple Airpods Pro</p>
                            <div class="d-flex justify-content-between align-items-baseline">
                                <small class="ms-1 mb-0 text-secondary"><i class="bi bi-star-fill text-warning me-1"></i>5.0 (2 Reviews)</small>
                                <p class="fs-5 ms-auto mb-0">₱200<small class="text-secondary">/day</small></p>
                            </div>
                            <div class="d-flex justify-content-between align-items-baseline mx-3 mt-2">
                                <button class="btn btn-success btn-sm rounded-5 px-3 shadow">Rent Now</button>
                                <button class="btn btn-dark btn-sm rounded-5 px-3 shadow">Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="border rounded-3 p-3 bg-body">
                            <img src="airpods-4-anc-select-202409.jpg" alt="Airpods" class="img-thumbnail shadow-sm product-image">
                            <p class="fs-5 mt-2 ms-2 mb-0">Apple Airpods Pro</p>
                            <div class="d-flex justify-content-between align-items-baseline">
                                <small class="ms-1 mb-0 text-secondary"><i class="bi bi-star-fill text-warning me-1"></i>5.0 (2 Reviews)</small>
                                <p class="fs-5 ms-auto mb-0">₱200<small class="text-secondary">/day</small></p>
                            </div>
                            <div class="d-flex justify-content-between align-items-baseline mx-3 mt-2">
                                <button class="btn btn-success btn-sm rounded-5 px-3 shadow">Rent Now</button>
                                <button class="btn btn-dark btn-sm rounded-5 px-3 shadow">Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="border rounded-3 p-3 bg-body">
                            <img src="airpods-4-anc-select-202409.jpg" alt="Airpods" class="img-thumbnail shadow-sm product-image">
                            <p class="fs-5 mt-2 ms-2 mb-0">Apple Airpods Pro</p>
                            <div class="d-flex justify-content-between align-items-baseline">
                                <small class="ms-1 mb-0 text-secondary"><i class="bi bi-star-fill text-warning me-1"></i>5.0 (2 Reviews)</small>
                                <p class="fs-5 ms-auto mb-0">₱200<small class="text-secondary">/day</small></p>
                            </div>
                            <div class="d-flex justify-content-between align-items-baseline mx-3 mt-2">
                                <button class="btn btn-success btn-sm rounded-5 px-3 shadow">Rent Now</button>
                                <button class="btn btn-dark btn-sm rounded-5 px-3 shadow">Add to Cart</button>
                            </div>
                        </div>
                    </div>
        
                    
                </div> 
            </div>

            <footer class="text-center text-lg-start bg-body-tertiary text-muted">
                <!-- Section: Social media -->
                <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                    <!-- Left -->
                    <div class="me-5 d-none d-lg-block">
                    </div>
                    <!-- Left -->

                    <!-- Right -->
                    <div>
                    <a href="" class="me-4 text-reset">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    </div>
                    <!-- Right -->
                </section>
                <!-- Section: Links  -->
                <section class="">
                    <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Company name
                        </h6>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas saepe at possimus, fuga nulla dolor soluta asperiores optio nemo harum expedita rem a mollitia obcaecati accusantium, itaque, iure rerum vitae.
                        </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">link</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">link</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">link</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">link</a>
                        </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Rentals</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="bi bi-house-door-fill me-2"></i> New York, NY 10012, US</p>
                        <p>
                        <i class="bi bi-envelope-fill me-2"></i>
                            info@example.com
                        </p>
                        <p><i class="bi bi-telephone-fill me-2"></i> + 01 234 567 88</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                    </div>
                </section>
                <!-- Section: Links  -->

                <!-- Copyright -->
                <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                    © 2021 Copyright:
                    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
                </div>
                <!-- Copyright -->
                </footer>



        </div>
        
        









    </div>
</body>
<script src="vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>