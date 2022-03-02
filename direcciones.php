<?php
session_start();
require_once("modelo/config.php");

$sesion=$_SESSION['id_usuario'];

?>
  
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/stylesadmin.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width =device-width, initial-scale =1" <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Kaushan+Script&family=Secular+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/stylesnav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Direcciones </title>
</head>

<body>

    <?php
    include_once("cabeceracliente.php");
    ?>
    <div class="container mt-5 agregar">
        <div class="row">
            <div class="col-md-3">
                <h1>Nueva direccion</h1>
                <form action="insertar_direccion.php" method="POST" enctype="multipart/form-data">
                    <input type="text" placeholder="Calle" name="calle" class="form-control mb-3" required="">

                    <input type="number" placeholder="Numero de casa" class="form-control mb-3" name="num_casa" required="">

                    <input type="text" placeholder="Colonia" name="colonia" class="form-control mb-3" required="">

                    <input type="text" placeholder="Municipio" name="municipio" class="form-control mb-3" required="">

                    Estado:
                    <select class="form-control mb-3" name="estado" requiered>
                       
                    <option value="CDMX">CDMX</option>
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja California">Baja California</option>
                        <option value="Baja California Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuhua">Chihuahua</option>
                        <option value="Coahuila">Coahuila</option>
                        <option value="Colima">Colima</option>
                        <option value="Durango">Durango</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="Mexico">M&eacute;xico</option>
                        <option value="Michiacan">Michoac&aacute;n</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo Leon">Nuevo Le&oacute;n</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Queretaro">Quer&eacute;taro</option>
                        <option value="Quintana Roo">Quintana Roo</option>
                        <option value="San Luis Potosi">San Luis Potos&iacute;</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz">Veracruz</option>
                        <option value="Yucatan">Yucat&aacute;n</option>
                        <option value="Zacatecas">Zacatecas</option>

                    </select>

                    <input type="number" placeholder="Codigo postal" class="form-control mb-3" name="codigo_postal" required="">
                    <input type="hidden" placeholder="id_usuario" name="id_usuario" class="form-control mb-3" value="<?php echo $sesion  ?> ">
                    <input class="btn btn-primary" type="submit" name="Guardar" value="Guardar">
                </form>
            </div>

            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>ID</th>
                            <th>id_usuario</th>
                            <th>Calle</th>
                            <th>Numero de casa</th>
                            <th>Colonia</th>
                            <th>Municipio</th>
                            <th>Estado</th>
                            <th>Codigo postal</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        $query = mysqli_query($conexion, "SELECT * FROM direccion, usuario
                                WHERE direccion.id_usuario=$sesion AND direccion.id_usuario = usuario.id_usuario 
                                  ");
                        $resultado = mysqli_num_rows($query);
                        if ($resultado > 0) {
                            while ($data = mysqli_fetch_array($query)) {
                            
                        ?>

                                <tr>
                                    <td><?php echo $data['id_direccion'] ?></td>
                                    <td><?php echo $data['id_usuario'] ?></td>
                                    <td><?php echo $data['calle'] ?></td>
                                    <td><?php echo $data['num_casa'] ?></td>
                                    <td><?php echo $data['colonia'] ?></td>
                                    <td><?php echo $data['municipio'] ?></td>
                                    <td><?php echo $data['estado'] ?></td>
                                    <td><?php echo $data['codigo_postal'] ?></td>

                                    <th><a href="actualizardir.php?id=<?php echo $data['id_direccion'] ?>" class="btn btn-info">Editar</a></th>
                                    <th><a href="deletedirec.php?id=<?php echo $data['id_direccion'] ?>" class="btn btn-danger">Eliminar</a></th>


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