<?php include("includes/header.php") ?>

<?php
// Validar si recibimos el id de la categoría por URL
if (isset($_GET['id'])) {
    $idCategoria = $_GET['id'];
}

// Obtener la categoría actual
$query = "SELECT * FROM categories WHERE id = :id";
$stmt = $conn->prepare($query);

$stmt->bindParam(":id", $idCategoria, PDO::PARAM_INT);
$stmt->execute();

$categoria = $stmt->fetch(PDO::FETCH_OBJ);

// Borrar datos
if (isset($_POST["borrarCategoria"])) {
    // Primero verificar si la categoría está siendo utilizada por algún contacto
    $query = "SELECT COUNT(*) as total FROM contactos WHERE categoria = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $idCategoria, PDO::PARAM_INT);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_OBJ);
    
    if ($resultado->total > 0) {
        $error = "No se puede borrar la categoría porque está siendo utilizada por " . $resultado->total . " contacto(s)";
        header('Location: categorias.php?error=' . $error);
        exit();
    }

    // Si entra por aquí es porque se puede borrar el registro
    $query = "DELETE FROM categories WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $idCategoria, PDO::PARAM_INT);
    $resultado = $stmt->execute();

    if ($resultado) {
        $mensaje = "Categoría borrada correctamente";
        header('Location: categorias.php?mensaje=' . $mensaje);
        exit();
    } else {
        $error = "Error, no se pudo borrar el registro";
        header('Location: borrar_categoria.php?error=' . $error);
        exit();
    }
}
?>

<div class="row">
    <div class="col-sm-12">
        <?php if(isset($_GET["error"])) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?php echo $_GET["error"]; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <h3>Borrar Categoría</h3>
    </div>
</div>

<div class="row">
    <div class="col-sm-6 offset-3">
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre" value="<?php if($categoria) echo $categoria->nombre; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="fecha_creacion" class="form-label">Fecha de creación:</label>
                <input type="text" class="form-control" name="fecha_creacion" id="fecha_creacion" value="<?php if($categoria) echo $categoria->fecha_creacion; ?>" readonly>
            </div>
            <button type="submit" name="borrarCategoria" class="btn btn-danger w-100"><i class="bi bi-x-circle-fill"></i> Borrar Categoría</button>
        </form>
    </div>
</div>

<?php include("includes/footer.php") ?>
