<?php
// Configurar datos de acceso a la Base de datos MySQL (XAMPP)
$host = "localhost";
$dbname = "agenda1";
$dbuser = "root";
$userpass = ""; // XAMPP por defecto no tiene contraseña

try {
    // Crear conexión a MySQL
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbuser, $userpass);
    
    // Configurar el modo de error PDO para lanzar excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // Si hay error en la conexión, intentar crear la base de datos
    try {
        // Conexión sin especificar base de datos
        $conn = new PDO("mysql:host=$host", $dbuser, $userpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Crear la base de datos
        $conn->exec("CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8 COLLATE utf8_general_ci");
        
        // Seleccionar la base de datos
        $conn->exec("USE $dbname");
        
        // Crear tablas necesarias
        $sql = "CREATE TABLE IF NOT EXISTS categories (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(255) NOT NULL,
            fecha_creacion DATE NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $conn->exec($sql);
        
        $sql = "CREATE TABLE IF NOT EXISTS contactos (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(255) NOT NULL,
            apellido VARCHAR(255) NOT NULL,
            telefono VARCHAR(20) NOT NULL,
            email VARCHAR(255) NOT NULL,
            categoria INT(11),
            FOREIGN KEY (categoria) REFERENCES categories(id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $conn->exec($sql);
        
        echo "<div class='alert alert-success'>Base de datos y tablas creadas correctamente.</div>";
        
    } catch (PDOException $ex) {
        die("<div class='alert alert-danger'>Error de conexión: " . $ex->getMessage() . "</div>");
    }
}
