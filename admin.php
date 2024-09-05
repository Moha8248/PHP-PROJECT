<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - CarCrafter</title>
    <link rel="stylesheet" href="admin_styles.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>/* General Styles */
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    display: flex;
}

/* Sidebar Navigation */
.sidebar {
    width: 250px;
    height: 100vh;
    background-color: #333;
    color: #fff;
    display: flex;
    flex-direction: column;
    position: fixed;
    left: 0;
    top: 0;
    transition: width 0.3s;
}

.sidebar h2 {
    text-align: center;
    padding: 20px;
    border-bottom: 1px solid #444;
}

.sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar ul li {
    width: 100%;
    padding: 15px;
    border-bottom: 1px solid #444;
    text-align: center;
}

.sidebar ul li a {
    color: #fff;
    text-decoration: none;
    display: block;
}

.sidebar ul li:hover {
    background-color: #575757;
}

.sidebar.active {
    width: 60px;
}

.sidebar.active ul li {
    text-align: left;
    font-size: 0;
}

.sidebar.active ul li a::before {
    font-size: 18px;
    display: inline-block;
    width: 100%;
    text-align: center;
    font-size: 18px;
}

/* Main Content */
.main-content {
    margin-left: 250px;
    padding: 20px;
    flex-grow: 1;
    transition: margin-left 0.3s;
}

.main-content header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 20px;
    border-bottom: 1px solid #ccc;
}

.main-content .toggle-btn {
    font-size: 24px;
    background: none;
    border: none;
    cursor: pointer;
}

/* Dashboard Sections */
.dashboard-section {
    margin: 40px 0;
}

.dashboard-section h2 {
    margin-bottom: 20px;
}

/* Table Styles */
.dashboard-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.dashboard-table th,
.dashboard-table td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

.dashboard-table th {
    background-color: #f4f4f4;
}

.dashboard-table tr:hover {
    background-color: #f1f1f1;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .sidebar {
        width: 60px;
    }

    .sidebar.active {
        width: 250px;
    }

    .main-content {
        margin-left: 60px;
    }
}
</style>
</head>
<body>

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="#orders"><i class="fas fa-box"></i> Orders</a></li>
            <li><a href="#stocks"><i class="fas fa-warehouse"></i> Stocks</a></li>
            <li><a href="#categories"><i class="fas fa-tags"></i> Categories</a></li>
            <li><a href="#delivery"><i class="fas fa-truck"></i> Delivery Process</a></li>
            <li><a href="#payments"><i class="fas fa-credit-card"></i> Payment History</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <header>
            <h1>Dashboard</h1>
            <button class="toggle-btn" onclick="toggleSidebar()">&#9776;</button>
        </header>

        <!-- Orders Section -->
        <section id="orders" class="dashboard-section">
            <h2>Manage Orders</h2>
            <!-- PHP code to fetch orders will go here -->
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Product</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Data -->
                    <tr>
                        <td>001</td>
                        <td>John Doe</td>
                        <td>Dash Cam</td>
                        <td>Processing</td>
                        <td><button>Edit</button> <button>Delete</button></td>
                    </tr>
                    <!-- Dynamic data from PHP -->
                </tbody>
            </table>
        </section>

        <!-- Stocks Section -->
        <section id="stocks" class="dashboard-section">
            <h2>Manage Stocks</h2>
            <!-- PHP code to fetch and manage stocks will go here -->
        </section>

        <!-- Categories Section -->
        <section id="categories" class="dashboard-section">
            <h2>Add Categories</h2>
            <!-- PHP code to add categories will go here -->
        </section>

        <!-- Delivery Process Section -->
        <section id="delivery" class="dashboard-section">
            <h2>Manage Delivery Process</h2>
            <!-- PHP code to manage deliveries will go here -->
        </section>

        <!-- Payment History Section -->
        <section id="payments" class="dashboard-section">
            <h2>Payment History</h2>
            <!-- PHP code to display payment history will go here -->
        </section>
    </div>

    <script>
        function toggleSidebar() {
            document.querySelector(".sidebar").classList.toggle("active");
        }
    </script>

</body>
</html>
