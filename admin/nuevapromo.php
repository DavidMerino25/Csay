<?php
require_once("../modelo/config.php");

if (empty($_POST['modelo'])|| empty($_POST['precio']) ) {
    
} else {
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];

    $query = " INSERT INTO promociones (modelo) VALUES ('$modelo');
     UPDATE producto SET   precio=$precio where producto.modelo = '$modelo'";
    $resultado = $conexion->query(($query));
    if ($resultado) {
        Header("Location: promociones.php");
    } else {
        echo "Error";
    }
}
?>

