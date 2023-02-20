<?php 


session_start(); // Inicia la sesión

if (isset($_GET['cerrar_sesion'])) {
	session_unset(); // Elimina todas las variables de sesión
	session_destroy(); // Destruye la sesión
}


// Cierra la sesión si se recibe una petición GET de "cerrar_sesion"


if (isset($_SESSION['rol'])) { // Si existe una variable de sesión "rol"
	switch ($_SESSION['rol']) { // hace una comprobación de su valor
		case 1:
			header('location: admin.php'); // Si es 1, redirige a la página de administrador
			break;

		case 2:
			header('location: user.php'); // Si es 2, redirige a la página de usuario
			break;

		default:
			// Si no coincide con ningún valor esperado, no hace nada
	}
}

if (isset($_POST['username']) && isset($_POST['password'])) { // Si se reciben los datos del formulario...
	$username = $_POST['username']; // asigna el valor del campo "username" a la variable $username
	$password = $_POST['password']; // asigna el valor del campo "password" a la variable $password

	$db = new PDO('mysql:host=localhost;dbname=consultorio2', 'root', ''); // Crea una instancia de la clase "PDO" para conectarse a la base de datos
	$query = $db->prepare('SELECT * FROM Usuarios WHERE Nombre = :username AND Pass = :password'); // Prepara una consulta SQL para buscar el usuario y contraseña
	$query->execute(['username'=>$username, 'password' => $password]); // Ejecuta la consulta, pasando los valores de usuario y contraseña

	$row = $query->fetch(PDO::FETCH_NUM); // Obtiene la primera fila del resultado de la consulta

	if ($row) {
		$_SESSION['rol'] = $row[3]; // Establece la variable de sesión "rol" con el valor del campo "rol" del usuario encontrado (Es la tercera columna de la tabla usuarios, el campo permisos)
		switch ($_SESSION['rol']) { // Hace una comprobación del valor del rol
			case 1:
				header('location: admin.php'); // Si es 1, redirige a la página de administrador
				break;

			case 2:
				header('location: user.php'); // Si es 2, redirige a la página de usuario
				break;

			default:
				// Si no coincide con ningún valor esperado, no hace nada
		}
	} else {
		echo 'Usuario no encontrado'; // Si no se ha encontrado el usuario, muestra un mensaje de error
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Inicio de sesion</title>
	<link rel="stylesheet" type="text/css" href="estilos.css"> 
</head>
<body>
	<div class="login-box">
		<h2>Inicio de sesion</h2>
		<form action="#" method="POST">
			<div class="user-box">
				<input type="text" name="username" required="">
				<label>Usuario</label>
			</div>
			<div class="user-box">
				<input type="password" name="password" required="">
				<label>Contraseña</label>
			</div>
			<input type="submit" value="Ingresar">
		</form>
	</div>
</body>
</

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Inicio de sesion</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<div class="login-box">
		<h2>Inicio de sesion</h2>
		<form action="#" method="POST">
			<div class="user-box">
				<input type="text" name="username" required="">
				<label>Usuario</label>
			</div>
			<div class="user-box">
				<input type="password" name="password" required="">
				<label>Contraseña</label>
			</div>
			<input type="submit" value="Ingresar">
		</form>
	</div>
</body>
</html>
