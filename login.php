<?php 

include 'modelo/config.php';

error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM usuario WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conexion, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
			$_SESSION['id_usuario'] = $row['id_usuario'];
		//$tipousuario = $result[4]; 
		$_SESSION['id_tipo_usuario'] = $row['id_tipo_usuario'];

				switch($_SESSION['id_tipo_usuario']){
					case 1:
						header('location: admin/administrador.php');
					break;
					case 2:
						header('location: usuario.php');
					break;
	
					default:
				}
	} else {
		echo "<script>alert('¡Ups! El correo electrónico o la contraseña son incorrectos.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/styleslog.css">

	<title>Login</title>
</head>
<body>
	<div class="container">
    <header> <center> <a class="logo" href="index.php"><img src="img/Csay.png" alt="logo"></a> </center> </header>
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Iniciar Sesión</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Contraseña" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">¿No tienes una cuenta? <a href="registro.php">Registrate aquí</a>.</p>
		</form>
	</div>
</body>
</html>