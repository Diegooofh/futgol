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
  <a class="active" href="añadir_datos_index.php">Añadir</a>
  <a href="eliminar_index.php">Eliminar</a>
  <a href="update_index.php">Actualizar</a>
  <a href="sobre_nosotros.php">Sobre nosotros</a>
  <a href="sesion_cerrar.php">Cerrar sesión</a>
  <?php $usuario = $_SESSION["usuario"]; echo "<a href='perfil.php'> $usuario </a>"; ?>
</div>

<body>
<?php
	$pais_1 = $_GET["pais_1"];

	$conexion = mysqli_connect("localhost","usuario","Usuario_2019","futgol");
	mysqli_select_db($conexion,"futgol") or die ("No se puede seleccionar la BD");
	$resultado = mysqli_query($conexion, "INSERT INTO pais (nombre_pais) VALUES ('$pais_1')");
	if (mysqli_connect_errno()) {
	    printf("<p>Conexión fallida: %s</p>", mysqli_connect_error());
	    exit();
	}
?>
	<button onclick=window.location.href='consulta_insert_pais.php'>Consultar tras inserción</button>
	<button onclick=window.location.href='añadir_datos_pais.php'>Volver a insertar</button>
</body>
</html>
<?php
	}
	?>