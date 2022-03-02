<?php

session_start();

if (isset($_SESSION['username'])) {
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Administrador</title>
    <link rel="stylesheet" href="../css/stylesadmin.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/stylesnav.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width =device-width, initial-scale =1" <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Kaushan+Script&family=Secular+One&display=swap" rel="stylesheet">
</head>
<?php
?>

<body>
<!--?php
include_once("../cabeceradmin.html");
?-->

<header>
            <a class="logo" href="../index.php"><img src="../img/Csay.png" alt="logo"></a>
            <nav>
                <ul class="nav__links">
                    <li><a href="../index.php">Inicio</a></li>
                    <!--li><a href="notfound.php">Mis Pedidos</a></li-->
                </ul>
            </nav>
            <h2> <?php echo "Hola, ". $_SESSION['username']; ?> </h2>
            <a class="cta" href="../logout.php"> Cerrar sesión  </a>
            <p class="menu cta">Menu</p>
        </header>

    <p class="texto_admin"> Bienvenido Administrador
    </p>

    <section class="opciones">

        <div class="seleccion">
            <a href="productos.php">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" class="icon icon-tabler icon-tabler-building-store" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="3" y1="21" x2="21" y2="21" />
                    <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                    <line x1="5" y1="21" x2="5" y2="10.85" />
                    <line x1="19" y1="21" x2="19" y2="10.85" />
                    <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                </svg>
                <h3>Productos</h3>
            </a>
        </div>

        <div class="seleccion">
            <a href="historial.php">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon"  class="icon icon-tabler icon-tabler-report" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" />
                    <path d="M18 14v4h4" />
                    <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" />
                    <rect x="8" y="3" width="6" height="4" rx="2" />
                    <circle cx="18" cy="18" r="4" />
                    <path d="M8 11h4" />
                    <path d="M8 15h3" />
                </svg>
                <h3>Historial</h3>
            </a>
        </div>
        <div class="seleccion">
            <a href="ver_categorias.php">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon"  class="icon icon-tabler icon-tabler-report" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" />
                    <path d="M18 14v4h4" />
                    <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" />
                    <rect x="8" y="3" width="6" height="4" rx="2" />
                    <circle cx="18" cy="18" r="4" />
                    <path d="M8 11h4" />
                    <path d="M8 15h3" />
                </svg>
                <h3>Categorias</h3>
            </a>
        </div>

    </section>

    <footer class="footer">

    </footer>
</body>



<?php

?>

</html>