<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/stylesadmin.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width =device-width, initial-scale =1" <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Kaushan+Script&family=Secular+One&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Historial de ventas</title>
</head>

<body>

    <?php

    include_once("../cabeceradmin.html");

    require_once("../modelo/config.php");

    ?>
    <script type="text/javascript">
        function verificaFechas(fi, ff) {

            var msg = "";
            var confirm = false;

            if (fi != "" && ff != "") {
                var fecha_inicial = new Date(fi);
                var fecha_final = new Date(ff);
                var fecha_actual = new Date();

                if (fecha_final >= fecha_actual)
                    msg += "La fecha final es mayor a la fecha actual";

                if (fecha_inicial > fecha_final)
                    msg += "\nLa fecha inicial es mayor a la fecha final";

                if (msg == "") {
                   
                    confirm = true;
                } else
                    alert(msg);
            } else
                alert("Campos vacíos, por favor verifique");

            return confirm;
        }
    </script>

  <center>
            <h1> Historial de ventas </h1><br><br>
            <div class="form-date">
                <div class="izquierda">
                    <div>
                        <form method="POST">
                            <label for="fecha_inicio"> Fecha inicial: </label>
                            <input class="campos" id="iz" type="date" name="fecha_inicio" value="">
                            <label for="fecha_final"> Fecha final: </label>
                            <input class="campos" id="de" type="date" name="fecha_final" value="">
                            <input type="submit" id="genera" name="Generar" value="Buscar" onclick="return verificaFechas(fecha_inicio.value, fecha_final.value);">
                        </form>
                    </div>
                </div>
                <div class="derecha">
                </div>
            </div>

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
                     if(isset($_POST['Generar'])){
                        $fecha_inicial = $_POST['fecha_inicio'];
                        $fecha_final = $_POST['fecha_final'];

                    $query = mysqli_query($conexion, "SELECT * FROM venta,pedidos,producto
                                WHERE CAST(venta.fecha AS DATE) BETWEEN '".$fecha_inicial."' AND '".$fecha_final."'AND venta.id_venta = pedidos.id_venta AND pedidos.id_producto=producto.id_producto
                                  ");
                    $resultado = mysqli_num_rows($query);
                    if ($resultado) {
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
                                    echo "<img width='100' height='100' src='../img_productos/" . $data['imagen'] . "'>"
                                    ?>
                                </td>

                                <td><?php echo $data['fecha'] ?></td>
                            </tr>


                    <?php
                        }
                    }
                }
                    ?>
                <tbody>
            </table>
        </div>
        </div>





        <?php


        ?>
         </center>
</body>

</html>