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
	<form action="añadir_datos_jugadores2.php" method="get">
<div>
<h3>Introduce los siguientes datos para añadir a jugadores:</h3>
<p>Introduce el nombre y apellido: <input type="text" name="nombre"></p>
<p>Introduce el dorsal: <input type="number" name="dorsal"></p>
<p>Introduce el equipo: 	<select name="equipo">
		<?php
		$conexion = mysqli_connect("localhost","usuario","Usuario_2019","futgol");
		mysqli_select_db($conexion,"futgol") or die ("No se puede seleccionar la BD");
		$resultado = mysqli_query($conexion, "select nombre_equipo from equipos");
		if (mysqli_connect_errno()) {
			printf("<p>Conexión fallida: %s</p>", mysqli_connect_error());
			exit();
		}
		$numr = mysqli_num_rows($resultado);
			if($numr > 0){
				for ($i = 0; $i < $numr; $i++){
					$fila = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
					echo "<option>".$fila["nombre_equipo"]."</option>";
				}
			}
		?>
	</select></p>
<p>Introduce el país: 	<select name="pais">
		<?php
		
		$conexion2 = mysqli_connect("localhost","usuario","Usuario_2019","futgol");
		mysqli_select_db($conexion2,"futgol") or die ("No se puede seleccionar la BD");
		$resultado2 = mysqli_query($conexion2, "select nombre_pais from pais");
		if (mysqli_connect_errno()) {
			printf("<p>Conexión fallida: %s</p>", mysqli_connect_error());
			exit();
		}
		$numr2 = mysqli_num_rows($resultado2);
			if($numr2 > 0){
				for ($i = 0; $i < $numr; $i++){
					$fila2 = mysqli_fetch_array($resultado2,MYSQLI_ASSOC);
					echo "<option>".$fila2["nombre_pais"]."</option>";
				}
			}
		?>
	</select></p>
<p>Introduce la posición: <select name="posicion">
		<?php
		
		$conexion3 = mysqli_connect("localhost","usuario","Usuario_2019","futgol");
		mysqli_select_db($conexion3,"futgol") or die ("No se puede seleccionar la BD");
		$resultado3 = mysqli_query($conexion3, "select nombre_posicion from posicion");
		if (mysqli_connect_errno()) {
			printf("<p>Conexión fallida: %s</p>", mysqli_connect_error());
			exit();
		}
		$numr3 = mysqli_num_rows($resultado3);
			if($numr3 > 0){
				for ($i = 0; $i < $numr; $i++){
					$fila3 = mysqli_fetch_array($resultado3,MYSQLI_ASSOC);
					echo "<option>".$fila3["nombre_posicion"]."</option>";
				}
			}
		?>
	</select></p>
<p>Introduce la cantidad de goles metidos: <input type="number" name="goles"></p>
<p>Introduce la cantidad de goles encajados: <input type="number" name="goles_encajados"></p>
<input type="submit" name="Enviar">
</form>
</div>
</body>
</html>
<?php
	}?>