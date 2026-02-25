<?php
include "../Common/db.php"; 

if (isset($_POST['save_user'])) {

    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, phone, role, status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstName, $lastName, $email, $phone, $role, $status);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success text-center'>
                User $firstName saved successfully!
              </div>";
    } else {
        echo "<div class='alert alert-danger text-center'>
                Error: " . $stmt->error . "
              </div>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include 'header.php' ?>
    <?php include 'sidebar.php' ?>
    <link rel="stylesheet" href="../Styles/Admin/sidebar.css">
    <link rel="stylesheet" href="../Styles/Admin/add_user.css">
    <title>Add User</title>

</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">

        <div class="card shadow-sm" style="width: 450px;">

            <div class="card-header bg-primary text-white text-center py-2">
                <h5 class="mb-0">Add New User</h5>
            </div>

            <div class="card-body p-3">
                <form method="POST" id="userForm" novalidate>

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label class="form-label small mb-1">First Name</label>
                            <input type="text" id="firstName" name="first_name" class="form-control form-control-sm"
                                placeholder="John" pattern="^[A-Za-z]+$" oninput="validateFirstName()" required>
                            <div class="invalid-feedback">
                                Only letters are allowed. No numbers or special characters.
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <label class="form-label small mb-1">Last Name</label>
                            <input type="text" id="lastName" name="last_name" class="form-control form-control-sm"
                                placeholder="Doe" pattern="^[A-Za-z]+$" oninput="validateLastName()" required>
                            <div class="invalid-feedback">
                                Only letters are allowed. No numbers or special characters.
                            </div>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label small mb-1">Email</label>
                        <input type="text" id="email" name="email" class="form-control form-control-sm"
                            placeholder="johndoe@gmail.com" required>
                        <div class="invalid-feedback">
                            Please enter a valid email.
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label small mb-1">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control form-control-sm"
                            placeholder="07xxxxxxxx" required>
                        <div class="invalid-feedback">
                            Phone number must start with "07" & contain only numbers.
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label small mb-1">Role</label>
                        <select id="role" name="role" class="form-select form-select-sm" required>
                            <option value="">Select Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Sales Person">Sales Person</option>
                            <option value="User">User</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a role.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small mb-1">Status</label>
                        <select id="status" name="status" class="form-select form-select-sm" required>
                            <option value="">Select Status</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Banned">Banned</option>
                            <option value="Pending">Pending</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a status.
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" name="save_user" class="btn btn-success btn-sm px-4">
                            Save
                        </button>

                        <a href="../View/Admin/admin_user_accounts.php" class="btn btn-secondary btn-sm px-4">
                            Back
                        </a>
                    </div>

                </form>
            </div>
        </div>

    </div>

</body>

</html>