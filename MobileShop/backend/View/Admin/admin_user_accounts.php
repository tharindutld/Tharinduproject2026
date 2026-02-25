
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../../Common/header.php' ?>
    <?php $activePage = 'admin_user_accounts'; include '../../Common/sidebar.php'; ?>
    <link rel="stylesheet" href="../../Styles/Admin/sidebar.css">
    <link rel="stylesheet" href="../../Styles/Admin/admin_user_accounts.css">
    <title>Users</title>

</head>
<body>

<div class="container mt-5">
    <div class="d-flex justify-content-between mb-4">
        <h3>User Management</h3>

        <div>
            <a href="../../Common/add_user.php" class="btn btn-primary">
                Add User
            </a>

          
        </div>
    </div>

    <div class="alert alert-info">
        User list will be displayed here...
    </div>
</div>

</body>
</html>