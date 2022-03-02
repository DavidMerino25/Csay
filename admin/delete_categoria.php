<?php

require_once("../modelo/config.php");

$cod_producto=$_GET['id'];

$query="DELETE FROM categorias WHERE id_categoria='$cod_producto'";

$resultado = $conexion->query(($query));


    if($resultado){
        Header("Location: ver_categorias.php");
    }
?>
