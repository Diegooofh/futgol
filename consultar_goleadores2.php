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
  <a class="active" href="consultar_index.php">Consulta</a>
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
	$resultado = mysqli_query($conexion, "select * from jugadores where goles > 0");
	if (mysqli_connect_errno()) {
	    printf("<p>Conexión fallida: %s</p>", mysqli_connect_error());
	    exit();
	}
	$numr = mysqli_num_rows($resultado);
?>
	<?php 
	echo "<p>Hay $numr jugadores que han marcado gol<p>";
	?>
	<table border="1px" style="background-color:black">
		<tr>
			<td>
				Nombre Completo
			</td>
			<td>
				Dorsal
			</td>
			<td>
				Equipo
			</td>
			<td>
				País
			</td>
			<td>
				Posición
			</td>
			<td>
				Goles
			</td>
			<td>
				Goles Encajados
			</td>
		</tr>
		<?php
			if($numr > 0){
				for ($i = 0; $i < $numr; $i++){
					echo "<tr>";
					$fila = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
					echo "<td>".$fila["nombre_completo"]."</td>";
					echo "<td>".$fila["dorsal"]."</td>";
					echo "<td>".$fila["equipo"]."</td>";
					echo "<td>".$fila["pais"]."</td>";
					echo "<td>".$fila["posicion"]."</td>";
					echo "<td>".$fila["goles"]."</td>";
					echo "<td>".$fila["goles_encajados"]."</td>";
					echo "</tr>";
				}
			}
		?>

	</table>	
	<button onclick=window.location.href='consultar_index.php'>Volver a consultas</button>
</body>
</html>
<?php
	}?>