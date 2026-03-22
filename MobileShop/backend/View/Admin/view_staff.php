<?php

include("../../Common/db.php");

$search = "";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

$sql = "SELECT * FROM staff_users 
        WHERE first_name LIKE '%$search%' 
        OR last_name LIKE '%$search%' 
        OR email LIKE '%$search%'";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>

<head>

    <title>View Staff</title>
    <?php include("../../Common/header.php"); ?>

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

                <h3 class="mb-4">Staff Users</h3>

                <!-- Search Bar -->
                <form method="GET" class="mb-4">

                    <div class="input-group w-50">

                        <input type="text" name="search" class="form-control" placeholder="Search by name or email"
                            value="<?php echo $search; ?>">

                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>

                    </div>

                </form>

                <!-- Staff Table -->
                <table class="table table-bordered table-striped">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Birthdate</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        while ($row = $result->fetch_assoc()) {

                            echo "<tr>";

                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['gender'] . "</td>";
                            echo "<td>" . $row['birth_date'] . "</td>";
                            echo "<td>" . $row['role'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";

                            echo "<td>
<a href='edit_staff.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>

<button onclick=\"confirmDelete('delete_staff.php?id=" . $row['id'] . "&table=staff_users&redirect=view_staff.php')\" 
class='btn btn-danger btn-sm'>
Delete
</button>
</td>";
                            echo "</tr>";

                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../Common/confirm_delete.js"></script>

</body>

</html>