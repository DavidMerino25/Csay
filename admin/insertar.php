<?php
require_once("../modelo/config.php");

if (empty($_POST['nombre']) || empty($_POST['modelo'])|| empty($_POST['precio'])  || empty($_POST['stock'])) {
    
} else {
    $nombre = $_POST['nombre'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];


    $nombre_img = $_FILES['imagen']['name'];
    $file = $_FILES['imagen']['tmp_name'];
    $dir_imagen = "../img/img_productos/" . $nombre_img;
    move_uploaded_file($file, $dir_imagen);

    $categoria = $_POST['categoria'];

    $talla = $_POST['talla'];
    $promo = $_POST['promo'];

    $query = "INSERT INTO producto (nombre, modelo, precio, cantidad_existente, imagen, id_categoria, id_tallas,promo) VALUES ('$nombre','$modelo',$precio, $stock, '$dir_imagen', $categoria, $talla,'$promo') ";
    $resultado = $conexion->query(($query));
    if ($resultado) {
        Header("Location: productos.php");
    } else {
        echo "Error";
    }
}
?>