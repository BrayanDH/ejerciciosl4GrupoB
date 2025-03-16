<?php include("includes/header.php") ?>

<?php

// Validar si recibimos el id del contacto por URL
if (isset($_GET['id'])) {
    $idContacto = $_GET['id'];
}

// Obtener el contacto actual
$query = "SELECT * FROM contactos WHERE id = :id";
$stmt = $conn->prepare($query);

$stmt->bindParam(":id", $idContacto, PDO::PARAM_INT);
$stmt->execute();

$contacto = $stmt->fetch(PDO::FETCH_OBJ);

// Validar si recibimos el id de la categoría por URL
if (isset($_GET['idCategoria'])) {
    $idCategoria = $_GET['idCategoria'];
}

$query = "SELECT * FROM categories";
$stmt = $conn->prepare($query);

$stmt->execute();
$categorias = $stmt->fetchAll(PDO::FETCH_OBJ);

// Editar datos
if (isset($_POST["borrarContacto"])) {

    // Si entra por aquí es porque se puede borrar el registro
    $query = "DELETE FROM contactos WHERE id = :id";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $idContacto, PDO::PARAM_INT);

    $resultado = $stmt->execute();

    if ($resultado) {
        $mensaje = "Contacto borrado correctamente";
        header('Location: contactos.php?mensaje=' . $mensaje);
        exit();
    } else {
        $error = "Error, no se pudo borrar el registro";
        header('Location: borrar_contacto.php?error=' . $error);
        exit();
    }
}
?>

<div class="row">
    <div class="col-sm-6">
        <h3>Borrar Contacto</h3>
    </div>
</div>

<div class="row">
    <div class="col-sm-6 offset-3">
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php if($contacto) echo $contacto->nombre; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input type="text" class="form-control" name="apellido" id="apellidos" placeholder="Apellidos" value="<?php if($contacto) echo $contacto->apellido; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ingrese el teléfono" value="<?php if($contacto) echo $contacto->telefono; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese el email" value="<?php if($contacto) echo $contacto->email; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría:</label>
                <select class="form-select" aria-label="Default select example" name="categoria" readonly>
                    <option value="">Seleccione una categoría</option>
                    <?php foreach($categorias as $categoria) : ?>
                        <option value="<?php echo $categoria->id; ?>" <?php if($idCategoria == $categoria->id) echo 'selected'; ?>><?php echo $categoria->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" name="borrarContacto" class="btn btn-primary w-100"><i class="bi bi-person-bounding-box"></i> Borrar Contacto</button>
        </form>
    </div>
</div>

<?php include("includes/footer.php") ?>