<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start(); 
include("../../Common/db.php");

// 1. Capture inputs safely
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$table = isset($_GET['table']) ? $_GET['table'] : '';
$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'adm_view_staff.php';

// 2. Security Check: Whitelist the tables
$allowed_tables = ['staff_users', 'products', 'orders'];

if ($id <= 0 || !in_array($table, $allowed_tables)) {
    $_SESSION['error'] = "Invalid request.";
    header("Location: $redirect");
    exit();
}

// 3. Execution: Using Prepared Statements for security
$sql = "DELETE FROM $table WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Record deleted successfully.";
    } else {
        $_SESSION['error'] = "Error: Could not delete record.";
    }
    $stmt->close();
} else {
    $_SESSION['error'] = "Database preparation error.";
}

// 4. Redirect back
header("Location: $redirect");
exit();
?>