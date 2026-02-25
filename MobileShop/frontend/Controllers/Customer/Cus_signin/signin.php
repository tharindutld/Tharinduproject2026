<?php
session_start();
include "../../../Common/db.php";

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
    $result = $conn->query($sql);

    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        $_SESSION['username'] = $row['username'];
        $_SESSION['full_name'] = $row['full_name'];

        header("Location: /MobileShop/frontend/View/Customer/Home/home.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}

?>