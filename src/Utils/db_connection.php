<?php
$server = "localhost";
$username = "root";
$password = "admin";
$database = "chiletefarmacia2";
$port = 3306;

try {
    $conn = new mysqli($server, $username, $password, $database, $port);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    return $conn;
} catch (mysqli_sql_exception $e) {
    throw new Exception('Error al conectar a la base de datos: ' . $e->getMessage());
}
?>