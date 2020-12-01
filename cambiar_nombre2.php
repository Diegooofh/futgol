<?php
	session_start();
	if(!isset($_SESSION["usuario"])){
		header("Location: index.php");
		die();
	}
	else{
		?>
<html>
<head>
<title>Futgol</title>
<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
<link rel="shortcut icon" href="favicon.ico" />
</head>

<div class="topnav">
  <a href="index2.php">Home</a>
  <a href="consultar_index.php">Consulta</a>
  <a href="añadir_datos_index.php">Añadir</a>
  <a href="eliminar_index.php">Eliminar</a>
  <a href="update_index.php">Actualizar</a>
  <a href="sobre_nosotros.php">Sobre nosotros</a>
  <a href="sesion_cerrar.php">Cerrar sesión</a>
  <?php $usuario = $_SESSION["usuario"]; echo "<a class='actuve' href='perfil.php'> $usuario </a>"; ?>
</div>

<body>
<?php
    $nombre = $_GET["nombre"];
    $nuevo_nombre = $_GET["nuevo_nombre"];

	$conexion = mysqli_connect("localhost","usuario","Usuario_2019","futgol");
	mysqli_select_db($conexion,"futgol") or die ("No se puede seleccionar la BD");
	$resultado = mysqli_query($conexion, "UPDATE usuarios SET nombre = '$nuevo_nombre' WHERE nombre = '$nombre'");
	if (mysqli_connect_errno()) {
	    printf("<p>Conexión fallida: %s</p>", mysqli_connect_error());
	    exit();
	}
?>
    <p> Reinicia la sesión para que los cambios se hagan totalmente efectivos</p>
	<button onclick=window.location.href='consulta_usuarios.php'>Consultar tras actualizar los datos</button>
	<button onclick=window.location.href='perfil.php'>Volver al perfil</button>
    <button onclick=window.location.href='sesion_cerrar.php'>Cerrar sesión</button>
</body>
</html>
<?php
	}
	?>