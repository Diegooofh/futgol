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
  <?php $usuario = $_SESSION["usuario"]; echo "<a href='perfil.php'> $usuario </a>"; ?>
</div>

<body>
<?php
	$conexion = mysqli_connect("localhost","usuario","Usuario_2019","futgol");
	mysqli_select_db($conexion,"futgol") or die ("No se puede seleccionar la BD");
	$resultado = mysqli_query($conexion, "select * from equipos");
	if (mysqli_connect_errno()) {
	    printf("<p>Conexión fallida: %s</p>", mysqli_connect_error());
	    exit();
	}
	$numr = mysqli_num_rows($resultado);
?>
	<table border="1px" style="background-color:black">
		<tr>
			<td>
				Nombre Equipo
			</td>
		</tr>
		<?php
			if($numr > 0){
				for ($i = 0; $i < $numr; $i++){
					echo "<tr>";
					$fila = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
					echo "<td>".$fila["nombre_equipo"]."</td>";
					echo "</tr>";
				}
			}
		?>

	</table>	
	<button onclick=window.location.href='index2.php'>Volver al inicio</button>
</body>
</html>
<?php
	}?>