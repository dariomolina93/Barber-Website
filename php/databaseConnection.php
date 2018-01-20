<?php

function getDatabaseConnection()
{
    
    $dbHost = "localhost";
    $dbPort = 3306;
	$dbUsername = "trendmetric";
	$dbName = "Barber_Products";

	$dbConn = new PDO("mysql:host=$dbHost;dbname=$dbName;port=$dbPort", $dbUsername);
	$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    return $dbConn;  
}
?>