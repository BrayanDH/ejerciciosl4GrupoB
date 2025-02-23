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
    echo "<h2>Resultados:</h2>";
    echo "Email: " . ($emailValido ? $emailSaneado : "Inválido") . "<br>";
    echo "URL: " . ($urlValida ? $urlSaneada : "Inválida") . "<br>";
    echo "IP: " . ($ipValida ? $ip : "Inválida") . "<br>";
    echo "Entero: " . ($enteroValido ? $enteroSaneado : "Inválido") . "<br>";
    echo "Flotante: " . ($flotanteValido ? $flotanteSaneado : "Inválido") . "<br>";
    echo "Booleano: " . ($booleanoValido ? ($booleano == "true" ? "Verdadero" : "Falso") : "Inválido") . "<br>";
    echo "Cadena: " . $cadenaSaneada . "<br>";
}
?>