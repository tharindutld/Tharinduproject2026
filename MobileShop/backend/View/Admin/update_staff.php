<?php

include("../../Common/db.php");

$id = $_POST['id'];
$first = $_POST['first_name'];
$last = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$birth = $_POST['birth_date'];
$role = $_POST['role'];
$status = $_POST['status'];

$sql = "UPDATE staff_users SET
        first_name='$first',
        last_name='$last',
        email='$email',
        phone='$phone',
        gender='$gender',
        birth_date='$birth',
        role='$role',
        status='$status'
        WHERE id=$id";

$conn->query($sql);

header("Location:view_staff.php");

?>