





<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Rentbox</title>
        <link rel="icon" type="image/png" href="images\rb logo white.png">
        <link href="vendor/bootstrap-5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="vendor/font/bootstrap-icons.css">
    </head>
    <style>
    </style>
    
    <body>
        <?php
        require_once 'includes/navbar.php';
        ?>
        
        
        <main class="container-fluid">
            <div class="container-fluid">
                <div class="card mx-auto mb-5 border border-0" style="width:500px;">
                    <div class="card-body d-flex flex-column flex-nowrap justify-content-center">
                        <div class="mt-4 text-center d-flex justify-content-center">
                            <h3 class="bg-success text-white rounded-circle pt-1" style="width: 40px; height: 40px">3</h3>
                        </div>
                        <h5 class="text-center mb-1 fw-bold">Verify your Account</h5>
                        <h6 class="text-center mx-4 mt-1 mb-4">Rentbox requires a three-step verification process to ensure your account is secure.</h6>

                        <span class="badge text-bg-success text-center mx-4 mt-1 mb-4 fs-6">Cosignee Information</span>

                        <div class="form-floating mb-3" style="font-size: 14px;">
                            <input type="email" class="form-control ps-4 rounded-5" id="floatingInput" placeholder="Email" >
                            <label for="floatingInput" class="ps-4">Email</label>
                        </div>
                        <div class="d-flex gap-1">
                            <div class="form-floating mb-3" style="font-size: 14px;">
                                <input type="text" class="form-control ps-4 rounded-5" id="floatingInput" placeholder="First Name" >
                                <label for="floatingInput" class="ps-4">First Name</label>
                            </div>

                            <div class="form-floating mb-3" style="font-size: 14px;">
                                <input type="text" class="form-control ps-4 rounded-5" id="floatingInput" placeholder="Last Name" >
                                <label for="floatingInput" class="ps-4">Last Name</label>
                            </div>
                        </div>
                        <div class="form-floating mb-3" style="font-size: 14px;">
                            <input type="text" class="form-control ps-4 rounded-5" id="floatingInput" placeholder="Affliation" >
                            <label for="floatingInput" class="ps-4">Relationship to the Renter ex. Spouse, Mother..</label>
                        </div>
                        
                        <span class="badge text-bg-success text-center mx-4 mt-4 mb-2 fs-6">Cosignee Verification</span>
                        
                        <div class="input-group mb-3 mt-2">
                            <small class="mb-3">Upload a photo of your cosignee's valid id. View 
                                <a href="">Valid ID list.</a></small>
                            <label class="input-group-text rounded-start-5 btn btn-outline-success" for="inputGroupFile01">Upload</label>
                            <input type="file" class="form-control rounded-end-5 btn btn-outline-success" id="inputGroupFile01">
                        </div>
                        
                        <div class="input-group mb-3 mt-4">
                            <small class="mb-3">Upload a recent photo of your cosignee to verify ID. View 
                                <a href="">details.</a></small>
                            <label class="input-group-text rounded-start-5 btn btn-outline-success" for="inputGroupFile01">Upload</label>
                            <input type="file" class="form-control rounded-end-5 btn btn-outline-success" id="inputGroupFile01">
                        </div>

                        <a type="submit" class="btn btn-success rounded-5 mx-5 my-3 shadow" href="login.php">Save & Continue</a>
                        <div class="d-flex mb-3 mx-4 justify-content-center" style="font-size: 12px;">
                            <p class="text-center">
                            Signing up for a Rentbox account means you agree to the <br><a href=""class="text-secondary">Privacy Policy</a> and <a href=""class="text-secondary">Terms of Service</a>
                            </p>
                        </div>
                        
                        
                    </div>
                </div>

            </div>
        </main>

                
        <footer class="mt-5 px-3 bg-body fixed-bottom">
            <div class="d-flex flex-column flex-sm-row justify-content-between py-2 border-top">
                <p>© 2024 Rentbox. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                <li class="ms-3"><a href=""><i class="bi bi-facebook text-body"></i></a></li>
                <li class="ms-3"><a href=""><i class="bi bi-twitter-x text-body"></i></a></li>
                <li class="ms-3"><a href=""><i class="bi bi-linkedin text-body"></i></a></li>
                </ul>
            </div>
        </footer>
    </body>
<script src="vendor\bootstrap-5.3.3\dist\js\bootstrap.bundle.min.js"> </script>
<script>
</script>
</html>