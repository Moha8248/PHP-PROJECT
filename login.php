<?php
session_start();
require 'db.php';  // Include the database connection

// Initialize variables
$error_message = '';
$return_url = isset($_GET['return_url']) ? $_GET['return_url'] : 'index.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check user credentials (you need to implement user authentication logic here)
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Redirect to the original page the user intended to visit
        header('Location: ' . $return_url);
        exit;
    } else {
        $error_message = 'Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Login</h1>
</header>

<main>
    <form method="post" action="login.php?return_url=<?php echo urlencode($return_url); ?>">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <?php if (!empty($error_message)) { ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php } ?>
        <button type="submit">Login</button>
    </form>
</main>

<footer>
    <p>&copy; 2024 My E-commerce Site. All Rights Reserved.</p>
</footer>
</body>
</html>
