<?php
// process_user.php
require_once '../../Common/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Collect and sanitize input
    $first_name = htmlspecialchars($_POST['firstname']);
    $last_name  = htmlspecialchars($_POST['lastname']);
    $email      = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone      = htmlspecialchars($_POST['phone']);
    $gender     = $_POST['gender'];
    $birth_date = $_POST['birthdate'];
    $role       = $_POST['role'];
    $status     = $_POST['status'];
    
    // 2. Hash the password
    $password_hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // 3. Prepare the SQL Statement
    $sql = "INSERT INTO staff_users (first_name, last_name, email, phone, gender, birth_date, role, password, status) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        /* 4. Bind parameters 
           "sssssssss" means we are passing 9 strings (s = string)
        */
        $stmt->bind_param("sssssssss", 
            $first_name, 
            $last_name, 
            $email, 
            $phone, 
            $gender, 
            $birth_date, 
            $role, 
            $password_hashed, 
            $status
        );

        // 5. Execute
        if ($stmt->execute()) {
            // Success!
            header("Location: user_add.php?status=success");
        } else {
            // Check for duplicate entry error code (1062)
            if ($conn->errno == 1062) {
                header("Location: user_add.php?status=error&message=Email already exists");
            } else {
                header("Location: user_add.php?status=error&message=Execution failed");
            }
        }

        $stmt->close();
    } else {
        header("Location: user_add.php?status=error&message=Prepare failed");
    }

    $conn->close();
    exit();
}