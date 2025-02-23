<?php
function convertir($cantidad, $unidad_original, $unidad_conversion) {
    $conversiones = [
        'metros' => ['pies' => 3.28084, 'pulgadas' => 39.3701],
        'pies' => ['metros' => 0.3048, 'pulgadas' => 12],
        'pulgadas' => ['metros' => 0.0254, 'pies' => 0.0833333],
        'kilogramos' => ['libras' => 2.20462],
        'libras' => ['kilogramos' => 0.453592],
        'celsius' => ['fahrenheit' => function($c) { return $c * 9/5 + 32; }],
        'fahrenheit' => ['celsius' => function($f) { return ($f - 32) * 5/9; }],
    ];

    if (isset($conversiones[$unidad_original][$unidad_conversion])) {
        $factor = $conversiones[$unidad_original][$unidad_conversion];
        return is_callable($factor) ? $factor($cantidad) : $cantidad * $factor;
    }

    return "Conversión no soportada.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cantidad = $_POST['cantidad'];
    $unidad_original = $_POST['unidad_original'];
    $unidad_conversion = $_POST['unidad_conversion'];
    $resultado = convertir($cantidad, $unidad_original, $unidad_conversion);
    echo "Resultado: $resultado $unidad_conversion";
}
