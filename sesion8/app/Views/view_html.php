<!DOCTYPE html>
<html>
<head>
	<title>Entregable Sesión 8</title>
	<meta charset="UTF-8" />
</head>

<body>
	<h1>Buscador de ciudad a través de la IP</h1>
	<form name="buscador_s8" method="post" action="index.php">

		<p><b>Introduce una IP y pulse Search para realizar la búsqueda del país:</b></p>
		<!--Casillas !-->
		<p>IP: <input type="text" name="ip" value="100.12.137.0">
		NETMASK: <input type="text" name="netmask" value="255.255.255.0">
		
		<!--Botón para iniciar la búsqueda!-->
		<input type="submit" value="Search"/></p>

		<?php
		require_once("app/Controller/controller.php");

		
		$datos = resultadoConsulta();
		echo var_dump($datos);

		/*

		$result_info = $result_info . "Nombre ciudad: " . $row["city_name"] . " // Nombre país: " . $row["country_name"] . " //  Latitude: " . $row["latitude"] . " // Longitude: " . $row["longitude"] . " // Código_postal: " . $row["postal_code"] . "\n"

		
		
		
		echo ("Net: " . $datos["network"] . "<br>city_name: " . $datos["city_name"] . " <br> country_name: " . $datos["country_name"] . " <br>  latitude: " . $datos["latitude"] . " <br> longitude: " . $datos["longitude"] . " <br> postal_code: " . $datos["postal_code"]."<br/>");
		
		*/

		?>
	</form>

</body>
</html>