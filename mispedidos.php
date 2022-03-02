<?php
session_start();
require_once("modelo/config.php");
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/stylesadmin.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/stylesnav.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width =device-width, initial-scale =1" <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Kaushan+Script&family=Secular+One&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Historial de Pedidos</title>
</head>

<body>
    <center>

        <?php
        include_once("cabeceracliente.php");
        $in_date = '';
        $end_date = '';
        $wheree = "";

        if (isset($_REQUEST['in_date']) || isset($_REQUEST['end_date'])) {

            if ($_REQUEST['in_date'] == '' || $_REQUEST['end_date'] == '') {
                header("location: Historial_Ventas.php");
            }
        }

        if (!empty($_REQUEST['in_date']) && !empty($_REQUEST['in_date'])) {
            $in_date = $_REQUEST['in_date'];
            $end_date = $_REQUEST['end_date'];
        ?>

            <section class="inicio">


                <?php
                if ($in_date > $end_date) {
                    header("mispedidos.php"); ?>

                    <h3 align="center"><?php echo   $mesaje = "La fecha que ingreso De es mayor a la fecha de A"; ?></h3><br><br>

            <?php
                } else if ($in_date == $end_date) {
                    $wheree = "fecha LIKE '$in_date'";
                    $buscar = "in_date=$in_date&end_date=$end_date";
                } else {
                    $in_d = $in_date;
                    $end_d = $end_date;
                    $wheree = "BETWEEN '$in_d' AND '$end_d'";
                    $buscar = "in_date=$in_date&end_date=$end_date";
                }
            }
            ?>

            <center>
                <h1> Historial de ventas </h1>
            </center><br><br>



            <center>
                <div class="form-date">
                    <form action="mispedidos.php" method="get">
                        <label>De:</label>
                        <input type="date" name="in_date" id="in_date" value="<?php echo $in_date ?>" required>
                        <label>A</label>
                        <input type="date" name="end_date" id="end_date" value="<?php echo $end_date ?>" required>
                        <input type="submit" value="Buscar" /></td><br><br>

                    </form>
                    <br>
                </div>
            </center>
            <section class="inicio">
                <div class="col-md-8">
                    <table class="table">
                        <thead class="table-success table-striped">
                            <tr>
                                <th>Id Venta</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Total</th>
                                <th>Imagen</th>
                                <th>Fecha</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sesion = $_SESSION['id_usuario'];
                        $query = mysqli_query($conexion, "SELECT * from venta,usuario,pedidos,producto WHERE CAST(venta.fecha AS DATE) $wheree  AND venta.id_venta = pedidos.id_venta AND venta.id_usuario= usuario.id_usuario AND venta.id_usuario=$sesion AND pedidos.id_producto=producto.id_producto ");
                        $resultado = mysqli_num_rows($query);
                        if ($resultado > 0) {
                            while ($data = mysqli_fetch_array($query)) {

                        ?>

                                <tr>
                                    <td><?php echo $data['id_venta'] ?></td>
                                    <td><?php echo $data['nombre'] ?></td>
                                    <td><?php echo $data['cantidad'] ?></td>
                                    <td><?php echo $data['precio'] ?></td>
                                    <td><?php echo $data['total'] ?></td>

                                    <td>
                                        <?php
                                        echo "<img width='100' height='100' src='img_productos/" . $data['imagen'] . "'>"
                                        ?>
                                    </td>

                                    <td><?php echo $data['fecha'] ?></td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td class="tdB">
                                    <colspan="5">No hay registros encontrados
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!--</center>-->
            </section>
    </center>
</body>

</html>


<?php
include_once("footer.html");
?>

</center>
</body>

</html>