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
        <div class="bg-body-secondary container-fluid p-3">
            <div class="bg-body p-4 rounded-3 shadow-sm">
                <div class="d-flex align-items-center">
                    <img src="images/user/pfp.png" class="img-thumbnail rounded-circle pfp me-3" alt="">
                    <div class="d-flex flex-column">
                        <p class="fs-5 fw-bold m-0 p-0">User Name</p>
                        <div class="d-flex">
                            <a href="" class="text-secondary text-decoration-none"><small><i class="bi bi-pen-fill pe-1"></i>Edit Profile</small></a>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column">
                    <div class="p-3">
                        <p class="fs-5 fw-bold mb-2">Categories</p>
                        <div>
                            <button class="btn btn-outline-success fs-6 fw-bold mb-2 ms-2 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                <i class="bi bi-gift me-1"></i>All Gadgets</button>
                            <!-- filter -->
                            <div class="collapse ps-3" id="collapse1">
                                <div class="d-flex align-items-start flex-column gap-1">
                                    <input type="checkbox" class="btn-check" id="btn-check-1" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btn-check-1">Photography/Videography</label>

                                    <input type="checkbox" class="btn-check" id="btn-check-2" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btn-check-2">Audio and Music</label>

                                    <input type="checkbox" class="btn-check" id="btn-check-3" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btn-check-3">Consumer Electronics</label>

                                    <input type="checkbox" class="btn-check" id="btn-check-4" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btn-check-4">Gaming and Entertainment</label>

                                    <input type="checkbox" class="btn-check" id="btn-check-5" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btn-check-5">Smart Home and IoT</label>

                                    <input type="checkbox" class="btn-check" id="btn-check-5" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btn-check-5">Wearables</label>
                                </div>
                            </div>
                        </div>
                        <input type="checkbox" class="btn-check" id="btn-check-6" autocomplete="off">
                        <label class="btn btn-outline-success fs-6 fw-bold mb-2 ms-2 border-0" for="btn-check-6"><i class="bi bi-bag me-1"></i>Newly Posted</label>

                        <input type="checkbox" class="btn-check" id="btn-check-7" autocomplete="off">
                        <label class="btn btn-outline-success fs-6 fw-bold mb-2 ms-2 border-0" for="btn-check-7"><i class="bi bi-stars me-1"></i>Top Ratings</label>

                        <input type="checkbox" class="btn-check" id="btn-check-8" autocomplete="off">
                        <label class="btn btn-outline-success fs-6 fw-bold mb-2 ms-2 border-0" for="btn-check-8"><i class="bi bi-percent me-1"></i>On Discount</label>
                        <br>
                        <input type="checkbox" class="btn-check" id="btn-check-9" autocomplete="off">
                        <label class="btn btn-outline-success fs-6 fw-bold mb-2 ms-2 border-0" for="btn-check-9"><i class="bi bi-plus me-1"></i>Others</label>

                    </div>

                </div>





            </div>
        </div>



    </div>

    <?php require_once 'footer.php' ?>
</body>
<script src="vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>