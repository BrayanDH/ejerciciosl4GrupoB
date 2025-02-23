<?php
class ConversorMedidas {
    private $factoresConversion = [
        'metros' => [
            'pies' => 3.28084,
            'pulgadas' => 39.3701
        ],
        'pies' => [
            'metros' => 0.3048,
            'pulgadas' => 12
        ],
        'pulgadas' => [
            'metros' => 0.0254,
            'pies' => 0.0833333
        ],
        'kilogramos' => [
            'libras' => 2.20462
        ],
        'libras' => [
            'kilogramos' => 0.453592
        ]
    ];

    private $conversionesEspeciales = [
        'celsius' => [
            'fahrenheit' => 'celsiusAFahrenheit'
        ],
        'fahrenheit' => [
            'celsius' => 'fahrenheitACelsius'
        ]
    ];

    private function celsiusAFahrenheit($c) {
        return ($c * 9/5) + 32;
    }

    private function fahrenheitACelsius($f) {
        return ($f - 32) * 5/9;
    }

    public function convertir($cantidad, $unidadOriginal, $unidadConversion) {
        if ($unidadOriginal == $unidadConversion) {
            return $cantidad;
        }
        
        if (isset($this->factoresConversion[$unidadOriginal][$unidadConversion])) {
            $factor = $this->factoresConversion[$unidadOriginal][$unidadConversion];
            return $cantidad * $factor;
        } elseif (isset($this->conversionesEspeciales[$unidadOriginal][$unidadConversion])) {
            $metodo = $this->conversionesEspeciales[$unidadOriginal][$unidadConversion];
            return $this->$metodo($cantidad);
        } else {
            throw new InvalidArgumentException("Conversión no soportada");
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cantidad = $_POST["cantidad"];
    $unidadOriginal = $_POST["unidad_original"];
    $unidadConversion = $_POST["unidad_conversion"];

    try {
        $conversor = new ConversorMedidas();
        $resultado = $conversor->convertir($cantidad, $unidadOriginal, $unidadConversion);
        echo "El resultado es: $resultado $unidadConversion";
    } catch (InvalidArgumentException $e) {
        echo "Error: " . $e->getMessage();
    }
}

