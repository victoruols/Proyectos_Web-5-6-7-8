<?php 
require __DIR__ . "/GeoIp.php";
$geoIp = new GeoIp();
$IP = $argv[1];
echo $IP;
$info = $geoIp->GetCountryAndCityInfoByIP($IP);
var_dump($info);