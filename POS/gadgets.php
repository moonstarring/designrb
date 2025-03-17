<?php require_once 'head.php' ?>

<?php require_once 'navbar.php' ?>

<body class="container-fluid bg-dark-subtle m-0 p-0">
    <div class="col d-flex flex-column m-0 p-3 gap-3 container-fluid">
        <div class="row d-flex bg-body align-items-center justify-content-between rounded-3 m-0 py-3">
            <p class="fs-5 fw-bold rb col-5 m-0">Your Gadgets, Your Way</p>
            <form class="col-7 d-flex gap-3">
                <input class="form-control rounded-5 px-3 shadow-sm" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                <button type="submit" class="btn gradient-success rounded-5 m-0 shadow-sm px-5">Search</button>
            </form>
        </div>

        <!-- data table -->
        <div class="row d-flex bg-body align-items-center justify-content-between rounded-3 m-0 py-3">
        </div>
    </div>

    

    <?php require_once 'footer.php'; ?>

</body>
<script src="../vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>