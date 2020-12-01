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
  <?php $usuario = $_SESSION["usuario"]; echo "<a class='active' href='perfil.php'> $usuario </a>"; ?>
</div>

<body>
<form action="cambiar_contraseña2.php" method="get">
<div>
<p>Introduce la antigua contraseña: <input type="text" name="contraseña"></p>
<p>Introduce la nueva contraseña: <input type="text" name="nueva_contraseña"></p>
<input type="submit" name="Enviar">
</form>
</div>
</body>
</html>
<?php
    }
    ?>