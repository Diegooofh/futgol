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
<?php
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
$nombre = $fila["nombre"];
$apellido = $fila["apellido"];

$usuario = $_SESSION["usuario"];
echo "<p>Este es el perfil del usuario $usuario.</p>";
echo "<p>Tu nombre es $nombre</p>";
echo "<p>Y el apellido es $apellido</p>";
?>
<button onclick=window.location.href='cambiar_login.php'>Cambiar nombre de usuario</button>
<br>
<button onclick=window.location.href='cambiar_contraseña.php'>Cambiar contraseña</button>
<br>
<button onclick=window.location.href='cambiar_nombre.php'>Cambiar nombre</button>
<br>
<button onclick=window.location.href='cambiar_apellido.php'>Cambiar apellido</button>
<br>
<button onclick=window.location.href='sesion_cerrar.php'>Cerrar sesión</button>
</body>
</html>
<?php
    }
    ?>