<?php
require_once("../modelo/config.php");

if (empty($_POST['nombre_cat'])) {
    
} else {
    $nombre_cat = $_POST['nombre_cat'];

    $nombre_img = $_FILES['imagen_cat']['name'];
    $file = $_FILES['imagen_cat']['tmp_name'];
    $dir_imagen = "../img/img_categorias/" . $nombre_img;
    move_uploaded_file($file, $dir_imagen);

    $query = "INSERT INTO categorias (nombre_cat, imagen_cat) VALUES ('$nombre_cat','$dir_imagen') ";
    $resultado = $conexion->query(($query));
    if ($resultado) {
        Header("Location: ver_categorias.php");
    } else {
        echo "Error";
    }
}
?>
