<?php
session_start(); 
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bienvenida</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Bienvenida</h2>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Bienvenido, <?php echo $_SESSION["usuario"]; ?>!</h5>
                        <p class="card-text"><a href="logout.php" class="btn btn-secondary">Cerrar Sesión</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
