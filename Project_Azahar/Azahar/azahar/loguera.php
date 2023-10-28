<?php
require('conexion.php');
include_once('user.php');
include_once('user_session.php');
session_start();



$usuario = $_POST['email'];
$columna = 'email';
$clave = $_POST['telefono'];
$tabla = $_POST['rol'];
 if($tabla == 1){
    $tabla = 'adminis';
    $columna = 'correo';
 }else{
    $tabla = 'cliente';
 }


$query = "SELECT COUNT(*) as contar FROM $tabla WHERE $columna = '$usuario' AND telefono = '$clave'";

$consulta = mysqli_query($conexion,$query);

$array = mysqli_fetch_array($consulta);

if($array['contar']>0){
    $_SESSION['username']= $usuario;
    if($columna == 'correo'){
        header("location: admin.php");
    }else{
        header("location: colab.php");
    }
    
}else{
    echo "datos incorrectos";
    header("location: login_nuevo.php");
}

?> 