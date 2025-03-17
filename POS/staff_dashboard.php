<?php require_once 'head.php' ?>

<?php require_once 'navbar.php' ?>

<body class="container-fluid bg-dark-subtle m-0 p-0">
    <div class="row d-flex container-fluid gap-2 min-vh-100 m-0 mb-5 p-3 gap-3">
        <div class="row d-flex justify-content-center bg-body rounded-3 shadow-sm p-3 m-0">
            <div class="col-auto">
                <button type="button" class="btn bg-success bg-gradient btn-lg text-white">Check In</button><!--  check in gadget from owner -->
            </div>

            <div class="col-auto">
                <button type="button" class="btn bg-success bg-gradient btn-lg text-white">Check Out</button><!--  check out gadget from renter -->
            </div>

            <div class="col-auto">
                <button type="button" class="btn bg-success bg-gradient btn-lg text-white">New Rental</button><!--  officially start rental period -->
            </div>

            <div class="col-auto">
                <button type="button" class="btn bg-success bg-gradient btn-lg text-white">Active Rentals</button><!--  view active rentals -->
            </div>

            <div class="col-auto">
                <button type="button" class="btn bg-success bg-gradient btn-lg text-white">Report Issues/Contact Admin</button><!--  report issues/contact admin -->
            </div>

        </div>
        <div class="col-auto bg-body rounded-end-3 border-start border-success shadow-sm" style="--bs-border-width: 5px;">
            <div class="d-flex border-bottom border-1 p-4">
                <div class="bg-secondary bg-gradient me-2 px-3 rounded-2 d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-hearts text-white fs-3 p-0"></i>
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <p class="m-0 p-0 fs-5 fw-bold">2</p>
                    <div class="d-flex">
                        <small class="m-0 p-0">Visits<a href="#"><i class="bi bi-info-circle text-secondary ms-1"></i></a></small>
                    </div>
                </div>
            </div>

            <div class="d-flex border-bottom border-1 p-4">
                <div class="bg-secondary bg-gradient me-2 px-3 rounded-2 d-flex align-items-center justify-content-center">
                    <i class="bi bi-gift text-white fs-3 p-0"></i>
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <p class="m-0 p-0 fs-5 fw-bold">2</p>
                    <div class="d-flex">
                        <small class="m-0 p-0">Gadgets released<a href="#"><i class="bi bi-info-circle text-secondary ms-1"></i></a></small>
                    </div>
                </div>
            </div>

            <div class="d-flex p-4">
                <div class="bg-secondary bg-gradient me-2 px-3 rounded-2 d-flex align-items-center justify-content-center">
                    <i class="bi bi-phone-flip text-white fs-3 p-0"></i>
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <p class="m-0 p-0 fs-5 fw-bold">2</p>
                    <div class="d-flex">
                        <small class="m-0 p-0">Transactions processed<a href="#"><i class="bi bi-info-circle text-secondary ms-1"></i></a></small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col d-flex flex-column gap-3">
            <div class="row p-3 bg-body rounded-3 shadow-sm">
                <p class="fs-6 fw-bold">Rental Queue</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row p-3 bg-body rounded-3 shadow-sm">
                <p class="fs-6 fw-bold">Return Queue</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row p-3 bg-body rounded-3 shadow-sm">
                <p class="fs-6 fw-bold">Overdue Rentals</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>







    </div>
    <?php require_once 'footer.php'; ?>

</body>
<script src="../vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>