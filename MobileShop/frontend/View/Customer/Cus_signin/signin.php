<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    ?>
    <?php include '../../../Common/header.php' ?>
    
    <script src="https://kit.fontawesome.com/40740cdba4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../Styles/Customer/cus_signin_css/signin.css">
    <title>LOGIN</title>

</head>
<body>
   <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row shadow p-4 rounded-4 bg-white" style="max-width: 850px; width:100%;">
        
        <div class="col-md-6 border-end">
            
            <h3 class="mb-4 text-center">
                User <small class="text-muted">Login</small>
            </h3>

            <form action="../../../Controllers/Customer/Cus_signin/signin.php" method="POST">

                <div class="mb-3 input-group input-group-sm">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="username" class="form-control " placeholder="Username">
                </div>

                <div class="mb-3 input-group input-group-sm">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" id="passwordInput">
                    <button type="button"  class="btn btn-outline-secondary" id="passwordToggle">
                        <i class="fa-solid fa-eye eye-icon"></i>
                    </button>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberCheck">
                        <label class="form-check-label" for="rememberCheck">Remember me</label>
                    </div>

                    <a href="#" class="link-primary">Forgot Password?</a>
                </div>

                <button type="submit" name="login" class="btn btn-primary w-100">LOGIN</button>
            </form>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <img src="../../../Images/Customer_signin_img/login-image.jpg" alt="login-image" class="img-fluid rounded-3" style="max-width: 300px;">
        </div>
    </div>
</div>
<?php include '../../../Common/footer.php' ?>
</body>

</html>