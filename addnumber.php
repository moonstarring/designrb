





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
                            <h3 class="bg-success text-white rounded-circle pt-1" style="width: 40px; height: 40px">1</h3>
                        </div>
                        <h5 class="text-center mt-4 fw-bold">Verify your Account</h5>
                        <h6 class="text-center mx-4 mb-4">Rentbox requires a three-step verification process to ensure your account is secure.</h6>
                        
                        
                        <div class="input-group mb-3 mx-3">
                            <span class="input-group-text rounded-start-5">+63</span>
                            <div class="form-floating" style="font-size: 14px;">
                                <input type="text" class="form-control ps-4 rounded-end-5" id="floatingInput" placeholder="Enter your mobile number">
                                <label for="floatingInput" class="ps-4">Enter your mobile number</label>
                            </div>
                        </div>
                        
                        <a type="submit" class="btn btn-success rounded-5 mx-5 mt-2 mb-3 shadow" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Send OTP</a>
                        <div class="d-flex mb-3 mx-4 justify-content-center" style="font-size: 12px;">
                            <p class="text-center">
                            Signing up for a Rentbox account means you agree to the <br><a href=""class="text-secondary">Privacy Policy</a> and <a href=""class="text-secondary">Terms of Service</a>
                            </p>
                        </div>
                        
                        
                    </div>
                </div>

            </div>
        </main>

        <!-- modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-5">
                <div class="modal-header d-flex align-items-center">
                    <img src="images/rb logo colored.png" class="ms-1 me-3" alt="" width="40px" height="auto">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Verify Your Account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">
                    <h5 class="text-center my-3 fw-bold">Verify your Account</h5>
                    <div class="form-floating d-flex flex-column justify-content-center gap-3" style="font-size: 14px;">
                        <input type="text" class="form-control ps-4 rounded-5" id="floatingInput" placeholder="Enter your mobile number">
                        <label for="floatingInput" class="ps-4">Enter the OTP sent to your number</label>
                        <div class="d-flex flex-column justify-content-center mx-5"><a href="addid.php" class="btn btn-success rounded-5 shadow mx-5">Verify OTP</a></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-4" data-bs-dismiss="modal">Resend OTP</button>
                    <a type="button" class="btn btn-primary rounded-4" href="addid.php">Continue</a>
                </div>
                </div>
            </div>
        </div>




        
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
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
    })
</script>
</html>