<?php 

// Inicia o reanuda una sesión de PHP existente
session_start();

// Verifica si el rol del usuario está definido en la sesión
if (!isset($_SESSION['rol'])){

	// Si el rol del usuario no está definido, redirige a la página de inicio
	header('location: index.php');

} else {
	
	// Si el rol del usuario está definido en la sesión
	// Verifica si el rol del usuario es distinto de 1
	if ($_SESSION['rol']!=1) {

		// Si el rol del usuario es distinto de 1, redirige a la página de inicio
		header('location: index.php');
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilos.css"> 	
	<title></title>
</head>
<header>
  <nav>
    <ul class="menu">
      <li><h1><a href="#">CI</a></h1></li>		 	
      <li><a href="#">Inicio</a></li>
      <li><a href="#">Consulta de citas</a></li>
      <li><a href="#">Estatus de estudio</a></li>
      <li><a href="#">Tabla de citas</a></li>
      <li><a href="#">Panel de control</a></li>
      <li><a href="#">Inteligencia de negocios</a></li>   
      <li><a href="#">Perfil</a></li>
      <li><a href="index.php?cerrar_sesion=1">Cerrar sesión</a></li>            
    </ul>
  </nav>
</header>
<body>

</body>
</html>
