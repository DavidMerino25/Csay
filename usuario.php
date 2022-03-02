<?php

session_start();

if (isset($_SESSION['username'])) {
}

?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Csay </title>
             <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/stylesnav.css">
    <link rel="stylesheet" href="css/stylescategorias.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/stylesproductos.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width =device-width, initial-scale =1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Kaushan+Script&family=Secular+One&display=swap" rel="stylesheet">
   
    </head>
    <body>
        
        <?php 
            include_once ("cabeceracliente.php");
          include_once ("aside.php");
          include_once ("promos.php");
          include_once ("footer.html");
        ?>
        <div class="overlay">
            <a class="close">&times;</a>
            <div class="overlay__content">
                <a href="#">Inicio</a>
                <a href="#">Categorias</a>
                <a href="#">Promociones</a>
            </div>
        </div>
        <script type="text/javascript" src="js/mobile.js"></script>
    </body>
</html>