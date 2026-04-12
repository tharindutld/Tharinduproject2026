<?php
$currentPage = 'adm_dashboard';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../../Common/header.php' ?>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../Styles/Admin/adm_dashboard.css">
</head>
<body>

<div class="container-fluid overflow-hidden">
    <div class="row vh-100">
        
        <div class="col-12 col-md-3 col-xl-2 px-0 bg-dark sidebar-container">
            <?php include '../../Common/sidebar.php'; ?>
        </div>

        <div class="col d-flex flex-column h-sm-100 p-0">
            
            <header class="d-md-none bg-dark text-white p-3 d-flex justify-content-between align-items-center">
                <h5 class="m-0">Dashboard</h5>
                <button class="btn btn-outline-light d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
                    <i class="bi bi-list fs-4"></i>
                </button>
            </header>

            <main class="flex-grow-1 overflow-auto p-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard Overview</h1>
                </div>
                
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <h5 class="card-title text-muted">Total Users</h5>
                                <p class="card-text fs-2 fw-bold">1,245</p>
                            </div>
                        </div>
                    </div>
                    </div>
                
                <p>Welcome to your control panel. Use the sidebar to navigate through the modules.</p>
            </main>

        </div>
    </div>
</div>

<?php include '../../Common/footer.php' ?>
<script src="../../Script/Admin/sidebar.js"></script>

</body>
</html>