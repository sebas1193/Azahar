<?php
    $dom = "localhost";
    $usu = "root";
    $passw="";
    $db = "azahar";


    $conexion =  mysqli_connect($dom,$usu,$passw,$db);

    if($conexion-> connect_error){
        die("coenexion fallida: " . $conexion-> connect_error);
    }

?>