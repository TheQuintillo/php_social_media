<?php

$servidor = "localhost";
$db = "app";
$usuario = "root";
$password = "";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$db", $usuario, $password);
} catch (Exception $e) {
    echo $e->getMessage();
}
