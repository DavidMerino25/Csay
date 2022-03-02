<?php
session_start();
require_once("modelo/config.php");
$query = mysqli_query($conexion, "SELECT * FROM categorias");
if (isset($_GET['id_categoria'])) {
    $id_categoria = $_GET['id_categoria'];
    $query_productos = "SELECT * FROM producto,tallas
                                WHERE id_categoria= $id_categoria AND  producto.id_tallas = tallas.id_tallas AND producto.cantidad_existente>0
                                  ";
  $resultado_productos = $conexion->query($query_productos);
}
else{
    $query_productos = "SELECT * FROM producto,tallas where producto.id_tallas = tallas.id_tallas AND producto.cantidad_existente>0";
    $resultado_productos = $conexion->query($query_productos);
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Categorias </title>
    <link rel="stylesheet" href="css/stylescategorias.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/stylesproductos.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width =device-width, initial-scale =1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Kaushan+Script&family=Secular+One&display=swap" rel="stylesheet">
</head>
<?php
include_once("cabecera.html");
?>

<body class="body-categorias">

    <div id="bannercategorias">
        <div class="contenido-bannercat">
            <h2>Todo lo que necesitas al alcance </h2>
            <h2> de un click</h2>
        </div>
    </div>

    <section class="categorias">
        <section class="display-categorias">


            <!-- <input type="image" name="1" src="img/camisa.png" alt="" class="widgets" width="60" height="100"> -->
            <?php
            $resultado = mysqli_num_rows($query);
            if ($resultado > 0) {
                while ($data = mysqli_fetch_array($query)) {
                    $id_categoria = $data[0];
                    $categoria = $data[1];
            ?>
                    <div class="widgets">
                        <a href="categorias.php?id_categoria=<?php echo $id_categoria; ?>">
                            <?php
                            echo  "<img width='100' height='100' src='img_categorias/" . $data['imagen_cat'] . "'>";
                            echo $categoria;
                            ?>
                        </a>
                    </div>
            <?php
                }  // cierre de while
            }    //cierre de if

            ?>

        </section>
    </section>

    <?php

    ?>
    
    <div class="widgets">
                <a href="categorias.php">
                    <?php
                    echo "Ver Todos";
                    ?>
                </a>
            </div>

    <section class="container">
        <a name="categoria-<?php echo $data['id_categoria'] ?>"> </a>
        <div class="display-productos">
            <?php

            while ($row = $resultado_productos->fetch_assoc()) {
            ?>
                <div class="card">
                    <div class="card__imag">
                        <?php
                        echo "<img  src='img_productos/" . $row['imagen'] . "' >"
                        ?>
                    </div>

                    <div class="card__data">
                        <h1 class="card__title"> <?php echo ($row['nombre']); ?></h1>
                        <span class="card__preci">$<?php echo ($row['precio']); ?></span>
                        <p class="card__description">Modelo: <?php echo ($row['modelo']); ?></p>
                             <p class="card__description">Talla: <?php echo ($row['tipo_talla']); ?></p>
                        <a href="login.php" class="card__button">Comprar ahora</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
    
    <section class="contenedor-slide">
        <div class="slider">
            <ul>
                <li> <img src="img/slide1.png" alt="" width="1000" height="400"></li>
                <li> <img src="img/slide2.jpg" alt="" width="1000" height="400"></li>
                <li> <img src="img/slide3.jpg" alt="" width="1000" height="400"></li>
                <li> <img src="img/slide4.jpg" alt="" width="1000" height="400"></li>

            </ul>
        </div>
    </section>

</body>
<?php
include_once("footer.html");
?>

</html>