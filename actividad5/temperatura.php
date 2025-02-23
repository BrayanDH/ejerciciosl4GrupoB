<?php
class Temperatura{
    public function celsiusfahrenheit($celsius){
        return ($celsius * 9/5) + 32;
    }
    public function fahrenheitcelsius($fahrenheit) {
        return ($fahrenheit - 32) * 5/9;
    }
}
?>