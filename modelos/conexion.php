<?php

// Configuración de la conexión a la base de datos
$host = "localhost";
$db_name = "apiweather";
$username = "root";
$password = "";

// Intentamos establecer la conexión a la base de datos
try {
    $conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    die("Error de conexión: " . $exception->getMessage());
}