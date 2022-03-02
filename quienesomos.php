<?php

session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Soporte </title>
    <link rel="stylesheet" href="css/stylesnav.css">
    <link rel="stylesheet" href="css/stylescategorias.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width =device-width, initial-scale =1" <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Kaushan+Script&family=Secular+One&display=swap" rel="stylesheet">
</head>
<?php
if (isset($_SESSION['username'])) {
    include_once ("cabeceracliente.php");
} else{
    include_once("cabecera.html");
}

?>

<body class="body-categorias">

    <div id="bannerwhy">
        <div class="contenido-bannercat">
            <h2>¿Quienes somos? </h2>
            
        </div>
    </div>

    <p class="estilo-3">Csay es una empresa dedicada a la venta online de ropa. Nuestro objetivo es ofrecer la moda más actual a los mejores precios.
Tenemos a su disposición una gran variedad de productos, los cuales son renovados cada temporada para dar siempre las prendas más trendy.</p><br/>
<p class="estilo-3">Para una mejor comunicación puedes contactar con nosotros a través de WhatsApp o mensaje privado de Facebook y tan sólo en unos minutos tu duda será resuelta.</p>
<br /> 
            <div class="widgets">
                <a href="contacto.php">
                    <img src="img/contacto.png" alt="" width="100" height="100">
                    <p>Contacto</p>
                </a>
            </div>
            
    </section>
   
</body>
<?php
     include_once("footer.html");
     ?>

</html>