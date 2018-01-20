<html>
    <head>
        <title>Gomez The Barber</title>
        <link rel="stylesheet" href="../css/style.css">
        
    </head>
    
    <?php
		//session_start();
		include "databaseConnection.php";
        $dbConn = getDatabaseConnection();
        
        $arrivals = getNewArrivals();
	?>
    <body>
        
        <div id="cointer">
            
            <!-- Image div -->
            <div id="imageLogo">
                <img src="../images/barberLogo.jpg" alt="Logo" height="250" width="700">
            </div>
            
            <!-- Menu -->
            <div id="categories">
                <ul>
                    <li><a id="pic1" href="./home.php">Home</a></li>
                    <li><a href="./shop.php">Shop</a></li>
                    <li><a href="./shop.php">About</a></li>
                    <li><a href="./shop.php">Contact</a></li>
                </ul>
            </div>
            
            <!-- Slideshow -->
            <div class="slideshow-container">
                    <div class="mySlides fade">
                      <img class = "slideImage" src="../images/pic4.jpg" style="width:100%" alt="image not found">
                    </div>
                    
                    <div class="mySlides fade">
                      <img class = "slideImage" src="../images/pic2.jpg" style="width:100%" alt="image not found">
                    </div>
                    
                    <div class="mySlides fade">
                      <img class = "slideImage" src="../images/pic3.jpg" style="width:100%" alt="image not found">
                    </div>
            </div>
            
            <!-- New Arrivals -->
            <div id="newArrivals">
                <h2>New Arrivals</h2>
                
                <!-- main container -->
                <div class="displayHorizontal">
                    
                    <!-- inner product container -->
                    
                    <?php
   
                        for($i = 0; $i < count($arrivals); $i++)
                        {
                            echo "<div class = \"innerContainer\">
                                <div>
                                    <img class=\"productImage\" src=\"". $arrivals[$i]["picture"]."\">
                                </div>
                                
                                <div class = \"displayVertical\">
                                    <div class = \"nameOfProduct\">". $arrivals[$i]["name"]."</div>
                                    <button>".$arrivals[$i]["price"]."</button>
                                </div>
                              
                              <!-- end of inner product container -->
                            </div>";
                        }
                        
                    ?>
                    
                </div>
            </div>
            
        <!-- End of div container -->
        </div>
        
        <script src="../js/javascript.js" type="text/javascript"></script>
    </body>
</html>

<?php

	function getNewArrivals()
	{
		///echo"inside validate user function";
		global $dbConn;
		    
		$query = "select * from Products";
	  
		$statement = $dbConn->prepare($query);
		
		 $statement->execute();  
		 
		$i = 0;
		$array;
		while($row = $statement -> fetch())
			{
			    $array[$i] = array("name" => $row["name"], "picture"=> $row["picture"], "quantity"=>$row["quantity"],"price"=>$row["price"]);
			    $i++;
			}
		return $array;
	}

?>