<?php
session_start();
include 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email=? AND password=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss",$email,$password);
$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows > 0){

    $user = $result->fetch_assoc();

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role_id'];

    if($user['role_id'] == 1 ){
        header("Location: ../../backend/View/Admin/admin_dashboard.php");
        exit();
    }
    else{
        header("Location: ../../backend/View/Admin/admin_add_user.php");
        exit();
    }

}else{
    echo "Invalid login";
}


?>