<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>side bar</title>
     <link rel="stylesheet" href="../../backend/Styles/Admin/sidebar.css">
</head>
<body>
    <div class="offcanvas-md offcanvas-start bg-dark text-white sidebar-offcanvas" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="d-flex flex-column flex-shrink-0 p-3 h-100">
        
        <div class="offcanvas-header d-md-none border-bottom border-secondary mb-3 pb-3">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>

        <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="https://via.placeholder.com/40" alt="User Profile" width="40" height="40" class="rounded-circle me-2">
            <div>
                <strong class="d-block">Jane Doe</strong>
                <small class="text-muted">Super Admin</small>
            </div>
        </div>
        
        <hr class="border-secondary">

        <ul class="nav nav-pills flex-column mb-auto dashboard-nav">
            
            <li class="nav-item">
                <a href="admin_dashboard.php" class="nav-link text-white <?= ($currentPage == 'admin_dashboard') ? 'active' : '' ?>">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="#staffSubmenu" data-bs-toggle="collapse" class="nav-link text-white d-flex justify-content-between align-items-center <?= ($currentPage == 'add_staff' || $currentPage == 'view_staff') ? 'active' : '' ?>" aria-expanded="<?= ($currentPage == 'add_staff' || $currentPage == 'view_staff') ? 'true' : 'false' ?>">
                    <span>
                        <i class="bi bi-people me-2"></i>
                        Staff Accounts
                    </span>
                    <i class="bi bi-chevron-down transition-icon"></i>
                </a>
                <ul class="collapse flex-column ms-4 mt-1 list-unstyled <?= ($currentPage == 'add_staff' || $currentPage == 'view_staff') ? 'show' : '' ?>" id="staffSubmenu" data-bs-parent=".dashboard-nav">
                    <li class="w-100 staff-collapse">
                        <a href="add_staff.php" class="nav-link text-white px-0 <?= ($currentPage == 'add_staff') ? 'text-info fw-bold' : '' ?>">
                            <i class="bi bi-person-plus me-2"></i> Add Staff User
                        </a>
                    </li>
                    <li class="staff-collapse">
                        <a href="view_staff.php" class="nav-link text-white px-0 <?= ($currentPage == 'view_staff') ? 'text-info fw-bold' : '' ?>">
                            <i class="bi bi-card-list me-2"></i> View Staff Users
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="products.php" class="nav-link text-white <?= ($currentPage == 'products') ? 'active' : '' ?>">
                    <i class="bi bi-box-seam me-2"></i>
                    Products
                </a>
            </li>

            <li class="nav-item">
                <a href="orders.php" class="nav-link text-white <?= ($currentPage == 'orders') ? 'active' : '' ?>">
                    <i class="bi bi-cart3 me-2"></i>
                    Orders
                </a>
            </li>

            <li class="nav-item">
                <a href="inventory.php" class="nav-link text-white <?= ($currentPage == 'inventory') ? 'active' : '' ?>">
                    <i class="bi bi-archive me-2"></i>
                    Inventory
                </a>
            </li>

            <li class="nav-item">
                <a href="reports.php" class="nav-link text-white <?= ($currentPage == 'reports') ? 'active' : '' ?>">
                    <i class="bi bi-bar-chart-line me-2"></i>
                    Reports
                </a>
            </li>
            
        </ul>

        <hr class="border-secondary">

        <div class="dropdown">
            <a href="logout.php" class="nav-link text-danger fw-bold">
                <i class="bi bi-box-arrow-left me-2"></i>
                Logout
            </a>
        </div>
    </div>
</div>
</body>
</html>