<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="../css/stylesadmin.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width =device-width, initial-scale =1" <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Kaushan+Script&family=Secular+One&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Categorias </title>
</head>
<body>

    <?php
    include_once("../cabeceradmin.html");
    ?>
    <div class="container mt-5 agregar" >
        <div class="row">
            <div class="col-md-3">
                <h1>Nueva Categoria</h1>
                <form action="insertar_categoria.php" method="POST" enctype="multipart/form-data">
                        <input type="text" placeholder="Nombre de la categoria" name="nombre_cat" class="form-control mb-3" required="">
                                                                                 
                        <label for="">imagen</label>
                        <input class="form-control mb-3"     type='file' name='imagen_cat' required="">
                    

                    <input class="btn btn-primary" type="submit" name="Guardar" value="Guardar">
                </form>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                        <th>Codigo</th>
                            <th>Nombre Categoria</th>
                            <th>Imagen</th>
                            
                       

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        require_once("../modelo/config.php");
                        $query = mysqli_query($conexion, "SELECT * FROM categorias
                                  ");
                        $resultado = mysqli_num_rows($query);
                        if ($resultado > 0) {
                            while ($data = mysqli_fetch_array($query)) {

                        ?>

                                <tr>
                                     <td><?php echo $data['id_categoria'] ?></td>
                                    <td><?php echo $data['nombre_cat'] ?></td>

                                    <td> <!--img width='100' height='100' src="data:image/png;base64, <?php //echo base64_encode($data['imagen']); ?>"/-->
                                        <?php

                                        echo  "<img width='100' height='100' src='../img_categorias/" . $data['imagen_cat'] . "'>"
                                        ?>
                                    </td>
                                    <th><a href="actualizar_categoria.php?id=<?php echo $data['id_categoria'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete_categoria.php?id=<?php echo $data['id_categoria'] ?>" class="btn btn-danger">Eliminar</a></th> 


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