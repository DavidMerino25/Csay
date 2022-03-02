<!DOCTYPE html>
<html lang="es">

<head>
    <title>Aside</title>
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width =device-width, initial-scale =1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Kaushan+Script&family=Secular+One&display=swap" rel="stylesheet">
</head>

<body>

    <section id="banner">
        <div class="banner-texto">
            <h1> La mejor ropa de hombre a la moda</h1>
            <p> "Se un hombre con caracter y estilo" </p>
            <?php
            if (isset($_SESSION['username'])) {
            ?>
                <div class="banner-boton">
                    <a href="perfil.php"> <span> </span> Mi Perfil</a>
                    <a href="quienesomos.php"> <span> </span> Ver más </a>
                    <!-- <a href="#"> <span> </span> Leer más </a>  -->
                </div>

            <?php
            } else {
            ?>
                <div class="banner-boton">
                    <a href="registro.php"> <span> </span> Registrarme </a>
                    <a href="quienesomos.php"> <span> </span> Ver más </a>
                    <!-- <a href="#"> <span> </span> Leer más </a>  -->
                </div>
            <?php
            }

            ?>


        </div>
    </section>
    

</body>

</html>