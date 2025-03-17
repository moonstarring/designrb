<div class="px-3 d-flex py-4 shadow align-items-center justify-content-between" style="background-color: #1F4529;">
    <div class="d-flex align-items-center gap-2">
        <img class="" src="../images/brand/rb logo white.png" alt="Logo" height="50px">
        <h1 class="fs-2 fw-bold text-white me-5 p-0 my-0" id="">RentBox POS</h1>
    </div>

    <nav role="navigation" class="mx-auto">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="staff_dashboard.php" class="nav-link fs-6" aria-current="page">
                    <i class="bi bi-clipboard2-data me-2"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="gadgets.php" class="nav-link link-light fs-6">
                    <i class="bi bi-gift me-2"></i>
                    Gadgets
                </a>
            </li>
            <li>
                <a href="customers.php" class="nav-link link-light fs-6">
                    <i class="bi bi-person-rolodex me-2"></i>
                    Customers
                </a>
            </li>
            <li>
                <a href="transactions.php" class="nav-link link-light fs-6">
                    <i class="bi bi-calendar-heart me-2"></i>
                    Transactions
                </a>
            </li>
            <!-- disabled muna hehe -->
            <li class="ps-auto">
                <a href="help.php" class="nav-link disabled link-light fs-6 " aria-disabled="true">
                    <i class="bi bi-patch-question me-2"></i>
                    Help Center
                </a>
            </li>
        </ul>
    </nav>
    <div class="dropdown">
        <button class="btn btn-outline-light d-flex align-items-center justify-content-center text-decoration-none gap-2" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
            <p class="m-0 p-0">Staff Name</p>
            <img src="../images/user/pfp.png" width="40" height="40" class="rounded-circle border shadow-sm">
        </button>
        <ul class="dropdown-menu dropdown-menu text-small shadow" aria-labelledby="dropdownUser">
            <li><p class="dropdown-item m-0">Clerk</p></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Contact Admin</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Report Issue</a></li>
            <li><a class="dropdown-item" href="#">Sign Out</a></li>
        </ul>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentPage = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-link');

        navLinks.forEach(link => {
            const linkPath = new URL(link.href).pathname;
            if (currentPage === linkPath) {
                link.classList.add('bg-body', 'fw-bold', 'link-success');
                link.classList.remove('link-light');
            } else {
                link.classList.remove('link-success', 'fw-bold');
                link.classList.add('link-light');
            }
        });
    });
</script>