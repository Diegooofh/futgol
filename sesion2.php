
<?php
	session_start();
	$ses;
	$conexion = mysqli_connect("localhost","usuario","Usuario_2019","futgol");
	mysqli_select_db($conexion,"futgol") or die ("No se puede seleccionar la BD");
	$resultado = mysqli_query($conexion, "select * from usuarios");
	if (mysqli_connect_errno()) {
	    printf("<p>Conexión fallida: %s</p>", mysqli_connect_error());
	    exit();
	}
	$numr = mysqli_num_rows($resultado);
	$fila = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
	$login = $fila["usuario"];
	$contraseña = $fila["contraseña"];

	if(!isset($_SESSION["usuario"])){
		$usuario = $_GET["usuario"];
		$pass = $_GET["pass"];
		if(strcmp($usuario,$login)==0 && strcmp($pass,$contraseña)==0){
			$_SESSION["usuario"] = $usuario;
		}
	}
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
  <a class="active" href="index2.php">Home</a>
  <a href="consultar_index.php">Consulta</a>
  <a href="añadir_datos_index.php">Añadir</a>
  <a href="eliminar_index.php">Eliminar</a>
  <a href="update_index.php">Actualizar</a>
  <a href="sobre_nosotros.php">Sobre nosotros</a>
  <a href="sesion_cerrar.php">Cerrar sesión</a>
  <?php $usuario = $_SESSION["usuario"]; echo "<a href='perfil.php'> $usuario </a>"; ?>
</div>

<body>
	<?php
	$usuario= $_GET["usuario"];
	if(isset($_SESSION["usuario"])){
		echo "<p>Bienvenido a Futgol $usuario </p>";
		echo "<button onclick=window.location.href='index2.php'>Continuar</button>";
	}
	else{
		header("Location: index.php");
		die();
die();
	}

	?>
</body>
</html>
<?php
	}?>