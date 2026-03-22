<?php

$id = $_GET['id'];
$table = $_GET['table'];
$redirect = $_GET['redirect'];

?>

<!DOCTYPE html>
<html>

<head>

    <title>Confirm Delete</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow text-center">

            <div class="card-body">

                <h4 class="text-danger">Confirm Delete</h4>

                <p class="mt-3">
                    Are you sure you want to delete this record?
                </p>

                <a href="delete.php?id=<?php echo $id ?>&table=<?php echo $table ?>&redirect=<?php echo $redirect ?>"
                    class="btn btn-danger">
                    Yes, Delete
                </a>

                <a href="<?php echo $redirect ?>" class="btn btn-secondary">
                    Cancel
                </a>

            </div>

        </div>

    </div>

</body>

</html>