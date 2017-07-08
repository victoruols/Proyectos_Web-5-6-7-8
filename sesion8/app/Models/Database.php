<?php 
/**
* Database
*/
class Database
{
	private $mysqli;
	private $queryResult;

	//Función para conectar en base de datos
	public function connect(){
		$connect = mysqli_connect("localhost", "root", "root", "geoip");
		
		if (!$connect) {
		    throw new Exception("Error connecting to the database", 1);
		$this->mysqli = $connect;
		}
	}

	//Función para crear la consulta	
	public function getQuery($Ip)
	{
		$query = "SELECT cities_locations.city_name,cities_locations.country_name, cities_blocks_ip4.latitude, cities_blocks_ip4.longitude , cities_blocks_ip4.postal_code 
	from cities_locations, cities_blocks_ip4 
	where network LIKE  '$Ip%' limit 10";

		return $query;
	}

	public function executeQuery($query)
	{
		$this->queryResult = mysqli_query($this->mysqli, $query);

	}

	public function getQueryResult()
	{
		return $this->queryResult;	
	}

}