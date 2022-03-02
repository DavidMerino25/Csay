<?php

require_once("modelo/config.php");

    $cod_direccion=$_GET['id'];
    
$query="DELETE FROM direccion WHERE id_direccion='$cod_direccion'";

$resultado = $conexion->query(($query));

    if($resultado){
        Header("Location: direcciones.php");
    }
    else{
        echo "error no llego el resultado";
    }
?>
