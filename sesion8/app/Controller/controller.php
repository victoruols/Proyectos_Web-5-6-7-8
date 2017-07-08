<?php
include("app/Models/Database.php");
//Muestra el formulario(VIEW)
require_once("app/Views/view_html.php");
include("index.php");
//Calcula la IP
include("libs/Net_IPv4.php");



	 function resultadoConsulta(){
		$connect;
		$data;
$ip = "100.12.137.0";
$netmask= "255.255.255.0";

		$net_class = new Net_IPv4();
		if ($net_class->validateNetmask($netmask) && $net_class->validateIP($ip)) {
			$validNM = $GLOBALS['Net_IPv4_Netmask_Map'];
		 	$validNM_rev = array_flip($validNM);
		        $bitmask = $validNM_rev[$netmask];
			$ip=$ip . "/"  . $bitmask;
			

			//Empieza conexión a Base de Datos(MODEL)
			$model_database = new Database();
			$connect = $model_database->connect();
			//datos= la consulta (SELECT)
			$datos = $model_database->getQuery($ip);
			//resultado= ejecución de la consulta
			$resultado = $model_database->executeQuery($datos);
			
			//DEvuelve la consulta
			$result=$model_database->getQueryResult();
			$result_info = "";
				while ($row = $result->fetch_assoc()){
							$result_info = $result_info . "Nombre ciudad: " . $row["city_name"] . " // Nombre país: " . $row["country_name"] . " //  Latitude: " . $row["latitude"] . " // Longitude: " . $row["longitude"] . " // Código_postal: " . $row["postal_code"] . "\n";
							//echo var_dump($row);

				}
			return  $result_info;
		}
	}


	

?>