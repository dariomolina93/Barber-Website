<?php
    session_start();
    include "databaseConnection.php";
    $conn = getDatabaseConnection();
    
    //var_dump($_POST);
    
    if($_POST["category"] == "count")
    {
    	//echo"inside if";
    	getAllProductQuantity();
    }	
    else if($_POST["category"] == "quantity")
    {
    	getProductQuantity();
    }
    else if($_POST["category"] == "removeProduct")
    {
    	removeProductSession();
    }
    else
    {
    	//echo"inside else";
    	retrieveProducts();
    }

	function removeProductSession()
	{
		unset($_SESSION[$_POST["index"]."a"]);
		$_SESSION["orders"]--;
		header('Content-Type: application/json');
		echo json_encode("{'session_size':".$_SESSION["orders"]."}");
		
	}

	function getProductQuantity()
	{
		global $conn;
		$query = "select quantity, price from Products where name='".$_POST["productName"]."'";
	    
	    $statement = $conn->prepare($query);
			
		$statement->execute();  
			
		$row = $statement -> fetch();
	
		$array = array("quantity" => $row["quantity"], "price" => $row["price"], "totalItems" => $_SESSION["orders"]);
		
		header('Content-Type: application/json');
		echo json_encode($array);
	}
	
	function getAllProductQuantity()
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
				  $array[$i] = array("name" => $row["name"], "picture"=> $row["picture"], "quantity"=>$row["quantity"],"price"=>$row["price"],"sizeApplicable"=>$row["sizeApplicable"]);
				  $i++;
			}
			
		header('Content-Type: application/json');
		echo json_encode($array);
	}
?>