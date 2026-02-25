<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /FRONTEND/View/Customer/Cus_signin/signin.php");
    exit();
}

?>
<?php include '../../../Common/navbar.php' ?>
<?php include '../../../Common/header.php' ?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
</head>

<body>


  <?php include $_SERVER['DOCUMENT_ROOT'] . '/MobileShop/frontend/Common/footer.php'; ?>


</body>

</html>