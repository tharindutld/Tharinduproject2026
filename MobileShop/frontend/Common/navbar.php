<!DOCTYPE html>
<html lang="en">

<head>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/MobileShop/frontend/Common/header.php'; ?>

    <script src="https://kit.fontawesome.com/40740cdba4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../Styles/Customer/cus_signin_css/signin.css">
    <title>Navbar</title>

    <style>
        .home-user {
            display: flex;
            gap: 20px;
        }

        .navbar {
            display: flex;
            gap: 400px;

        }

        .nav-item {
            display: flex;

        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
        <a class="navbar-brand fw-bold" href="#">
            <i class="bi bi-phone"></i> MobileMart
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Search bar -->
            <form class="d-flex me-3">
                <input class="form-control form-control-sm me-2" type="search" placeholder="Search">
                <button class="btn btn-outline-primary btn-sm" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <div class="home-user">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="bi bi-house-door"></i> Home
                        </a>
                        <a class="nav-link" href="#">
                            <i class="bi bi-info-circle"></i> About Us
                        </a>

                        <a class="nav-link" href="#">
                            <i class="bi bi-telephone"></i> Contact Us
                        </a>

                    </li>
                </ul>
                
                 <?php if (isset($_SESSION['full_name'])): ?>

                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person"></i> User 
                            <?php echo htmlspecialchars($_SESSION['full_name']); ?>
                        </a>
                    </li>
                </ul>
                <?php endif; ?>

                
            </div>
        </div>

    </nav>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/MobileShop/frontend/Common/footer.php'; ?>

</body>

</html>