<?php

// Configurar datos de acceso a la Base de datos
$host = "localhost";
$dbname = "agenda1";
$dbuser = "postgres";
$userpass = "admin";

$dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$dbuser;password=$userpass";

try {

    $conn = new PDO($dsn);


    if ($conn) {
  
        echo "\n";
    }
} catch (PDOException $e) {

    echo $e->getMessage();
}