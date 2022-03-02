<?php

require_once("../modelo/config.php");

$cod_producto=$_GET['id'];

$query="DELETE FROM producto WHERE id_producto='$cod_producto'";

$resultado = $conexion->query(($query));


    if($resultado){
        Header("Location: productos.php");
    }
?>
