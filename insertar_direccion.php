<?php
session_start();
require_once("modelo/config.php");


if (empty($_POST['calle']) || empty($_POST['num_casa'])|| empty($_POST['colonia']) 
|| empty($_POST['municipio']) || empty($_POST['estado']) || empty($_POST['codigo_postal'])) {

}
 else {
    $calle = $_POST['calle'];
    $num_casa = $_POST['num_casa'];
    $colonia = $_POST['colonia'];
    $municipio = $_POST['municipio'];
    $estado = $_POST['estado'];
    $codigo_postal = $_POST['codigo_postal'];
    $sesion=$_SESSION['id_usuario'];

    $query = "INSERT INTO direccion (calle, num_casa, colonia, municipio, estado, codigo_postal, id_usuario) 
    VALUES ('$calle', $num_casa, '$colonia', '$municipio', '$estado', $codigo_postal,$sesion)";
    $resultado = $conexion->query(($query));
    if ($resultado) {
        Header("Location: direcciones.php");
    } else {
        echo "Error";
    }
}      
?>