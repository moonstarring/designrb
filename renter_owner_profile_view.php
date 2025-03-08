<?php require_once 'head.php'; ?>
<?php require_once 'navbar.php'; ?>

<body class="container-fluid bg-dark-subtle m-0 p-0">
    <!-- header thing -->
    <div class="d-flex bg-body align-items-center justify-content-between shadow-lg py-4 px-5">
        <p class="fs-4 fw-bold rb col-5 m-0">Rent Gadgets, Your Way</p>
        <form class="col-7 d-flex gap-3">
            <input class="form-control rounded-5 px-3 shadow-sm" list="datalistOptions" id="exampleDataList" placeholder="Type to search for Gadgets...">
            <button type="submit" class="btn gradient-success rounded-5 m-0 shadow-sm px-5">Search</button>
        </form>
    </div>

    <div class="container-fluid bg-body px-5 mb-5">
        <!-- profile -->
        <div class="container-fluid bg-body position-relative border border-0 m-0 pt-5 rounded-3">
            <div class="m-0 p-0 position-absolute top-0 start-0 w-100 h-75" style="z-index: 1;">
                <img src="images/user/header.png" class="object-fit-cover w-100 h-75" alt="header image">
            </div>
            <div class="position-relative mt-5 ms-4 mb-4 pe-5 me-5" style="z-index: 2;">
                <div class="d-flex bg-body shadow me-5 p-4 rounded-3">
                    <img src="images/user/pfp.png" class="pfp2 rounded-circle shadow-sm mx-3">
                    <div class="row container-fluid d-flex align-items-center m-0 p-0">
                        <div class="col-4">
                            <p class="fs-5 fw-bold m-0 p-0">@ownername</p>
                            <div class="d-flex gap-2">
                                <p class="text-secondary fs-6">Tetuan</p>
                                <p class="text-secondary fs-6">•</p>
                                <p class="text-secondary fs-6">Verified</p>
                            </div>
                        </div>
                        <div class="col border-end">
                            <p class="fs-6 text-secondary m-0 p-0">5.0 <i class="bi bi-star-fill rb"></i></p>
                            <p class="fs-6 text-secondary m-0 p-0">8 reviews</p>
                        </div>
                        <div class="col border-end">
                            <p class="fs-6 text-secondary m-0 p-0">Very</p>
                            <p class="fs-6 text-secondary m-0 p-0">Responsive</p>
                        </div>
                        <div class="col border-end">
                            <p class="fs-6 text-secondary m-0 p-0">1m29d</p>
                            <p class="fs-6 text-secondary m-0 p-0">Joined</p>
                        </div>
                        <div class="col border-end">
                            <button type="button" class="btn btn-outline-success">Follow</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- bio -->
        <div class="container-fluid">
            <p class="fs-5 m-0 p-0">PROMO FOR NEW RENTERS: 100 PHP LESS</p>

            <div class="d-flex gap-2 m-0">
                <p class="text-secondary fs-6">Tetuan</p>
                <p class="text-secondary fs-6">•</p>
                <p class="text-secondary fs-6">Verified</p>
            </div>
            <hr>

        </div>

        <!-- navigation tabs -->
        <div class="">
            <ul class="nav nav-underline d-flex" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active text-dark px-5" id="listing-tab" data-bs-toggle="tab" data-bs-target="#listing" type="button" role="tab" aria-controls="listing" aria-selected="true">
                        Listings</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-dark px-5" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">
                        Reviews</button>
                </li>
            </ul>

            <!-- tab content -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active pb-5" id="listing" role="tabpanel" aria-labelledby="listing-tab">
                    <!-- <form class="d-flex gap-3 mt-3 justify-content-center px-5">
                        <input class="form-control rounded-3 px-3 shadow-sm" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                        <button type="button" class="btn gradient-success rounded-3 px-4 py-0 m-0 shadow-sm">Search</button>
                    </form> -->
                    <?php include 'browse_product.php' ?>
                </div>

                <div class="tab-pane fade pb-5 mt-3" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <?php include 'owner_review.php' ?>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'footer.php' ?>

</body>
<script src="vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>