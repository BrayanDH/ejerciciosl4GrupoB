<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Medidas</title>
</head>
<body>
    <h2>Conversor de Medidas</h2>
    <form action="conversiones.php" method="post">
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required><br><br>

        <label for="unidad_original">Unidad Original:</label>
        <select id="unidad_original" name="unidad_original">
            <option value="metros">Metros (m)</option>
            <option value="pies">Pies (ft)</option>
            <option value="pulgadas">Pulgadas (in)</option>
            <option value="kilogramos">Kilogramos (kg)</option>
            <option value="libras">Libras (lb)</option>
            <option value="celsius">Celsius (°C)</option>
            <option value="fahrenheit">Fahrenheit (°F)</option>
        </select><br><br>

        <label for="unidad_conversion">Unidad de Conversión:</label>
        <select id="unidad_conversion" name="unidad_conversion">
            <option value="metros">Metros (m)</option>
            <option value="pies">Pies (ft)</option>
            <option value="pulgadas">Pulgadas (in)</option>
            <option value="kilogramos">Kilogramos (kg)</option>
            <option value="libras">Libras (lb)</option>
            <option value="celsius">Celsius (°C)</option>
            <option value="fahrenheit">Fahrenheit (°F)</option>
        </select><br><br>

        <input type="submit" value="Convertir">
    </form>
</body>
</html>