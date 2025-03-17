<div class="col-auto col-md-3 col-xl-2 bg-body">
    <div class="d-flex flex-column align-items-center align-items-sm-start min-vh-100">
        <div class="d-flex flex-column mt-4 align-items-center justify-content-center px-5  mx-auto border-bottom mb-2">
            <img src="../images/user/pfp.png" width="110" height="110" class="rounded-circle img-thumbnail shadow-sm mb-2">
            <p class="fs-5 fw-bold m-0 p-0">Staff Name</p>
            <p class="fs-6 text-secondary m-0 p-0 mb-2">Clerk</p>
        </div>

        <nav role="navigation">   
            <ul class="nav nav-pills flex-column sidebar-nav">
                <li class="nav-item">
                    <a href="staff_dashboard.php" class="nav-link fs-6" aria-current="page">
                        <i class="bi bi-clipboard2-data me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="gadgets.php" class="nav-link link-dark fs-6">
                        <i class="bi bi-gift me-2"></i>
                        Gadgets
                    </a>
                </li>
                <li>
                    <a href="customers.php" class="nav-link link-dark fs-6">
                        <i class="bi bi-person-rolodex me-2"></i>
                        Customers
                    </a>
                </li>
                <li>
                    <a href="transactions.php" class="nav-link link-dark fs-6">
                        <i class="bi bi-calendar-heart me-2"></i>
                        Transactions
                    </a>
                </li>
                <li class="ps-auto">
                    <a href="help.php" class="nav-link link-dark fs-6">
                        <i class="bi bi-patch-question me-2"></i>
                        Help Center
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentPage = window.location.pathname;
        const navLinks = document.querySelectorAll('.sidebar-nav .nav-link');

        navLinks.forEach(link => {
            const linkPath = new URL(link.href).pathname; // Extract path from href
            if (currentPage === linkPath) {
                link.classList.add('link-success', 'fw-bold');
                link.classList.remove('link-dark'); // Remove link-dark, so active class is more visible
            } else {
                link.classList.remove('link-success', 'fw-bold');
                link.classList.add('link-dark'); // Ensure inactive links have link-dark
            }
        });
    });
</script>