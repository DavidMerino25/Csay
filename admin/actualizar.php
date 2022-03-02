<?php
include_once("../cabeceradmin.html");
require_once("../modelo/config.php");

$id = $_GET['id'];

$sql = "SELECT * FROM producto WHERE id_producto='$id'";
$query = mysqli_query($conexion, $sql);

$row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Actualizar Producto</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesadmin.css?v=<?php echo time(); ?>">
    <title>Actualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">
        <div class="actualiza">


            <form action="update.php" method="POST" enctype="multipart/form-data">


            <input type="hidden" placeholder="id_producto" name="id" class="form-control mb-3" value="<?php echo $row['id_producto']  ?> ">

                <input type="text" placeholder="Nombre" name="nombre" class="form-control mb-3" value="<?php echo $row['nombre']  ?> ">

                <input type="text" placeholder="Modelo" name="modelo" class="form-control mb-3" value="<?php echo $row['modelo']  ?>">

                <input type="number" placeholder="Precio" class="form-control mb-3" name="precio" value="<?php echo $row['precio']  ?>">

                <input type="number" placeholder="Stock" class="form-control mb-3" name="stock" value="<?php echo $row['cantidad_existente']  ?>">

                Categoria:
                <select class="form-control mb-3" name="categoria" value="<?php echo $row['id_categoria']  ?>">
                <?php
                        require_once("../modelo/config.php");
                        $query_cat = mysqli_query($conexion, "SELECT * FROM categorias");
                        $resultado_cat = mysqli_num_rows($query_cat);
                        if ($resultado_cat > 0) {
                            while ($data = mysqli_fetch_array($query_cat)) {
                                $id_categoria = $data[0];
                        ?>

                                <option value="<?php echo $data['id_categoria'] ?>"><?php echo $data['nombre_cat'] ?></option>

                        <?php
                            }  // cierre de while
                        }    //cierre de if

                        ?>
                </select>

                Talla:
                <select class="form-control mb-3" name="talla" value="<?php echo $row['id_tallas']  ?>">
                <?php
                        require_once("../modelo/config.php");
                        $query_talla = mysqli_query($conexion, "SELECT * FROM tallas");
                        $resultado_talla = mysqli_num_rows($query_talla);
                        if ($resultado_talla > 0) {
                            while ($data2 = mysqli_fetch_array($query_talla)) {
                        ?>

                                <option value="<?php echo $data2['id_tallas'] ?>"><?php echo $data2['tipo_talla'] ?></option>

                        <?php
                            }  // cierre de while
                        }    //cierre de if

                        ?>
                </select>
                ¿Promoción?
                    <select class="form-control mb-3" name="promo" value="<?php echo $row['promo']  ?>">
                       
                        <option value='NO'>NO</option>
                        <option value='SI'>SI</option>

                    </select>
                <label for="">imagen</label>
                <input class="form-control mb-3" type='file' name='imagen' required="" value="<?php echo $row['imagen']  ?>">

                <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
            </form>

        </div>
    </div>
</body>

</html>
