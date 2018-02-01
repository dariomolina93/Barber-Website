<html>
    <head>
        <title>Gomez The Barber</title>
        <link rel="stylesheet" href="../css/style.css">
        
    </head>
    
    <?php
		session_start();
		include "databaseConnection.php";
        $dbConn = getDatabaseConnection();
        
        $arrivals = getNewArrivals();
	?>
    <body>
        <div id="cointer">
            
            <!-- Image div -->
            <div style='display:flex;'>
                
                <div id="imageLogo">
                    <img src="../images/barberLogo.jpg" alt="Logo" height="250" width="700">
                </div>
                
                <div style= "text-align:right;">
                    
                    <a href="[full link to your Facebook page]">
                        <img style="padding-right: 40px;" title="checkout" alt="checkout" src="http://cdn.mysitemyway.com/icons-watermarks/flat-circle-white-on-black/bfa/bfa_shopping-cart/bfa_shopping-cart_flat-circle-white-on-black_512x512.png" width="80" height="80" />
                        </a>
                   
                </div>
                
            </div>
            
            <!-- Menu -->
            <div id="categories">
                <ul style="margin-top: 5px;">
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
                <h2 style="margin-top: 90px;">New Arrivals</h2>
                
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
                                    
                                        <div class='price'>$".$arrivals[$i]['price']."</div>
                                        
                                        <form method='POST' action='cart.php'>
                                            <div class = 'displayHorizontal'>
                                                <div>Quantity</div>
                                                <input id = 'quantity' onkeypress='return isNumberKey(event)' type='text' name='quantity' value='1'>
                                            </div>
                                            
                                            <input type='submit' value='Add to Cart'>
                                        </form>
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
            
            <h2>Upcoming Participating Events</h2>
            <div style="display: flex;">
                <div style="width:50%;">
                    <a target="_blank" href="http://www.thelifestyleexpo.com/">
                        <img style="max-width: 100%" height="400" src="https://img.evbuc.com/https%3A%2F%2Fcdn.evbuc.com%2Fimages%2F37983648%2F61837105785%2F1%2Foriginal.jpg?w=1000&rect=0%2C734%2C3000%2C1500&s=7bc9f43680f7493e03467a151ec4eccf">
                    </a>
                </div>
                
                <div style="width:50%;">
                    <a target="_blank" href="http://hairbattletour.com/">
                        <img style="max-width: 100%"  height="400"  src="http://hairbattletour.com/cms/wp-content/uploads/hbt-logo-lq.png">
                    </a>
                </div>
                
                
                
                
            </div>
            
            <hr style='margin-top: 100px;'>
                
                <div style="display: flex;">
                    <div style="text-align:center;">
                        <a target="_blank" class = "book" href="https://shops.getsquire.com/book/the-barbers-inc-south-san-jose-san-jose/barber/gomez-the-barber">
                            <img src="http://barrellibarber.com/wp-content/uploads/2017/08/Barrelli_MakeAppointmentIcon4.png" alt="not found" width="400"></a>
                    </div>
                    
                    <div style="border-left:2px solid white;height:170px; margin-left:5px;"></div>
                    
                    <div style="margin: auto;">
                        <a class="book">Check out our Inventory!</a>
                    </div>
                    
                    <div style="border-left:2px solid white;height:170px; margin-left:5px;"></div>
                    
                    <div style="margin: auto;">
                        <a target="_blank" href="[full link to your Twitter]">
                        <img title="Twitter" alt="Twitter" src="https://socialmediawidgets.files.wordpress.com/2014/03/01_twitter.png" width="35" height="35" />
                        </a>
                        <a target="_blank" href="[full link to your youtube page]">
                        <img title="Youtube" alt="Youtube" src="https://socialmediawidgets.files.wordpress.com/2014/03/youtube.png" width="35" height="35" />
                        </a>
                        
                        <a target="_blank" href="https://www.instagram.com/gomez_the_barber/">
                        <img title="Instagram" alt="RSS" src="https://socialmediawidgets.files.wordpress.com/2014/03/10_instagram.png" width="35" height="35" />
                        </a>
                        
                        <a target="_blank" href="https://www.facebook.com/alex.gomez.98">
                        <img title="Facebook" alt="Facebook" src="https://socialmediawidgets.files.wordpress.com/2014/03/facebook.png" width="35" height="35" />
                        </a>
                
                    
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
                
                function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }


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