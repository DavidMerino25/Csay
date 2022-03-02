<?php 
include 'modelo/config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = ($_POST['password']);
	$cpassword = ($_POST['cpassword']);
	$tipousuario = (int)"2";

	if ($password == $cpassword) {
		$sql = "SELECT * FROM usuario WHERE email='$email'";
		$result = mysqli_query($conexion, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO usuario (username, email, password, id_tipo_usuario)
					VALUES ('$username', '$email', '$password', '$tipousuario')";
			$result = mysqli_query($conexion, $sql);
			if ($result) {
				echo "<script>alert('Bien! Usuario Registrado Con Exito.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
				$tipousuario ="";
			} else {
				echo "<script>alert('¡Oh! Algo Salio Mal.')</script>";
			}
		} else {
			echo "<script>alert('¡Oh! Parace que estas usando un email existente.')</script>";
		}
		
	} else {
		echo "<script>alert('La contraseña no coincide.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/styleslog.css">

	<title> Registro </title>
</head>
<body>

	<div class="container">
	<header> <center> <a class="logo" href="index.php"><img src="img/Csay.png" alt="logo"></a> </center> </header>
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;"> Formulario de Registro </p>
			<div class="input-group">
				<input type="text" placeholder="Nombre" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Contraseña" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirmar contraseña" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Registrar</button>
			</div>
			<p class="login-register-text">¿Tienes una cuenta? <a href="login.php">Inicia aquí</a>.</p>
		</form>
	</div>
</body>
</html>