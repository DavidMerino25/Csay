<?php
include_once("../cabeceradmin.html");
require_once("../modelo/config.php");

$id = $_GET['id'];

$sql = "SELECT * FROM categorias WHERE id_categoria='$id'";
$query = mysqli_query($conexion, $sql);

$row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Actualizar categorias</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesadmin.css?v=<?php echo time(); ?>">
    <title>Actualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">
        <div class="actualiza">


            <form action="update_categoria.php" method="POST" enctype="multipart/form-data">


            <input type="hidden" placeholder="id_categoria" name="id" class="form-control mb-3" value="<?php echo $row['id_categoria']  ?> ">

                <input type="text" placeholder="Nombre categoria" name="nombre_cat" class="form-control mb-3" value="<?php echo $row['nombre_cat']  ?> ">

                <label for="">imagen</label>
                <input class="form-control mb-3" type='file' name='imagen_cat' required="" value="<?php echo $row['imagen_cat']  ?>">

                <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
            </form>

        </div>
    </div>
</body>

</html>
