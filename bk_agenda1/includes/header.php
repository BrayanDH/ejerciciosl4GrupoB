<?php
// Incluir el archivo de conexión (asegúrate de que la ruta sea correcta)
include_once dirname(__FILE__) . '/../conexion.php';

// Si no existe la conexión, mostrar error
if (!isset($conn)) {
    die("Error: No se ha establecido la conexión a la base de datos.");
}

// Consulta para el menú de categorías (usa un try-catch para evitar errores si la tabla no existe aún)
$categoriesMenu = [];
try {
    $query = "SELECT * FROM categories";
    $stmt = $conn->query($query);
    $categoriesMenu = $stmt->fetchAll(PDO::FETCH_OBJ);
} catch (Exception $e) {
    // No mostrar categorías si hay error
}
?>

<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-icons-1.2.1/font/bootstrap-icons.css">
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">

    <title>Agenda PHP Postgress SQL</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Agenda PHP Postgress SQL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            Administración
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="categories.php">Categories</a></li>
                            <li><a class="dropdown-item" href="contactos.php">Contactos</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 caja">
        <!-- Aquí puedes agregar más contenido HTML o PHP -->
    </div>
</body>
</html>