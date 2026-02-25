<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.php' ?>
    <link rel="stylesheet" href="../../backend/Styles/Admin/sidebar.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <nav class="sidebar">
        <div class="admin-profile">
            <div class="admin-avatar">
                <i class="fas fa-user-shield"></i>
            </div>
            <div class="admin-name">Admin Tharindu</div>
            <div class="admin-role">Administrator</div>
        </div>

        <ul class="nav-menu">
            <li class="nav-item">
                <a class="nav-link <?= ($activePage == 'admin_dashboard') ? 'active' : '' ?>"
                    href="admin_dashboard.php">
                    <span class="nav-icon"><i class="fas fa-home"></i></span>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= ($activePage == 'admin_user_accounts') ? 'active' : '' ?>" href="admin_user_accounts.php">
                    <span class="nav-icon"><i class="fas fa-users"></i></span>
                    <span class="nav-text">Staff Management</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= ($activePage == 'admin_products') ? 'active' : '' ?>" href="admin_products.php">
                    <span class="nav-icon"><i class="fas fa-box"></i></span>
                    <span class="nav-text">Products</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= ($activePage == 'orders') ? 'active' : '' ?>" href="orders.php">
                    <span class="nav-icon"><i class="fas fa-shopping-cart"></i></span>
                    <span class="nav-text">Orders</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= ($activePage == 'orders') ? 'active' : '' ?>" href="orders.php">
                    <span class="nav-icon"><i class="fas fa-boxes"></i></span>
                    <span class="nav-text">Inventory</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= ($activePage == 'orders') ? 'active' : '' ?>" href="orders.php">
                    <span class="nav-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="nav-text">Reports</span>
                </a>
            </li>

            <li>
                <div class="nav-divider"></div>
            </li>

            <li class="nav-item logout-item">
                <a class="nav-link" href="logout.php">
                    <span class="nav-icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span class="nav-text">Logout</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="main-content">
      
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>