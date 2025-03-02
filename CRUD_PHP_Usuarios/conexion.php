<?php

//Conectar a MySQL
$con = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "crud_php_mysql");

//Probar conexión
if(mysqli_connect_errno()){
    echo "Fallo al conectarse a MySQL: " . mysqli_connect_error();
}else{
    echo "Conectado correctamente";
}