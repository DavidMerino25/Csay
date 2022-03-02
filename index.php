<?php 

session_start();

if (isset($_SESSION['username'])) {
    header("Location: usuario.php");
}

include_once("cabecera.html");
include_once("aside.php");
include_once("promos.php");
include_once("footer.html");

?>