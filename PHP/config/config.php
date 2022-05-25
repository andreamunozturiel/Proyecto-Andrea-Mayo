<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "fotografia";

$conexion = new mysqli($server, $user, $pass, $database);

if($conexion -> connect_error){
    die('Error de Conexión ( ' . $conexion->connect_error . ')'
        . $conexion->connect_error);
}



?>