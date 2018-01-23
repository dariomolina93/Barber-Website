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
                                    <button  type=\"button\" id='button".$i."' onclick=\"displayModal('button".$i."');\">".$arrivals[$i]["price"]."</button>
                                </div>
                              
                              <!-- end of inner product container -->
                            </div>";
                            
                            echo "
                            
                            
                            <!-- The Modal -->
                            <div id=\"modal".$i."\" class=\"modal\">
                            
                              <!-- Modal content -->
                              <!-- Main container -->
                              <div style=\"display: flex;\" class=\"modal-content\">
                                    
                                    <!-- Left side (description) -->
                                    <div style='width:50%;'>
                                        <h2 class = 'nameTitle'>".$arrivals[$i]["name"]."</h2>
                                    
                                        <div>$".$arrivals[$i]['price']."</div>
                                    </div>
                                    
                                    <!-- Image -->
                                    <div style='width:50%;'>
                                        <img class=\"productImage\" src=\"".$arrivals[$i]["picture"]."\">
                                    
                                    </div>
    
                                   
                              <!-- End of div modal container -->
                              </div>
                        
                            
                            </div>";
                            
                        }
                        
                    ?>
                    
                </div>
            </div>
            
        <!-- End of div container -->
        </div>
        
        <script src="../js/javascript.js" type="text/javascript"></script>
        
        <script>
                var modals = [];
                var buttons = [];
                
                function displayModal(buttonId)
                {
                    
                    var i;
                    
                    for(i = 0; i < 4; i++)
                    {
                        if(buttons[i].id === buttonId)
                        {
                            modals[i].style.display = "block";
                        }
                    }
                };


        document.addEventListener("DOMContentLoaded", function(event) { 
 
            
                var i;
                
                for(i = 0; i< 4; i++)
                {
                    modals[i] = document.getElementById("modal"+i)
                    buttons[i] = document.getElementById("button"+i)//.addEventListener ("click", displayModal("button"+i), false);
                }
                
            console.log("buttons[0]=" +buttons[0])
                
                
                 /*
                // When the user clicks the button, open the modal 
                btn.onclick = function()
                {
                modal.style.display = "block";
                }
                */
                
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event)
                {
                    for(i = 0; i < 4; i++)
                        {
                            if (event.target == modals[i])
                            {
                                modals[i].style.display = "none";
                            }
                        }
                }
            
        });
        
            
</script>
        
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