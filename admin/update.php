<?php

require_once("../modelo/config.php");
$id=$_POST['id'];
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


        $sql="UPDATE producto SET  nombre='$nombre', modelo='$modelo', precio=$precio, cantidad_existente=$stock, imagen= '$dir_imagen', id_categoria=$categoria, id_tallas=$talla, promo='$promo' WHERE id_producto='$id'";
        $query=mysqli_query($conexion,$sql);

    if($query){
        Header("Location: productos.php");
    }
