<?php require_once 'head.php'; ?>

<body>

    <div class="container-fluid image-bg m-0 p-0">
        <!-- navbar -->
        <?php require_once 'navbar.php'; ?>

        <!-- body -->
        <div class="row container-fluid bg-dark-subtle px-3 pb-5 pt-3 m-0">
            <div class="col-3 bg-body p-4 rounded-3 shadow-sm">
                <div class="d-flex align-items-center">
                    <img src="images/user/pfp.png" class="img-thumbnail rounded-circle pfp me-3 shadow-sm" alt="">
                    <div class="d-flex flex-column">
                        <p class="fs-5 fw-bold m-0 p-0">User Name <i class="bi bi-patch-check-fill text-success ms-1"><!--remove "fill" if not verified--></i></p>
                        <div class="d-flex">
                            <a href="" class="text-secondary text-decoration-none"><small><i class="bi bi-pen-fill pe-1"></i>Edit Profile</small></a>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="d-flex flex-column gap-2 mt-3">
                    <div class="accordion border-0" id="accordionPanelsStayOpen">
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header ">
                                <button class="accordion-button rounded-3 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    <i class="bi bi-person-fill-gear me-2"></i>My Account
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                <div class="accordion-body p-3">
                                    <div class="d-flex align-items-start flex-column gap-1">
                                        <a href="#" class="fs-6 text-decoration-none text-secondary">Profile</a>
                                        <a href="#" class="fs-6 text-decoration-none text-secondary">Banks & Cards</a>
                                        <a href="#" class="fs-6 text-decoration-none text-secondary">Address</a>
                                        <a href="#" class="fs-6 text-decoration-none text-secondary">Change Password</a>
                                        <a href="#" class="fs-6 text-decoration-none text-secondary">Privacy Settings</a>
                                        <a href="#" class="fs-6 text-decoration-none text-secondary">Notification Settings</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-3 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    <i class="bi bi-box2-heart-fill me-2 "></i>My Rentals
                                </button>
                            </h2>
                            <!-- <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                </div>
                            </div> -->
                        </div>

                        <div class="accordion-item border-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-3 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                    <i class="bi bi-bell-fill me-2"></i>Notifications
                                </button>
                            </h2>
                            <!-- <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                </div>
                            </div> -->
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-3 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                    <i class="bi bi-ticket-fill me-2"></i>Promos and Vouchers
                                </button>
                            </h2>
                            <!-- <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- rentals -->
            <div class="col">
                <div class="bg-body rounded-3 m-0 p-0">
                    <p class="fs-5 fw-bold ms-3">My Rentals</p>
                    <hr>
                    <!-- navigation tabs -->
                    <ul class="nav nav-tabs d-flex justify-content-around" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active text-dark px-5" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">
                                All</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-dark px-5" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="false">
                                Pending Approval</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-dark px-5" id="pay-tab" data-bs-toggle="tab" data-bs-target="#pay" type="button" role="tab" aria-controls="pay" aria-selected="false">
                                To Pay</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-dark px-5" id="pick-tab" data-bs-toggle="tab" data-bs-target="#pick" type="button" role="tab" aria-controls="pick" aria-selected="false">
                                For Pick Up</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-dark px-5" id="return-tab" data-bs-toggle="tab" data-bs-target="#return" type="button" role="tab" aria-controls="return" aria-selected="false">
                                Returned</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-dark px-5" id="complete-tab" data-bs-toggle="tab" data-bs-target="#complete" type="button" role="tab" aria-controls="complete" aria-selected="false">
                                Completed</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-dark px-5" id="cancel-tab" data-bs-toggle="tab" data-bs-target="#cancel" type="button" role="tab" aria-controls="cancel" aria-selected="false">
                                Cancelled</button>
                        </li>

                    </ul>
                </div>

                <!-- tab content -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <form class="d-flex gap-3 mt-3 justify-content-center px-5">
                            <input class="form-control rounded-3 px-3 shadow-sm" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                            <button type="button" class="btn gradient-success rounded-3 px-4 py-0 m-0 shadow-sm">Search</button>
                        </form>
                        <?php include 'renter_profile_product.php' ?>

                        <!-- product base design -->
                        <!-- <div class="bg-body mt-3 rounded-3 p-3">
                            <div class="row">
                                <div class="col d-flex align-items-center ms-3 gap-2 mb-2">
                                    <p class="m-0 p-0"><span class="badge text-bg-success me-2">Verified</span>Owner Name</p>
                                    <button class="btn btn-success px-2 py-1"><small><i class="bi bi-envelope-fill me-1"></i>Message</small></button>
                                    <button class="btn btn-outline-secondary px-2 py-1"><small><i class="bi bi-person-lines-fill me-1"></i>View Profile</small></button>
                                </div>
                                <div class="col d-flex align-items-center  justify-content-end me-3 gap-2 mb-2">
                                    <p class="m-0 p-0 text-success">Device has been returned to owner.</p>
                                    <i class="bi bi-info-circle"></i>
                                    <p class="m-0 p-0">|</p>

                                    <p class="m-0 p-0 text-success">RETURNED</p>
                                </div>
                            </div>
                            <hr class="mb-3 mt-0 p-0">
                            <div class="row m-0 p-0">
                                <div class="col-2 m-0 p-0">
                                    <img src="images/products/laptop.png" alt="product" class="img-thumbnail border-3 shadow-sm">
                                </div>
                                <div class="col-10 m-0 p-3 d-flex flex-column justify-content-around">
                                    <div class="m-0 p-0">
                                        <p class="fs-5 fw-bold m-0 p-0">Product Name</p>
                                        <p class="fs-6 text-secondary m-0 p-0">Brand Model</p>
                                        <p class="fs-6 active m-0 p-0">Renting Date</p>
                                    </div>

                                    <div class="d-flex justify-content-end align-items-baseline gap-2">
                                        <p class="fs-6 text-secondary m-0 p-0">Payment Total:</p>
                                        <p class="fs-4 fw-bold m-0 p-0">₱</p>
                                    </div>

                                    <div class="d-flex justify-content-end align-items-baseline gap-2 p-3 bg-body-tertiary rounded-3">
                                        <div class="col">
                                            <small class="m-0 p-0">Rate this item before mm-dd-yyyy to complete the transaction.</small>
                                        </div>

                                        <div class="col">
                                            <button class="btn btn-success px-5">Rate<i class="bi bi-star ms-2"></i></button>
                                            <button class="btn btn-outline-success">Request for Early Return/Refund</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                        b
                    </div>

                    <div class="tab-pane fade" id="pay" role="tabpanel" aria-labelledby="pay-tab">
                        c
                    </div>

                    <div class="tab-pane fade" id="pick" role="tabpanel" aria-labelledby="pick-tab">
                        d
                    </div>

                    <div class="tab-pane fade" id="return" role="tabpanel" aria-labelledby="return-tab">
                        e
                    </div>

                    <div class="tab-pane fade" id="complete" role="tabpanel" aria-labelledby="complete-tab">
                        f
                    </div>

                    <div class="tab-pane fade" id="cancel" role="tabpanel" aria-labelledby="cancel-tab">
                        g
                    </div>






                </div>
            </div>




            <!-- profile settings -->
            <!-- <div class="col ms-3 bg-body rounded-3 shadow-sm pb-5 pt-3 px-3">
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
            </div> -->





        </div>
    </div>

    </div>


</body>
<script src="vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>