<?php
session_start();
require 'db.php';  // Include the database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page and pass the current URL to return to after login
    header('Location: login.php?return_url=' . urlencode($_SERVER['REQUEST_URI']));
    exit;
}

// Check if the cart is empty
if (empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty. <a href='products.php'>Continue shopping</a></p>";
    exit;
}
// Fetch products in the cart from the database
$cart_items = [];
$total_price = 0;
if (!empty($_SESSION['cart'])) {
    $product_ids = implode(',', array_keys($_SESSION['cart']));
    $query = "SELECT * FROM products WHERE id IN ($product_ids)";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $row['quantity'] = $_SESSION['cart'][$row['id']];
        $row['total'] = $row['price'] * $row['quantity'];
        $total_price += $row['total'];
        $cart_items[] = $row;
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve user input
    $user_id = $_SESSION['user_id'];
    $shipping_address = mysqli_real_escape_string($conn, $_POST['shipping_address']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']); // Dummy field for payment method

    // Insert order into 'orders' table
    $order_query = "INSERT INTO orders (user_id, total) VALUES ('$user_id', '$total_price')";
    if (mysqli_query($conn, $order_query)) {
        $order_id = mysqli_insert_id($conn);  // Get the inserted order's ID
        
        // Insert order items into 'order_items' table
        foreach ($cart_items as $item) {
            $product_id = $item['id'];
            $quantity = $item['quantity'];
            $order_item_query = "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('$order_id', '$product_id', '$quantity')";
            mysqli_query($conn, $order_item_query);
        }

        // Clear the cart
        unset($_SESSION['cart']);

        // Redirect to thank you page or order confirmation
        header('Location: thank_you.php?order_id=' . $order_id);
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Checkout</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="products.php">Products</a>
        <a href="cart.php">Cart</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<main>
    <h2>Review Your Cart</h2>
    
    <?php if (!empty($cart_items)) { ?>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart_items as $item) { ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td>$<?php echo number_format($item['price'], 2); ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>$<?php echo number_format($item['total'], 2); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Total</td>
                    <td>$<?php echo number_format($total_price, 2); ?></td>
                </tr>
            </tfoot>
        </table>
    <?php } ?>

    <h2>Shipping and Payment</h2>
    <form method="post" action="checkout.php">
        <div>
            <label for="shipping_address">Shipping Address:</label>
            <textarea name="shipping_address" id="shipping_address" required></textarea>
        </div>
        <div>
            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" id="payment_method" required>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
                <option value="cash_on_delivery">Cash on Delivery</option>
            </select>
        </div>
        <button type="submit">Place Order</button>
    </form>
</main>

<footer>
    <p>&copy; 2024 My E-commerce Site. All Rights Reserved.</p>
</footer>
</body>
</html>
