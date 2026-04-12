<?php
// Securely capture inputs
// htmlspecialchars prevents hackers from injecting malicious scripts into your links
$id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
$table = isset($_GET['table']) ? htmlspecialchars($_GET['table']) : '';
$redirect = isset($_GET['redirect']) ? htmlspecialchars($_GET['redirect']) : 'adm_view_staff.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Deletion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .confirm-card { max-width: 450px; border: none; border-radius: 12px; }
        .icon-box { font-size: 3rem; color: #dc3545; }
    </style>
</head>
<body class="d-flex align-items-center min-vh-100">

    <div class="container">
        <div class="card shadow-sm confirm-card mx-auto">
            <div class="card-body p-5 text-center">
                <div class="icon-box mb-3">
                    <i class="bi bi-exclamation-octagon"></i>
                </div>
                
                <h3 class="fw-bold text-dark">Are you sure?</h3>
                <p class="text-muted mb-4">
                    You are about to delete record <strong>#<?php echo $id; ?></strong> from <strong><?php echo $table; ?></strong>. 
                    This action cannot be undone.
                </p>

                <div class="d-grid gap-2">
                    <a href="adm_delete_staff.php?id=<?php echo $id; ?>&table=<?php echo $table; ?>&redirect=<?php echo $redirect; ?>"
                       class="btn btn-danger btn-lg fw-semibold">
                        Yes, Delete Forever
                    </a>
                    
                    <a href="<?php echo $redirect; ?>" class="btn btn-light text-secondary">
                        No, Keep It
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>