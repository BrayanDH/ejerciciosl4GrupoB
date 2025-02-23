<?php
require_once "Temperatura.php"; // Incluir la clase externa
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $temperatura = $_POST["temperatura"];
    $unidad = $_POST["unidad"];

    $conversor = new Temperatura();

    if ($unidad == "celsius") {
        $resultado = $conversor->celsiusfahrenheit($temperatura);
        echo "<p>$temperatura °C equivalen a $resultado °F</p>";
    } elseif ($unidad == "fahrenheit") {
        $resultado = $conversor->fahrenheitcelsius($temperatura);
        echo "<p>$temperatura °F equivalen a $resultado °C</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Temperatura</title>
</head>
<body>
    <h2>Conversor de Temperatura</h2>
    <form method="post" action="">
        <label for="temperatura">Temperatura:</label>
        <input type="number" name="temperatura" id="temperatura" required><br><br>

        <input type="radio" name="unidad" value="celsius" checked> Celsius a Fahrenheit
        <input type="radio" name="unidad" value="fahrenheit"> Fahrenheit a Celsius<br><br>

        <input type="submit" value="Convertir">
    </form>
</body>
</html>