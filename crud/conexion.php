<?php
// Conectar a MySQL
$con = mysql_connect("localhost", "root", "", "cruq_php_mysql");

// Probar conexión
if (mysql_connect_errno()) {
    echo "Fallo al conectarse a MySQL: " . mysql_connect_error();
} else {
    echo "Conectado correctamente";
}
?>