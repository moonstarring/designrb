<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection
require_once __DIR__ . '/../db/db.php';

// Initialize search term
$searchTerm = '';
if (isset($_GET['search'])) {
    $searchTerm = htmlspecialchars($_GET['search']);
}

// Query to fetch all products based on the search term along with average rating and rating count
$sql = "
    SELECT 
        p.*, 
        IFNULL(AVG(c.rating), 0) AS average_rating, 
        COUNT(c.rating) AS rating_count
    FROM 
        products p
    LEFT JOIN 
        comments c ON p.id = c.product_id
    WHERE 
        p.name LIKE :searchTerm OR p.description LIKE :searchTerm
    GROUP BY 
        p.id
";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
$stmt->execute();
$allProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Format the product data as needed
$formattedProducts = [];
foreach ($allProducts as $product) {
    // Round the average rating to one decimal place for consistency
    $averageRating = round(floatval($product['average_rating']), 1);
    $ratingCount = intval($product['rating_count']);

    $formattedProducts[] = [
        'id' => $product['id'],
        'owner_id' => $product['owner_id'],
        'name' => htmlspecialchars($product['name']),
        'brand' => htmlspecialchars($product['brand']),
        'description' => htmlspecialchars($product['description']),
        'rental_price' => number_format($product['rental_price'], 2),
        'status' => htmlspecialchars($product['status']),
        'created_at' => $product['created_at'], // Format as needed
        'updated_at' => $product['updated_at'], // Format as needed
        'image' => $product['image'],
        'quantity' => $product['quantity'],
        'category' => htmlspecialchars($product['category']),
        'rental_period' => htmlspecialchars($product['rental_period']),
        'average_rating' => $averageRating,
        'rating_count' => $ratingCount
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Rentbox</title>
    <link rel="icon" type="image/png" href="../images/rb logo white.png">
    <link href="../vendor/bootstrap-5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../vendor/font/bootstrap-icons.css">
    <style>
        .card:hover {
            transform: scale(1.01); 
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.1s ease, box-shadow 0.1s ease;
        }
    </style>
</head>
<body>
    <?php require_once '../includes/navbar.php'; ?>
    
    <hr class="m-0 p-0">
    
    <header class="container-fluid pt-5">
        <div class="container pt-1">
            <form class="d-flex my-lg-0" method="GET" action="">
                <input class="form-control input-group-text shadow-sm rounded-pill ps-4 py-2 border" type="text" placeholder="Search" id="searchInput" name="search" value="<?php echo $searchTerm; ?>"/>
                <button class="btn btn-success ms-4 me-3 my-sm-0 rounded-circle d-flex align-items-center ms-2 shadow" type="submit">
                    <i class="bi bi-search text-white" style="font-size: 20px;"></i>
                </button>
            </form>
        </div>
        <div class="container px-4 px-lg-5 my-lg-5">
            <div class="text-center">
                <h1 class="display-4 fw-bolder">Rent Gadgets, Your Way</h1>
                <p class="lead fw-normal mb-0">Explore a world of possibilities.</p>
            </div>
        </div>
    </header>
    <hr>

    <!--items-->
    <div class="album rounded-4 my-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($formattedProducts as $product): ?>
                    <div class="col">
                        <a href="item.php?id=<?php echo $product['id']; ?>" class="card rounded-5 text-decoration-none">
                            <img src="../img/uploads/<?php echo $product['image']; ?>" class="bd-placeholder-img rounded-top-5 card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>" width="100%" height="255px" style="object-fit: cover;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-end">
                                        <h5 class="card-title mb-0 me-2"><?php echo htmlspecialchars($product['name']); ?></h5>
                                        <small class="text-body-secondary ms-0"><?php echo htmlspecialchars($product['category']); ?></small>  
                                    </div>
                                    <img class="pfp rounded-circle img-thumbnail" src="../images/pfp.png" alt="pfp" height="40px" width="40px" style="object-fit: contain;">
                                </div>
                                <h6 class="card-subtitle mb-2 text-success">PHP <?php echo $product['rental_price']; ?>
                                <small class="text-body-secondary">/day</small>
                                </h6>
                                <div class="d-flex gap-1 align-items-center">
                                    <!-- Rating Display -->
                                    <?php
                                        $averageRating = $product['average_rating'];
                                        $ratingCount = $product['rating_count'];
                                        $fullStars = floor($averageRating);
                                        $halfStar = ($averageRating - $fullStars) >= 0.5 ? 1 : 0;
                                        $emptyStars = 5 - $fullStars - $halfStar;
                                    ?>
                                    <?php for ($i = 0; $i < $fullStars; $i++): ?>
                                        <i class="bi bi-star-fill text-warning"></i>
                                    <?php endfor; ?>
                                    <?php if ($halfStar): ?>
                                        <i class="bi bi-star-half text-warning"></i>
                                    <?php endif; ?>
                                    <?php for ($i = 0; $i < $emptyStars; $i++): ?>
                                        <i class="bi bi-star text-warning"></i>
                                    <?php endfor; ?>
                                    
                                    <small class="text-body-secondary border-end pe-2 ms-2"><?php echo $averageRating; ?> (<?php echo $ratingCount; ?>)</small>
                                    <i class="bi bi-geo-alt-fill ps-2 text-warning"></i>
                                    <small class="text-body-secondary"><?php echo htmlspecialchars($product['brand']); ?></small>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <hr>   
    <?php require_once '../includes/footer.html'; ?>    
</body>
<script src="..\vendor\bootstrap-5.3.3\dist\js\bootstrap.bundle.min.js"> </script>
<script>
    //search input
    const searchInput = document.getElementById('searchInput');

    searchInput.addEventListener('focus', function() {
        this.classList.add('border-success');
    });

    searchInput.addEventListener('blur', function() {
        this.classList.remove('border-success');
    });
</script>
</html>