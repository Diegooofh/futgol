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
  <a class="active" href="eliminar_index.php">Eliminar</a>
  <a href="update_index.php">Actualizar</a>
  <a href="sobre_nosotros.php">Sobre nosotros</a>
  <a href="sesion_cerrar.php">Cerrar sesión</a>
  <?php $usuario = $_SESSION["usuario"]; echo "<a href='perfil.php'> $usuario </a>"; ?>
</div>

<body>
    <h3>Elige que quieres eliminar:</h3>
    <button onclick=window.location.href='eliminar_datos_jugadores.php'>Eliminar jugadores</button>
    <button onclick=window.location.href='eliminar_datos_equipos.php'>Eliminar equipos</button>
    <button onclick=window.location.href='eliminar_datos_pais.php'>Eliminar pais</button>
</body>
</html>
<?php
	}?>