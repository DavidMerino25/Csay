<?php
session_start();
include_once("modelo/config.php");

$sesion=$_SESSION['id_usuario'];

if(!isset($_SESSION['carrito'])){ header("Location: ./cabecerac.php");}
$arreglo = $_SESSION['carrito'];
$total = 0;
for($i=0; $i<count($arreglo);$i++){
  $total = $total + ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);
}

$fecha = date('Y-m-d');
$conexion -> query("INSERT INTO venta(id_usuario, total, fecha) VALUES ($sesion, $total, '$fecha' )") or die($conexion->error);
$id_venta = $conexion -> insert_id;
for($i=0; $i<count($arreglo);$i++){
  $conexion -> query("INSERT INTO pedidos (id_venta, id_producto, cantidad, precio, subtotal)
  VALUES ($id_venta,
  ".$arreglo[$i]['Id_producto'].",
  ".$arreglo[$i]['Cantidad'].",
  ".$arreglo[$i]['Precio'].",
  ".$arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio']. "
  ) ") or die($conexion->error);

$conexion-> query("UPDATE producto SET cantidad_existente= cantidad_existente-".$arreglo[$i]['Cantidad']." WHERE id_producto=".$arreglo[$i]['Id_producto']." ") or die($conexion->error);

}
unset($_SESSION['carrito']);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Kaushan+Script&family=Secular+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/stylesnav.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="css/stylescategorias.css?v=<?php echo time(); ?>">

    
  </head>
  <body>
  
  <div class="site-wrap">
   <?php include("cabeceracliente.php"); ?> 

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black texto_titulo" >Muchas Gracias!</h2>
            <p class="lead mb-5">Su orden a sido completada con exito.</p>
            <p><a href="cabecerac.php" class="btn btn-sm btn-primary">Seguir Comprando</a></p>
          </div>
        </div>
      </div>
    </div>

    <?php include("footer.html"); ?> 

  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>