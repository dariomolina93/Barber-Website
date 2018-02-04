<?php
    session_start();
    include "databaseConnection.php";
    $conn = getDatabaseConnection();
    
    $query = "select * from Products where category='".$_POST['category']."' ";
    
    $statement = $conn->prepare($query);
		
	$statement->execute();  
		 
	$i = 0;
	$array;
	while($row = $statement -> fetch())
		{
			  $array[$i] = array("name" => $row["name"], "picture"=> $row["picture"], "quantity"=>$row["quantity"],"price"=>$row["price"]);
			  $i++;
		}
		
	header('Content-Type: application/json');
	echo json_encode($array);
?>