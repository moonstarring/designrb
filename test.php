<!DOCTYPE html>
<html>
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

<nav role="navigation">
  <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32">
        <use xlink:href="#bootstrap" />
      </svg>
      <span class="fs-4">Rentbox</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto sidebar-nav">
      <li class="nav-item">
        <a href="rentals.php" class="nav-link" aria-current="page">
          <svg class="bi me-2" width="16" height="16">
            <use xlink:href="#home" />
          </svg>
          Rentals
        </a>
      </li>
      <li>
        <a href="gadgets.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16">
            <use xlink:href="#speedometer2" />
          </svg>
          Gadgets
        </a>
      </li>
      <li>
        <a href="customers.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16">
            <use xlink:href="#table" />
          </svg>
          Customers
        </a>
      </li>
      <li>
        <a href="transactions.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16">
            <use xlink:href="#grid" />
          </svg>
          Transactions
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>
</nav>
</body>
<script src="vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js">
    document.addEventListener('DOMContentLoaded', function() {
    const currentPage = window.location.pathname;
    const navLinks = document.querySelectorAll('.sidebar-nav .nav-link');

    navLinks.forEach(link => {
      const linkPath = new URL(link.href).pathname; // Extract path from href
      if (currentPage === linkPath) {
        link.classList.add('active');
        link.classList.remove('link-dark'); // Remove link-dark, so active class is more visible
      } else {
        link.classList.remove('active');
        link.classList.add('link-dark');  // Ensure inactive links have link-dark
      }
    });
  });
</script>
</html>