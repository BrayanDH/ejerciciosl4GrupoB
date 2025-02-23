<!DOCTYPE html>
<html>
<head>
    <title>Resultados de Validación</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5"></div>
    <?php
    // Verificar si se envió el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener datos del formulario
        $email = $_POST["email"];
        $url = $_POST["url"];
        $ip = $_POST["ip"];
        $entero = $_POST["entero"];
        $flotante = $_POST["flotante"];
        $booleano = $_POST["booleano"];
        $cadena = $_POST["cadena"];

        // Validación
        $emailValido = filter_var($email, FILTER_VALIDATE_EMAIL);
        $urlValida = filter_var($url, FILTER_VALIDATE_URL);
        $ipValida = filter_var($ip, FILTER_VALIDATE_IP);
        $enteroValido = filter_var($entero, FILTER_VALIDATE_INT);
        $flotanteValido = filter_var($flotante, FILTER_VALIDATE_FLOAT);
        $booleanoValido = filter_var($booleano, FILTER_VALIDATE_BOOLEAN);

        // Saneamiento (solo si los datos son válidos)
        $emailSaneado = $emailValido ? filter_var($email, FILTER_SANITIZE_EMAIL) : null;
        $urlSaneada = $urlValida ? filter_var($url, FILTER_SANITIZE_URL) : null;
        $enteroSaneado = $enteroValido ? filter_var($entero, FILTER_SANITIZE_NUMBER_INT) : null;
        $flotanteSaneado = $flotanteValido ? filter_var($flotante, FILTER_SANITIZE_NUMBER_FLOAT) : null;
        $cadenaSaneada = filter_var($cadena, FILTER_SANITIZE_SPECIAL_CHARS); // Siempre sanear cadenas

        // Mostrar resultados (puedes personalizar esto)
        echo "<h2 class='text-center mb-4'>Resultados de Validación</h2>";
        echo "<div class='list-group'>";
        echo "<div class='list-group-item'>Email: " . ($emailValido ? $emailSaneado : "<span class='text-danger'>Inválido</span>") . "</div>";
        echo "<div class='list-group-item'>URL: " . ($urlValida ? $urlSaneada : "<span class='text-danger'>Inválida</span>") . "</div>";
        echo "<div class='list-group-item'>IP: " . ($ipValida ? $ip : "<span class='text-danger'>Inválida</span>") . "</div>";
        echo "<div class='list-group-item'>Entero: " . ($enteroValido ? $enteroSaneado : "<span class='text-danger'>Inválido</span>") . "</div>";
        echo "<div class='list-group-item'>Flotante: " . ($flotanteValido ? $flotanteSaneado : "<span class='text-danger'>Inválido</span>") . "</div>";
        echo "<div class='list-group-item'>Booleano: " . ($booleanoValido ? ($booleano == "true" ? "Verdadero" : "Falso") : "<span class='text-danger'>Inválido</span>") . "</div>";
        echo "<div class='list-group-item'>Cadena: " . $cadenaSaneada . "</div>";
        echo "</div>"; // Cierra el div list-group
    }
?>
</div>
</body>
</html>