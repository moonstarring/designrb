<?php require_once 'head.php'; ?>
<?php require_once 'navbar.php'; ?>

<body class="container-fluid bg-dark-subtle m-0 p-0">
    <!-- header thing -->
    <div class="row d-flex bg-body align-items-center justify-content-between rounded-top-5 shadow-lg py-4 px-5 mx-5">
        <p class="fs-4 fw-bold rb col-5 m-0">Rent Gadgets, Your Way</p>
        <form class="col-7 d-flex gap-3">
            <input class="form-control rounded-5 px-3 shadow-sm" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
            <button type="submit" class="btn gradient-success rounded-5 m-0 shadow-sm px-5">Search</button>
        </form>
    </div>

    <!-- profile -->
    <div class="container-fluid bg-body p-5 border">
        <div class="container-fluid bg-body position-relative border m-0 p-0">
            <div class="m-0 p-0 border position-absolute top-0 start-0 w-100 h-100" style="z-index: 1;">
                <img src="images/user/header.png" class="img-fluid object-fit-cover w-100 h-100 rounded-3" alt="header image">
            </div>
            <div class="position-relative mt-5 ms-4 mb-4 pe-5 me-5" style="z-index: 2;">
                <div class="d-flex bg-opacity shadow me-5 p-4 rounded-3">
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
    </div>

</body>
<script></script>

</html>