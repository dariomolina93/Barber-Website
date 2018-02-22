<?php
    session_start();
    include "databaseConnection.php";
    $conn = getDatabaseConnection();
    
    //var_dump($_POST);
    
    if($_POST["category"] == "count")
    {
    	//echo"inside if";
    	getProductQuantity();
    }	
    else
    {
    	//echo"inside else";
    	retrieveProducts();
    }


	function getProductQuantity()
	{
		global $conn;
		$query = "select count(id) as count from Products";
	    
	    $statement = $conn->prepare($query);
			
		$statement->execute();  
			
		$row = $statement -> fetch();
	
		$array[0] = array("products" => $row["count"]);
		
		header('Content-Type: application/json');
		echo json_encode($array);
	}
	
	function retrieveProducts()
	{
		global $conn;
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
	}
?>