<?php
include("../../Common/db.php");

// Secure Search Handling using Prepared Statements
$search = isset($_GET['search']) ? $_GET['search'] : "";
$searchTerm = "%$search%";

$sql = "SELECT * FROM staff_users 
        WHERE first_name LIKE ? OR last_name LIKE ? OR email LIKE ?
        ORDER BY id DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Directory | Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        .sidebar { background: #212529; min-height: 100vh; box-shadow: 2px 0 5px rgba(0,0,0,0.05); }
        .main-card { border: none; border-radius: 10px; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); }
        .table thead { background-color: #f1f4f8; }
        .table-hover tbody tr:hover { background-color: #f8f9ff; transition: 0.2s; }
        .badge-role { font-weight: 500; font-size: 0.75rem; text-transform: uppercase; }
        .search-container { max-width: 400px; }
        .btn-action { padding: 0.25rem 0.5rem; font-size: 0.875rem; border-radius: 6px; }
        .status-dot { height: 8px; width: 8px; border-radius: 50%; display: inline-block; margin-right: 5px; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 p-0 sidebar d-none d-md-block">
            <?php include '../../Common/sidebar.php'; ?>
        </div>

        <main class="col-md-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold mb-0">Staff Management</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
                            <li class="breadcrumb-item active">Staff List</li>
                        </ol>
                    </nav>
                </div>
                <button class="btn btn-primary d-flex align-items-center gap-2">
                    <i class="bi bi-person-plus"></i> Add New Staff
                </button>
            </div>

            <div class="card main-card">
                <div class="card-body p-0">
                    <div class="p-3 border-bottom d-flex justify-content-between align-items-center bg-white rounded-top">
                        <form method="GET" class="search-container w-100">
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0"><i class="bi bi-search text-muted"></i></span>
                                <input type="text" name="search" class="form-control border-start-0 ps-0" 
                                       placeholder="Filter by name or email..." value="<?= htmlspecialchars($search); ?>">
                            </div>
                        </form>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-filter"></i> Filter</button>
                            <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-download"></i> Export</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-3">ID</th>
                                    <th>Staff Member</th>
                                    <th>Contact Info</th>
                                    <th>Role & Status</th>
                                    <th>Details</th>
                                    <th class="text-end pe-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()): 
                                    $statusColor = ($row['status'] == 'Active') ? 'bg-success' : 'bg-secondary';
                                ?>
                                <tr>
                                    <td class="ps-3 text-muted">#<?= $row['id'] ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2 bg-light rounded-circle d-flex align-items-center justify-content-center" style="width:32px; height:32px">
                                                <i class="bi bi-person text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="fw-semibold text-dark"><?= $row['first_name'] . " " . $row['last_name'] ?></div>
                                                <small class="text-muted"><?= $row['gender'] ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small"><i class="bi bi-envelope me-1"></i> <?= $row['email'] ?></div>
                                        <div class="small text-muted"><i class="bi bi-phone me-1"></i> <?= $row['phone'] ?></div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border badge-role"><?= $row['role'] ?></span>
                                        <div class="mt-1 small">
                                            <span class="status-dot <?= $statusColor ?>"></span><?= $row['status'] ?>
                                        </div>
                                    </td>
                                    <td class="small text-muted">
                                        DOB: <?= date('M d, Y', strtotime($row['birth_date'])) ?>
                                    </td>
                                    <td class="text-end pe-3">
                                        <div class="btn-group">
                                            <a href="adm_edit_staff.php?id=<?= $row['id'] ?>" class="btn btn-outline-primary btn-action">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button onclick="confirmDelete('confirm_delete.php?id=<?= $row['id'] ?>&table=staff_users&redirect=adm_view_staff.php')" 
                                                    class="btn btn-outline-danger btn-action ms-1">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                                <?php if($result->num_rows == 0): ?>
                                    <tr><td colspan="6" class="text-center py-4 text-muted">No records found.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../Common/confirm_delete.php></script>
</body>
</html>