<?php 
require_once("modelo/config.php");


error_reporting(0);

session_start();

	$consulta="SELECT * from usuario where id_usuario='".$_SESSION['id_usuario']."'";
        $resultado=mysqli_query($conexion,$consulta);
        $row = $resultado ->fetch_array();
                
                $usuario=$row['username'];
                $correo=$row['email'];
                $contra=$row['password']; 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/styleslog.css">

	<title>Perfil</title>
</head>
<body>
	<div class="container">
    <header> <center> <a class="logo" href="index.php"><img src="img/Csay.png" alt="logo"></a> </center> </header>
		<form action="update_perfil.php" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Actualizar perfil</p>
			<div class="input-group">
				<input type="text" placeholder="" id="username" name="username" value="<?php echo $usuario; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="" id="email" name="email" value="<?php echo $correo; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="" id="password" name="password" value="<?php echo $contra; ?>" required>
			</div>
			<div class="input-group">
				<button name="datosusuario" class="btn">Actualizar</button>
			</div>
			<!--p class="login-register-text">¿No tienes una cuenta? <a href="registro.php">Registrate aquí</a>.</p-->
		</form>
	</div>
</body>
</html>