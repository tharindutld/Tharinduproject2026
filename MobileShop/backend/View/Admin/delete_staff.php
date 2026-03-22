<?php

include("../../Common/db.php");

// sanitize inputs
$id = intval($_GET['id']);
$table = $_GET['table'];
$redirect = $_GET['redirect'];

// only allow specific tables
$allowed_tables = ['staff_users', 'products', 'orders'];
if (!in_array($table, $allowed_tables)) {
    die("Invalid table!");
}

// execute delete
$sql = "DELETE FROM $table WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location:$redirect");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}

?>