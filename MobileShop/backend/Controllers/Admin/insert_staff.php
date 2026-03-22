<?php
include("../../Common/db.php");
header('Content-Type: application/json');

// --- 1. Collect POST data safely ---
$first = $_POST['first_name'] ?? '';
$last = $_POST['last_name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$gender = $_POST['gender'] ?? '';
$birthdate = $_POST['birth_date'] ?? '';
$role = $_POST['role'] ?? '';
$status = $_POST['status'] ?? '';
$password = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);

// --- 2. Basic validation ---
if (!$first || !$last || !$email || !$phone || !$gender || !$birthdate || !$role || !$status || !$password) {
    echo json_encode([
        "status" => "error",
        "message" => "All fields are required."
    ]);
    exit;
}

// Age validation
$today = new DateTime();
$birth = new DateTime($birthdate);
$age = $today->diff($birth)->y;
if ($age < 6) {
    echo json_encode([
        "status" => "error",
        "message" => "User must be older than 6 years."
    ]);
    exit;
}

// --- 3. Insert into database ---
$stmt = $conn->prepare("INSERT INTO staff_users (first_name, last_name, email, phone, gender, birth_date, role, status, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $first, $last, $email, $phone, $gender, $birthdate, $role, $status, $password);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "success",
        "message" => "Staff member added successfully."
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Database error: " . $stmt->error
    ]);
}

$stmt->close();
$conn->close();
