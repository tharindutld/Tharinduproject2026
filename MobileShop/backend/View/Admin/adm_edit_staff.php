<?php

include("../../Common/db.php");

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM staff_users WHERE id=$id");

$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Staff</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-2 bg-dark text-white min-vh-100 p-0">
                <?php include '../../Common/sidebar.php'; ?>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 p-4">

                <div class="card shadow">

                    <div class="card-header bg-primary text-white">
                        <h4>Edit Staff User</h4>
                    </div>

                    <div class="card-body">

                        <form action="update_staff.php" method="POST">

                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control"
                                        value="<?php echo $row['first_name']; ?>" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control"
                                        value="<?php echo $row['last_name']; ?>" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="<?php echo $row['email']; ?>" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="<?php echo $row['phone']; ?>">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Gender</label>
                                    <select name="gender" class="form-select">
                                        <option value="Male" <?php if ($row['gender'] == "Male")
                                            echo "selected"; ?>>Male
                                        </option>
                                        <option value="Female" <?php if ($row['gender'] == "Female")
                                            echo "selected"; ?>>
                                            Female</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Birth Date</label>
                                    <input type="date" name="birth_date" class="form-control"
                                        value="<?php echo $row['birth_date']; ?>">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Role</label>
                                    <select name="role" class="form-select">
                                        <option value="Admin" <?php if ($row['role'] == "Admin")
                                            echo "selected"; ?>>Admin
                                        </option>
                                        <option value="Sales" <?php if ($row['role'] == "Sales")
                                            echo "selected"; ?>>Sales
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="Active" <?php if ($row['status'] == "Active")
                                            echo "selected"; ?>>
                                            Active</option>
                                        <option value="Inactive" <?php if ($row['status'] == "Inactive")
                                            echo "selected"; ?>>Inactive</option>
                                    </select>
                                </div>

                            </div>

                            <div class="mt-3">

                                <button type="submit" class="btn btn-success">
                                    Update Staff
                                </button>

                                <a href="view_staff.php" class="btn btn-secondary">
                                    Cancel
                                </a>

                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

   <?php include '../../Common/footer.php' ?>

</body>

</html>