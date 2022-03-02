<?php  
session_start();
include_once("modelo/config.php");

if(isset($_POST["datosusuario"])){
    
   $sql="update usuario set username ='".$_POST['username']."', email='".$_POST['email']."', password='".$_POST['password']."'
   where id_usuario='".$_SESSION['id_usuario']."'";
    $result=mysqli_query($conexion, $sql);

}
header("location: perfil.php")
?>
 