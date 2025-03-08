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
        <div class="bg-body-secondary p-4 shadow-lg">
            <div class="row container-fluid m-0 p-0 gap-3">

                <div class="col-4 img-thumbnail bg-body p-4 rounded-3 shadow-sm m-0">
                    <div id="carouselIndicators" class="carousel carousel-dark slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner border rounded-3 object-fit-cover shadow-sm border border-3">
                            <div class="carousel-item active">
                                <img src="images/products/airpods-4-anc-select-202409.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/products/airpods-4-anc-select-202409.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/products/airpods-4-anc-select-202409.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="col-5 bg-body p-4 rounded-3 shadow-sm m-0">
                    <div class="m-0 p-0">
                        <div class="d-flex justify-content-end gap-1">
                            <a href="#" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Browse</a>
                            <p class="text-secondary"> > </p>
                            <a href="#" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Product Name</a>
                        </div>
                        <div class="d-flex gap-2 mb-2 align-items-end">
                            <h1 class="display-6 fw-bold m-0 p-0">Product Name</h1>
                            <div class="m-0 p-0">
                                <a href="#" class="btn btn-outline-secondary m-0 opacity-50 m-0 p-1"><small class="m-0 p-0">tags</small></a>
                                <a href="#" class="btn btn-outline-secondary m-0 opacity-50 m-0 p-1"><small class="m-0 p-0">tags</small></a>
                                <a href="#" class="btn btn-outline-secondary m-0 opacity-50 m-0 p-1"><small class="m-0 p-0">tags</small></a>
                            </div>
                        </div>
                        <div class="d-flex">
                            <p class="me-1 text-decoration-none">5</p>
                            <i class="bi bi-star-fill text-warning"></i>
                            <p class="mx-2">|</p>
                            <a href="" class="me-1 text-decoration-none text-success">16 Reviews</a>
                        </div>

                        <div class="row d-flex align-items-bottom">
                            <div class="border col-5 rounded-3 shadow-sm p-0 mb-3 mt-2 ms-3">
                                <div class="m-0 bg-success-subtle align-items-stretch border text-center">
                                    <p class="active fs-6 my-2">Available</p>
                                </div>

                                <div class="d-flex justify-content-center align-items-center">
                                    <p class="fs-3 fw-bold m-0 p-0 active">₱</p>
                                    <p class="fs-3 fw-bold m-0 p-0 active">200</p>
                                    <p class="fs-3 fw-bold m-0 p-0 active">/</p>
                                    <p class="fs-3 fw-bold m-0 p-0 active">day</p>
                                </div>
                            </div>

                        </div>

                        <small class="text-secondary p-0 mb-2">Product Description:</small>
                        <p class="fs-6 p-0 mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, corrupti doloribus! </p>

                        <div class="row d-flex">
                            <div class="col-4">
                                <small class="text-secondary p-0 mb-2">Condition:</small>
                                <div class="d-flex gap-2 mt-1 mb-3">
                                    <a href="#" class="btn btn-outline-success m-0 p-1">Like new</a>
                                </div>

                                <small class="text-secondary p-0 mb-2">Comes with:</small>
                                <div class="d-flex gap-2 mt-1">
                                    <a href="#" class="btn btn-outline-success m-0 p-1">Case</a>
                                    <a href="#" class="btn btn-outline-success m-0 p-1">IOS Charger</a>
                                </div>
                            </div>

                            <div class="col-8 d-flex pe-2 d-flex flex-column">
                                <div class="row mb-5 ps-3 pe-5 me-5">
                                    <small class="text-secondary p-0 mb-2">Reserve:</small>

                                    <div class="d-flex flex-column m-0 p-0">
                                        <input class="border border-success border-1 rounded-top ps-2 text-success me-5" type="text" id="startDate" placeholder="Start Date" required>
                                        <input class="border border-success border-1 rounded-bottom ps-2 text-success me-5" type="text" id="endDate" placeholder="End Date" required>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="#"><button class="btn btn-outline-dark rounded-5 shadow-sm me-3 btn-lg">Add to Cart</button></a>
                                    <a href="#"><button class="btn btn-success rounded-5 shadow-sm gradient-success btn-lg">Rent Now</button></a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col bg-body p-4 rounded-3 shadow-sm m-0">
                    <img src="" alt="advertisement" class="img-thumbnail">
                    prmo code
                </div>
            </div>

            <div class="row container-fluid mt-3 mx-0 bg-body rounded-3 shadow-sm p-4 gap-3 d-flex align-items-center">
                <div class="col-1 d-flex justify-content-center align-items-center ps-4">
                    <img src="images/user/pfp.png" alt="" class="rounded-circle border shadow-sm img-thumbnail">
                </div>
                <div class="col-2 d-flex flex-column border-end m-0 p-0 align-self-start">
                    <a href="renter_owner_profile_view.php" class="fs-5 text-decoration-none text-dark fw-bold m-0 p-0">Owner Name</a>
                    <p href="#" class="fs-6 text-secondary p-0">Active 3 mins ago</p>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-success m-0 px-2">Message</a>
                        <a href="renter_owner_profile_view.php" class="btn btn-outline-secondary m-0 px-2">View Profile</a>
                    </div>
                </div>
                <div class="col-7 ps-0 m-0 flex-grow-1">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col d-flex flex-column justify-content-between">
                                    <p class="fs-6 text-secondary m-0 p-0">Rating</p>
                                    <p class="fs-6 text-secondary m-0 p-0">Rentals</p>
                                </div>
                                <div class="col d-flex flex-column justify-content-between">
                                    <a href="#" class="fs-6 text-success m-0 p-0 text-decoration-none">5</a>
                                    <a href="#" class="fs-6 text-success mt-3 p-0 text-decoration-none">15</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col d-flex flex-column justify-content-between">
                                    <p class="fs-6 text-secondary m-0 p-0">Response Rate</p>
                                    <p class="fs-6 text-secondary m-0 p-0">Response Time</p>
                                </div>
                                <div class="col d-flex flex-column justify-content-between">
                                    <a href="#" class="fs-6 text-success m-0 p-0 text-decoration-none">85%</a>
                                    <a href="#" class="fs-6 text-success mt-3 p-0 text-decoration-none">within hours</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col d-flex flex-column justify-content-between">
                                    <p class="fs-6 text-secondary m-0 p-0">Joined</p>
                                    <p class="fs-6 text-secondary m-0 p-0">Followers</p>
                                </div>
                                <div class="col d-flex flex-column justify-content-between">
                                    <a href="#" class="fs-6 text-success m-0 p-0 text-decoration-none">5 months ago</a>
                                    <a href="#" class="fs-6 text-success mt-3 p-0 text-decoration-none">130</a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="row container-fluid mt-3 mx-0 bg-body rounded-3 shadow-sm p-4 d-flex align-items-start">
                <p class="fs-5 text-decoration-none text-dark fw-bold mb-2 p-0">Product Specification</p>
                <div class="col-2 d-flex flex-column gap-3">
                    <small class="text-secondary pt-1">Category</small>
                    <small class="text-secondary pt-1">Available Stock</small>
                    <small class="text-secondary pt-1">Location</small>
                </div>

                <div class="col d-flex flex-column gap-3">
                    <div class="d-flex gap-1 p-0 m-0">
                        <a href="#" class="p-0 m-0 link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Wearables</a>
                        <p class="text-secondary m-0 p-0"> > </p>
                        <a href="#" class="p-0 mb-0 link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">IOS</a>
                    </div>
                    <p class="fs-6 text-success m-0 p-0">15</p>
                    <p class="fs-6 text-success m-0 p-0">Cabato Rd., Brgy. Tetuan, Zamboanga City</p>
                </div>

                <p class="fs-5 text-decoration-none text-dark fw-bold mt-5 mb-3 p-0">Product Description</p>
                <p class="m-0 ps-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora, architecto fuga
                    dolores quae sit fugiat ratione eius consequuntur! Ea, iusto quas nihil consequatur earum vitae aliquam sint tempore consequuntur praesentium!</p>
            </div>

            <div class="row container-fluid mt-3 mx-0 bg-body rounded-3 shadow-sm pe-5 p-4  d-flex align-items-start">
                <p class="fs-5 text-decoration-none text-dark fw-bold mb-2 p-0">Ratings</p>

                <div class="row container-fluid mt-3">
                    <div class="col-1">
                        <div class="d-flex flex-column align-items-center">
                            <p class="fs-5 fw-bold m-0 p-0">4 out of 5</p>
                            <div class="d-flex gap-1">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-11 d-flex align-items-center gap-2">
                        <button class="btn btn-small btn-outline-success"> All</button>
                        <button class="btn btn-small btn-outline-success">5 stars</button>
                        <button class="btn btn-small btn-outline-success">4 stars</button>
                        <button class="btn btn-small btn-outline-success">3 stars</button>
                        <button class="btn btn-small btn-outline-success">2 stars</button>
                        <button class="btn btn-small btn-outline-success">1 star</button>
                        <button class="btn btn-small btn-outline-success">With Media</button>
                        <button class="btn btn-small btn-outline-success">With Comments</button>
                    </div>
                </div>

                <div class="mt-3 d-flex">
                    <?php include 'owner_review.php'; ?>
                </div>

            </div>
        </div>



        <?php require_once 'footer.php' ?>






    </div>
</body>
<script src="vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>