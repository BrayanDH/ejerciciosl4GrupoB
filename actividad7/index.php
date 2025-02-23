<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Ejemplo</title>
</head>
<body>
    <form action="validacion.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="url">URL:</label>
        <input type="url" id="url" name="url" required><br><br>
        <label for="ip">Dirección IP:</label>
        <input type="text" id="ip" name="ip" required><br><br>
        <label for="entero">Número Entero:</label>
        <input type="number" id="entero" name="entero" required><br><br>
        <label for="flotante">Número Decimal:</label>
        <input type="number" id="flotante" name="flotante" step="0.01" required><br><br>
        <label for="booleano">Booleano:</label>
        <select id="booleano" name="booleano">
            <option value="true">Verdadero</option>
            <option value="false">Falso</option>
        </select><br><br>
        <label for="cadena">Cadena de Texto:</label>
        <textarea id="cadena" name="cadena" required></textarea><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>