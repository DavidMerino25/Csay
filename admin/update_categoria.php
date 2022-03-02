<?php

require_once("../modelo/config.php");
$id=$_POST['id'];
$nombre = $_POST['nombre_cat'];

    $nombre_img = $_FILES['imagen_cat']['name'];
    $file = $_FILES['imagen_cat']['tmp_name'];
    $dir_imagen = "../img/img_categorias/" . $nombre_img;
    move_uploaded_file($file, $dir_imagen);

        $sql="UPDATE categorias SET  nombre_cat='$nombre', imagen_cat= '$dir_imagen' WHERE id_categoria='$id'";
        $query=mysqli_query($conexion,$sql);

    if($query){
        Header("Location: ver_categorias.php");
    }
?>