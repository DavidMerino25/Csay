<?php 
require_once("modelo/config.php");


error_reporting(0);

session_start();
$sesion=$_SESSION['id_usuario'];
        $consulta="SELECT * from usuario where id_usuario='".$_SESSION['id_usuario']."'";
        $resultado=mysqli_query($conexion,$consulta);
        $row = $resultado ->fetch_array();
                
                $correo = $row['email'];
                $usuario = $row['username'];
                $contra = $row['password'];  
                $password = '';
                
                for($i=0; $i<strlen($contra); $i++)
                    $passsword .= '*';
?>

<?php 
    include_once("cabeceracliente.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/stylesnav.css">
	<link rel="stylesheet" href="css/styles_perfil.css">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<title> PERFIL </title>
</head>
<body>

	<div class="container">
	<!--header> <center> <a class="logo" href="index.php"><img src="img/Csay.png" alt="logo"></a> </center> </header-->
		<form action="" method="" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;"> PERFIL </p>

			<div class="input-group">
				<label> <strong> Correo electronico: </strong> <?php echo $correo; ?>  </label> 
			</div>
            <div class="input-group">
				<label> <strong> Usuario: </strong> <?php echo $usuario; ?>  </label> 
			</div>
            <div class="input-group">
				<label> <strong> Contraseña: </strong> <?php echo $contra; ?>  </label> 
			</div>
			
            <!--div class="input-group">
				<input type="password" placeholder="Confirmar contraseña" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div-->
			<div class="input-group">
            <a href="actualizar_perfil.php?id=<?php echo $sesion?>" class="btn btn-info" name="datosusuario" >Actualizar</a>
			</div>
			<div class="input-group">
            <a href="direcciones.php?id=<?php echo $data['id_direccion'] ?>" class="btn btn-info" >Mis direcciones</a>
			</div>
			<!--p class="login-register-text">¿Tienes una cuenta? <a href="login.php">Inicia aquí</a>.</p-->
		</form>
        
	</div>

    <!--div class="container1"-->
	<!--header> <center> <a class="logo" href="index.php"><img src="img/Csay.png" alt="logo"></a> </center> </header-->
		<!--form action="" method="POST" class="login-email">
            <p class="login-text1" style="font-size: 2rem; font-weight: 800;"> DIRECCIONES </p>

			<div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
             Default radio
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2">
            Second default radio
            </label>
</div-->	
            <!--div class="input-group">
				<input type="password" placeholder="Confirmar contraseña" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group1">
            <input onclick="location.href='actualizar_perfil.php'" class="button1" type="submit" name="datosusuario" value="Actualizar">
			</div-->
			<!--p class="login-register-text">¿Tienes una cuenta? <a href="login.php">Inicia aquí</a>.</p>
		</form-->
	</div>
</body>
</html>
