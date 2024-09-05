<!-- products.php -->
<?php
require 'db.php'; // Database connection

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <!-- Navigation Here -->
    </header>
    <main>
        <h2>All Products</h2>
        <div class="products">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="product-card">
                    <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                    <h3><?php echo $row['name']; ?></h3>
                    <p><?php echo $row['description']; ?></p>
                    <p>$<?php echo $row['price']; ?></p>
                    <button>Add to Cart</button>
                </div>
            <?php } ?>
        </div>
    </main>
    <footer>
        <!-- Footer Here -->
    </footer>
</body>
</html>
