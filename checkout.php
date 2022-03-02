<?php
require_once("modelo/config.php");
session_start();
if (!isset($_SESSION['carrito'])) {
  header('location: ./index.php');
}
$arreglo = $_SESSION['carrito'];
$sesion = $_SESSION['id_usuario'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title> Orden </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://kit.fontawesome.com/b965409e0d.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Kaushan+Script&family=Secular+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="css/owl.theme.default.min.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="css/stylesnav.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="css/stylescategorias.css?v=<?php echo time(); ?>">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/stylestarjeta.css?v=<?php echo time(); ?>">

</head>
<?php include("cabeceracliente.php"); ?>

<body>
  <script src="https://www.paypal.com/sdk/js?client-id=AfUVu8aIn8YKFkPhopDmVpPSdXpP7agBDP0OcVXwW3pcZLoHY4_7nl-H2ctDS833Bfmw4XMPYeIVHr5u&currency=MXN">
    // Replace YOUR_CLIENT_ID with your sandbox client ID
  </script>

  <div class="site-wrap">

    <div class="site-section">
      <div class="container">

        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Selecciona una direccion</h2>
            <div class="p-3 p-lg-5 border">
              <div class="form-group">

                <div class="form-check"><?php
                                        $query = mysqli_query($conexion, "SELECT * FROM direccion, usuario
                                WHERE direccion.id_usuario=$sesion AND direccion.id_usuario = usuario.id_usuario 
                                  ");
                                        $resultado = mysqli_num_rows($query);
                                        if ($resultado > 0) {
                                          while ($data = mysqli_fetch_array($query)) {

                                        ?>
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" required>
                      <label class="form-check-label" for="flexRadioDefault1" required>
                        <label> <strong> Calle: </strong> <?php echo $data['calle'] ?> </label>
                        <label> <strong> #: </strong> <?php echo $data['num_casa'] ?> </label> <br>
                        <label> <strong> Colonia: </strong> <?php echo $data['colonia'] ?> </label> <br>
                        <label> <strong> Municipio: </strong> <?php echo $data['municipio'] ?> </label> <br>
                        <label> <strong> Estado: </strong> <?php echo $data['estado'] ?> </label> <br>
                        <label> <strong> CP: </strong> <?php echo $data['codigo_postal'] ?> </label>
                        <hr style="border-color:blue;">
                    <?php
                                          }
                                        } else {
                                          echo "Agregue una direcci&oacuten por favor";
                                        }
                    ?>
                      </label>
                      <a class="btn btn-primary" href="direcciones.php" role="button">Agregar Direcci&oacuten</a>

                </div>

              </div>
              <div class="form-group row">
              </div>



              <div class="form-group row">

              </div>

              <div class="form-group row">

              </div>

              <div class="form-group row mb-5">

                <div class="col-md-6 mb-3 mb-md-0">
                  <!--a href="direcciones.php" class="btn btn-primary btn-sm">Agregar Direcci&oacuten</a-->
                </div>
              </div>

            </div>
          </div>
          <div class="col-md-6">


            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Tu Orden</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Producto</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      <?php
                      $total = 0;
                      for ($i = 0; $i < count($arreglo); $i++) {
                        $total = $total + ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);


                      ?>
                        <tr>
                          <td><?php echo $arreglo[$i]['Nombre']; ?></td>
                          <td>$<?php echo number_format($arreglo[$i]['Precio'], 2, '.', ''); ?></td>
                        </tr>
                      <?php
                      }

                      ?>
                      <tr>
                        <td>Total de Orden</td>
                        <td> $<?php echo number_format($total, 2, '.', ''); ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <h2 class="h3 mb-3 text-black"> Terminar tu Compra</h2>
            </div>
            <div id="paypal-button-container"></div>


          </div>




        </div>
        <!-- </form> -->
      </div>
    </div>

    <script type="text/javascript">
      function validate() {
        var numc = document.getElementById('inputNumero').value;
        if (!/^[0-9]+$/.test(numc)) {
          alert("Solo se pueden ingresar numeros");
          return false;
        }
        if (phone.length > 16) {
          alert("La tarjeta debe ser de 16 caracteres");
          return false;
        }
        if (phone.length < 10) {
          alert("La tarjeta debe ser de 10 caracteres");
          return false;
        }
        return true;
      }
    </script>

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

  <script>
    paypal.Buttons({
      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: <?php echo $total; ?>
            }
          }]
        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          
          if(details.status == 'COMPLETED'){
location.href="thankyou.php"
 alert('Transaction completed by ' + details.payer.name.given_name);
          }
         
        });
      }
    }).render('#paypal-button-container'); // Display payment options on your web page
  </script>
</body>

</html>