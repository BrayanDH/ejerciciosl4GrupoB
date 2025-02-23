<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Ejemplo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Formulario de Ejemplo</h2>
        <form action="validacion.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="url">URL:</label>
                <input type="url" class="form-control" id="url" name="url" required>
            </div>
            <div class="form-group">
                <label for="ip">Dirección IP:</label>
                <input type="text" class="form-control" id="ip" name="ip" required>
            </div>
            <div class="form-group">
                <label for="entero">Número Entero: </label>
                <input type="number" class="form-control" id="entero" name="entero" required>
            </div>
            <div class="form-group">
                <label for="flotante">Número Decimal:</label>
                <input type="number" class="form-control" id="flotante" name="flotante" step="0.01" required>
            </div>
            <div class="form-group">
                 <label for="booleano">Booleano:</label>
                 <select class="form-control" id="booleano" name="booleano">
                     <option value="true">Verdadero</option>
                     <option value="false">Falso</option>
                  </select>
            </div>

            <div class="form-group">
                <label for="cadena">Cadena de Texto: </label>
                <textarea class="form-control" id="cadena" name="cadena" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>