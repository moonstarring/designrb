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
        <div class="bg-body p-5">
            <div class="row">
                <div class="col-6">  
                    <h1 class="display-6 fw-bold m-0 p-0">Product Name</h1>
                    <div class="d-flex gap-2 mt-2">
                        <a href="#" class="btn btn-outline-secondary m-0 opacity-50"><small>tags</small></a>
                        <a href="#" class="btn btn-outline-secondary m-0 opacity-50"><small>tags</small></a>
                        <a href="#" class="btn btn-outline-secondary m-0 opacity-50"><small>tags</small></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex justify-content-end gap-1">
                        <a href="#" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Browse</a>
                        <p class="text-secondary"> > </p>
                        <a href="#" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Product Name</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-5">
                    <div id="carouselIndicators" class="carousel carousel-dark slide ms-2 mt-5 shadow-sm">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner border rounded-3 object-fit-cover">
                            <div class="carousel-item active">
                            <img src="images/products/airpods-4-anc-select-202409.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="images/products/laptop.png" class="d-block w-100" alt="...">
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

            </div>
        
        </div>









    </div>
</body>
<script src="vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>