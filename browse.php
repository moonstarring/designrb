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
                    <datalist id="datalistOptions" class="m-0 p-0">
                        <option value="San Francisco">
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
                <div class="col-9 rounded-start-3 bg-body-secondary">
                    <div class="row mb-3 mt-0 container rounded-start-3 bg-body-secondary">
                        <?php include "browse_product.php"; ?>
                    </div>

                    <!-- page count, ikaw na bahala gar hahahhaha -->
                    <div class="mx-3 mb-4">
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
                        <button class="btn btn-outline-success"><i class="bi bi-arrow-left"></i></button>
                        <button class="btn btn-outline-success"><i class="bi bi-arrow-right"></i></button>
                    </div>
                </div>
                <div class="row mb-3">
                    <?php include "browse_product.php"; ?>
                </div>
            </div>



            <?php require_once 'footer.php' ?>
        </div>


    </div>











    </div>

    <?php require_once 'footer.php' ?>
</body>
<script src="vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>