<?php
require_once("modelo/config.php");

$query_productos = "SELECT * FROM producto,tallas
                                WHERE  producto.id_tallas = tallas.id_tallas AND promo='SI'
                                 AND producto.cantidad_existente>0 ";
$resultado_productos = $conexion->query($query_productos);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="css/stylesproductos.css?v=<?php echo time(); ?>">

    <title>Promociones</title>
</head>

<body>
    <div class="texto_titulo">
        <p>Promociones</p>
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

                        <?php
                        if (isset($_SESSION['username'])) {
                            ?>
                                   <a href="cart.php?id_producto=<?php echo $row['id_producto'] ?>" class="card__button">Añadir a carrito</a>
                           <?php  
                        } 
                        
                        else {
                            ?>
                            <a href="login.php" class="card__button">Comprar ahora</a>
                            <?php  
                        }

                        ?>

                        
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </section>


</body>

</html>