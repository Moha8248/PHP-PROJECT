<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - MyShop</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        header {
    background-color: #333;
    color: #fff;
    padding: 15px 0;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.logo a {
    animation-name: swingInLeft;
    text-decoration: none;
    color: #fff;
    font-size: 24px;
}

.nav-links {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

.nav-links li {
    margin-left: 20px;
}

.nav-links a {
    text-decoration: none;
    color: #fff;
    font-size: 18px;
}

.dropdown {
    display: inline-block;
    position: relative;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #fff;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #f1f1f1;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.search-bar {
    display: flex;
    align-items: center;
}

.search-bar input {
    padding: 5px;
    font-size: 16px;
    margin-right: 10px;
}

.search-bar button {
    padding: 6px 10px;
    background-color: #f0ad4e;
    border: none;
    color: white;
    cursor: pointer;
}

.search-bar button:hover {
    background-color: #ec971f;
}
        .contact-section {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #f5f5f5;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.contact-section h1 {
    text-align: center;
    margin-bottom: 20px;
}

.contact-section p {
    text-align: center;
    color: #666;
}

form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

textarea {
    resize: vertical;
}

button[type="submit"] {
    padding: 10px;
    background-color: #f0ad4e;
    border: none;
    color: white;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
}

button[type="submit"]:hover {
    background-color: #ec971f;
}

.success-message {
    color: green;
    text-align: center;
    margin-bottom: 15px;
}

.error-message {
    color: red;
    text-align: center;
    margin-bottom: 15px;
}
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="index.php">CarCrafter</a>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Products</a>
                    <div class="dropdown-content">
                        <a href="#">Steering Wheel Cover</a>
                        <a href="#">Fog Lights</a>
                        <a href="#">Dash Cam</a>
                        <a href="#">Floor Mats</a>
                        <a href="#">Car Air Freshener</a>
                    </div>
                <li><a href="#">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="search-bar">
                <input type="text" placeholder="Search for products...">
                <button type="button">Search</button>
            </div>
        </nav>
    </header>

    <!-- Contact Form Section -->
    <main>
        <section class="contact-section">
            <h1>Contact Us</h1>
            <p>If you have any questions, feel free to reach out to us using the form below.</p>

            <?php if (isset($success)) { echo '<p class="success-message">' . $success . '</p>'; } ?>
            <?php if (isset($error)) { echo '<p class="error-message">' . $error . '</p>'; } ?>

            <form action="contact.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        </section>
    </main>
</body>
</html>