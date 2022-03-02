<?php
require_once("modelo/config.php");

if(isset($_POST["id"])){

    
   $sql="UPDATE direccion SET calle ='".$_POST['calle']."', num_casa='".$_POST['num_casa']."', colonia='".$_POST['colonia']."', municipio ='".$_POST['municipio']."', estado='".$_POST['estado']."', codigo_postal='".$_POST['codigo_postal']."',id_usuario='".$_POST['id1']."' WHERE id_direccion ='".$_POST['id']."'";
    $result=mysqli_query($conexion, $sql);

}else{
    echo "Error";
}
header("location: direcciones.php")
?>
 