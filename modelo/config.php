<?php 

$server = "localhost:3306";
$user = "promay20_csay";
$pass = "cesaytienda007x";
$database = "promay20_csay";

$conexion = mysqli_connect($server, $user, $pass, $database);

if(!$conexion) {
    die("<script>alert('Conexion fallida')</script>");
}

?>