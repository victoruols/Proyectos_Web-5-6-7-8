<?php 
/**
* Database
*/
class Database
{
	private $mysqli;
	private $queryResult;

	public function __construct($host, $user, $password, $database)
	{
		$connect = mysqli_connect($host, $user, $password, $database);
		if (!$connect) {
		    throw new Exception("Error connecting to the database", 1);
		}
		$this->mysqli = $connect;
	}

	public function executeQuery($query)
	{
		$this->queryResult = mysqli_query($this->mysqli, $query);

	}

	public function getQueryResult()
	{
		//return mysqli_fetch_assoc($this->queryResult);
		return $this->queryResult;	
	}

}