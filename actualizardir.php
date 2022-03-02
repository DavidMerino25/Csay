<?php
session_start();
include_once("cabeceracliente.php");
require_once("modelo/config.php");
$sesion=$_SESSION['id_usuario'];
$id = $_GET['id'];

$sql = "SELECT * FROM direccion, usuario WHERE direccion.id_direccion='$id' AND direccion.id_usuario=$sesion AND direccion.id_usuario= usuario.id_usuario";
$query = mysqli_query($conexion, $sql);

$row = mysqli_fetch_array($query);

?>
  
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/stylesadmin.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width =device-width, initial-scale =1" <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Kaushan+Script&family=Secular+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/stylesnav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Direcciones </title>
</head>
<center>
<body>

   
    <div class="container mt-5 ">
        
            <div class="col-md-3 agregar">
                <h1>Actualizar direcci&oacuten</h1>
                <form action="update_dir.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" placeholder="id_usuario" name="id1" class="form-control mb-3" value="<?php echo $row['id_usuario']  ?> ">
                <input type="hidden" placeholder="id_direccion" name="id" class="form-control mb-3" value="<?php echo $row['id_direccion']  ?> ">
                    <input type="text" placeholder="Calle" name="calle" class="form-control mb-3"  value="<?php echo $row['calle']  ?>" >


                    <input type="number" placeholder="Numero de casa" class="form-control mb-3" name="num_casa"   value="<?php echo $row['num_casa']  ?>">

                    <input type="text" placeholder="Colonia" name="colonia" class="form-control mb-3" required=""
                    value="<?php echo $row['colonia'] ?>">

                    <input type="text" placeholder="Municipio" name="municipio" class="form-control mb-3" required=""
                    value="<?php echo $row['municipio']  ?>">

                    Estado:
                    <select class="form-control mb-3" name="estado"   value="<?php echo $row['estado']  ?>">
                       
                    <option value="CDMX">CDMX</option>
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja California">Baja California</option>
                        <option value="Baja California Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuhua">Chihuahua</option>
                        <option value="Coahuila">Coahuila</option>
                        <option value="Colima">Colima</option>
                        <option value="Durango">Durango</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="Mexico">M&eacute;xico</option>
                        <option value="Michiacan">Michoac&aacute;n</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo Leon">Nuevo Le&oacute;n</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Queretaro">Quer&eacute;taro</option>
                        <option value="Quintana Roo">Quintana Roo</option>
                        <option value="San Luis Potosi">San Luis Potos&iacute;</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz">Veracruz</option>
                        <option value="Yucatan">Yucat&aacute;n</option>
                        <option value="Zacatecas">Zacatecas</option>

                    </select>

                    <input type="number" placeholder="Codigo postal" class="form-control mb-3" name="codigo_postal"   value="<?php echo $row['codigo_postal']  ?>">
           
                    <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                </form>
            </div>
        
    </div>
    
    <?php 
    include_once("footer.html");?>
    
</body>
</center>
</html>