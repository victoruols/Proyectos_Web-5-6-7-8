<?php 
require __DIR__ . "/Database.php";
/**
* GeoIp
*/
class GeoIp 
{
	public function GetCountryAndCityInfoByIP($Ip)
	{
		$db = $this->getConnection('localhost','root','root','GeoIP');
		if (!$db) {
			return "Error al buscar la ciudad";
		}
		$query = $this->getQuery($Ip); 
		$db->executeQuery($query);
		

		$result = $db->getQueryResult();
		$result_info="";
			while ($row = $result->fetch_assoc()){
					$result_info = $result_info . "Nombre ciudad: " . $row["city_name"] . " // Nombre país: " . $row["country_name"] . " //  Latitude: " . $row["latitude"] . " // Longitude: " . $row["longitude"] . " // Código_postal: " . $row["postal_code"] . "\n";
					//echo var_dump($row);



			}

			/*foreach ($result as $row) {
				
				$result_info = $result_info . "Nombre ciudad: " . $row["city_name"] . " || Nombre país: " . $row["country_name"] . " ||  Latitude: " . $row["latitude"] . " || Longitude: " . $row["longitude"] . " || Código_postal: " . $row["postal_code"] . "\n";



			}
		*/
		return  $result_info;

	}

	private function getQuery($Ip)
	{
		
		$query = "SELECT cities_locations.city_name,cities_locations.country_name, cities_blocks_ip4.latitude, cities_blocks_ip4.longitude , cities_blocks_ip4.postal_code 
	from cities_locations, cities_blocks_ip4 
	where network LIKE  '$Ip%' limit 50";



		return $query;
	}
	private function getConnection($host, $user, $password, $database)	
	{
		try {
		  $db = new Database($host, $user, $password, $database);
		} catch(Exception $e) {
		  return false;
		}
		return $db;
	}
}


