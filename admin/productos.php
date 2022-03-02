<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/stylesadmin.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width =device-width, initial-scale =1" <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Kaushan+Script&family=Secular+One&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Producto </title>
</head>

<body>

    <?php
    include_once("../cabeceradmin.html");
    ?>
    <div class="container mt-5 agregar">
        <div class="row">
            <div class="col-md-3">
                <h1>Nuevo Producto</h1>
                <form action="insertar.php" method="POST" enctype="multipart/form-data">
                    <input type="text" placeholder="Nombre" name="nombre" class="form-control mb-3" required="">


                    <input type="text" placeholder="Modelo" name="modelo" class="form-control mb-3" required="">


                    <input type="number" placeholder="Precio" class="form-control mb-3" name="precio" required="">


                    <input type="number" placeholder="Stock" class="form-control mb-3" name="stock" required="">
                    Categoria:
                    <select class="form-control mb-3" name="categoria">
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
                    <select class="form-control mb-3" name="talla">
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
                    <select class="form-control mb-3" name="promo">
                       
                        <option value='NO'>NO</option>
                        <option value='SI'>SI</option>

                    </select>



                    <label for="">Imagen</label>
                    <input class="form-control mb-3" type='file' name='imagen' required="">
                    <input class="btn btn-primary" type="submit" name="Guardar" value="Guardar">
                </form>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Modelo</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Categoria</th>
                            <th>Talla</th>
                            <th>Promoción</th>
                            <th>Imagen</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        $query = mysqli_query($conexion, "SELECT * FROM producto, categorias,tallas
                                WHERE producto.id_categoria = categorias.id_categoria AND  producto.id_tallas = tallas.id_tallas
                                  ");
                        $resultado = mysqli_num_rows($query);
                        if ($resultado > 0) {
                            while ($data = mysqli_fetch_array($query)) {

                        ?>

                                <tr>
                                    <td><?php echo $data['id_producto'] ?></td>
                                    <td><?php echo $data['nombre'] ?></td>
                                    <td><?php echo $data['modelo'] ?></td>
                                    <td><?php echo $data['precio'] ?></td>
                                    <td><?php echo $data['cantidad_existente'] ?></td>
                                    <td><?php echo $data['nombre_cat'] ?></td>
                                    <td><?php echo $data['tipo_talla'] ?></td>
                                    <td><?php echo $data['promo'] ?></td>

                                    <td>
                                        <?php
                                        echo "<img width='100' height='100' src='../img_productos/" . $data['imagen'] . "'>"
                                        ?>
                                    </td>
                                    <th><a href="actualizar.php?id=<?php echo $data['id_producto'] ?>" class="btn btn-info">Editar</a></th>
                                    <th><a href="delete.php?id=<?php echo $data['id_producto'] ?>" class="btn btn-danger">Eliminar</a></th>


                                </tr>


                        <?php
                            }
                        }

                        ?>
                    <tbody>
                </table>
            </div>
        </div>
    </div>
    <footer class="footer">

    </footer>
</body>

</html>