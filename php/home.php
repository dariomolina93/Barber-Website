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
                                    <button id='button".$i."' onclick=\"displayModal('button".$i."')\">".$arrivals[$i]["price"]."</button>
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
                                    <div>
                                        <h2>".$arrivals[$i]["name"]."</h2>
                                    
                                    </div>
                                    
                                    <!-- Image -->
                                    <div>
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
        
        <script type="text/javascript">
        
        document.addEventListener("DOMContentLoaded", function(event) { 
 
                        /*
                // Get the modal
                var modal = document.getElementById(modals);
                        
                // Get the button that opens the modal
                var btn = document.getElementById(buttons);
                */
                
                var modals = [];
                var buttons = [];
                
                var i;
                
                for(i = 0; i< 4; i++)
                {
                    modals[i] = document.getElementById("modal"+i)
                    buttons[i] = document.getElementById("button"+i)
                    
                    console.log("modals[i]=" +modals[i])
                    console.log("buttons[i]=" +buttons[i])
                    
                }
                
                console.log("after first for loop")
                console.log("i= " + i)
                console.log("modals[i]=" +modals[i])
                console.log("modals[i]=" +modals[3])
                console.log("buttons[i]=" +buttons[3])
    
                        
                
                /*
                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];
                
                span.onclick = function() 
                {
                modal.style.display = "none";
                }
                */ 
                
                
                for(i= 0; i< 4; i++)
                {
                    console.log("Inside second for loop")   
                    console.log("i= " + i)
                    console.log("modals[i]=" +modals[i])
                    
                    buttons[i].onclick = function()
                    {
                        console.log("modals[i]=" +modals[i])
                        console.log("buttons[i]=" +buttons[i])
                        console.log("i= " + i)
                        modals[i].style.display = "block";
                    }
                }
                
                
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
        
        /*
                        
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
                }
        */
            
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