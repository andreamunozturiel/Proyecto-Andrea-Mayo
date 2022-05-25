<?php

$nom = $_POST['nom'];
$ape = $_POST['ape'];
$mail = $_POST['mail'];
$dire = $_POST['dire'];
$num = $_POST ['num'];
$rol = $_POST['rol'];


include './config/config.php';


$sql =  $conexion -> query("INSERT INTO usuarios (nombre,apellidos,email,direccion,telefono, rol_usuario 
VALUES ('$nom' ,'$ape' , '$mail' , '$dire' , '$num' , '$rol')");
if(!$sql){
    echo "No se han insertado los datos";

}else{
    header("Location: usuarios.php");
}




?>