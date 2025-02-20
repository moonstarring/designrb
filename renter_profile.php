<?php require_once 'head.php'; ?>

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
                        <p class="fs-5 fw-bold m-0 p-0">User Name <i class="bi bi-patch-check-fill text-success ms-1"><!--remove "fill" if not verified--></i></p>
                        <div class="d-flex">
                            <a href="" class="text-secondary text-decoration-none"><small><i class="bi bi-pen-fill pe-1"></i>Edit Profile</small></a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="d-flex flex-column gap-2 mt-3">
                    <a class="fs-6 fw-bold text-decoration-none text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
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
                    <a class="fs-6 fw-bold border-0 text-decoration-none active" href=""><i class="bi bi-box2-heart-fill me-1 "></i>My Rentals</a>
                    <a class="fs-6 fw-bold border-0 text-decoration-none text-dark" href=""><i class="bi bi-bell-fill me-1"></i>Notifications</a>
                    <a class="fs-6 fw-bold border-0 text-decoration-none text-dark" href=""><i class="bi bi-ticket-fill me-1"></i>Promos and Vouchers</a>
                </div>
            </div>
            <!-- rentals -->
            <div class="col ms-3 bg-body-secondary">
                <div class="bg-body p-4 rounded-3">
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
                            <button class="nav-link text-dark px-5" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab" aria-controls="completed" aria-selected="false">
                                Completed</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-dark px-5" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled" type="button" role="tab" aria-controls="cancelled" aria-selected="false">
                                Cancelled</button>
                        </li>
                    
                    </ul>
                </div>

                <!-- tab content -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active border" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <form class="d-flex gap-3 mt-3 justify-content-center px-5">
                            <input class="form-control rounded-3 px-3 shadow-sm" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                            <button type="button" class="btn gradient-success rounded-3 px-4 py-0 m-0 shadow-sm">Search</button>
                        </form>

                        <div class="bg-body mt-3 rounded-3 p-3">
                            aasdasd

                        </div>
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

                    <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                        e
                    </div>

                    <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                        f
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