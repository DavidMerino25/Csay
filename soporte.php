<?php

session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title> Soporte </title>
    <link rel="stylesheet" href="css/stylesnav.css">
    <link rel="stylesheet" href="css/stylescategorias.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width =device-width, initial-scale =1"> <link rel="preconnect" href="https://fonts.gstatic.com">
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

    <div id="bannersoporte">
        <div class="contenido-bannercat">
            <h2>Todo lo que necesitas al alcance </h2>
            <h2> Csay</h2>
        </div>
    </div>

    
            <div class="widgets">
                <a href="quienesomos.php">
                    <img src="img/somos.png" width="100" height="100">
                    <p>¿Quienes somos?</p>
                </a>
            </div>

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