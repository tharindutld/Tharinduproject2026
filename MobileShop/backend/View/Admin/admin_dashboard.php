<!DOCTYPE html>
<html lang="en">
<head>
   
    <?php include '../../Common/header.php' ?>
    <?php $activePage = 'admin_dashboard'; include '../../Common/sidebar.php'; ?>
    <link rel="stylesheet" href="../../Styles/Admin/admin_dashboard.css">
    <link rel="stylesheet" href="../../Styles/Admin/sidebar.css">
    <title>Document</title>
</head>
<body>
    
    <main class="col-md-9 col-lg-10 ms-sm-auto px-4 py-4">

    <h2 class="mb-4" >Dashboard</h2>
    <div class="row g-4">

        <div class="col-sm-6 col-lg-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-muted">Today Sales</h6>
                    <h3 class="fw-bold">LKR 250,000</h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-muted">Total Revenue (Week)</h6>
                    <h3 class="fw-bold">LKR 2,540,000</h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-muted">Total Users Today</h6>
                    <h3 class="fw-bold">27</h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-muted">Orders (Pending | Completed)</h6>
                    <h3 class="fw-bold">6 | 11</h3>
                </div>
            </div>
        </div>

    </div>

</main>
</body>
</html>