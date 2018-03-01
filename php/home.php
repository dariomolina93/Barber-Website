<html>
    <head>
        <title>Gomez The Barber</title>
        <link rel="stylesheet" href="../css/style.css">
          <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        
    </head>
    
    <?php
		session_start();
		include "databaseConnection.php";
        $dbConn = getDatabaseConnection();
        
        $arrivals = getNewArrivals();
	?>
    <body>
        <div id="cotainer">
            
            <!-- Image div -->
            <div style='display:flex;'>
                
                <div id="imageLogo">
                    <img class = 'imageBarber' src="../images/barberLogo.jpg" alt="Logo">
                </div>
                
                <div style= "text-align:right;">
                    
                    <a href="cart.php">
                        <img style="padding-right: 40px;" title="checkout" alt="checkout" src="http://cdn.mysitemyway.com/icons-watermarks/flat-circle-white-on-black/bfa/bfa_shopping-cart/bfa_shopping-cart_flat-circle-white-on-black_512x512.png" width="80" height="80" />
                    </a>
                   
                </div>
                
            </div>
            
            <!-- Menu -->
            <div id="categories">
                <ul style="margin-top: 5px;">
                    <li><a id="pic1" href="./home.php">Home</a></li>
                    <li><a href="./shop.php">Shop</a></li>
                    <li><a href="./about.php">About</a></li>
                    <li><a href="./contact.php">Contact</a></li>
                </ul>
            </div>
            <hr>
            
            <!-- Slideshow -->
            <div class="slideshow-container" style="margin-top: 40px;">
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
                <h2 style="margin-top: 75px;">New Arrivals</h2>
                
                <!-- main container -->
                <div class="displayHorizontal">
                    
                    <!-- inner product container -->
                    
                    <?php
   
                        for($i = 0; $i < count($arrivals); $i++)
                        {
                            echo "
                            
                                <div id='button".$i."' class = \"innerContainer\"  onclick=\"displayModal('button".$i."');\">
                                    <div>
                                        <img class=\"productImage\" src=\"". $arrivals[$i]["picture"]."\">
                                    </div>
                                    
                                    <div class = \"displayVertical\">
                                        <div class = \"nameOfProduct\">". $arrivals[$i]["name"]."</div>
                                        <div class = 'nameOfProduct' style ='margin-top:5px;' >$".$arrivals[$i]["price"]."</div>";
                                        
                                    echo"</div>
                                  
                                  <!-- end of inner product container -->
                                </div>
                                
                            ";
                                
                            
                            echo "
                            
                            
                            <!-- The Modal -->
                            <div id=\"modal".$i."\" class=\"modal\">
                            
                              <!-- Modal content -->
                              <!-- Main container -->
                              <div class=\"modal-content\">
                                  <span id='close".$i."' class='close' onclick=\"closeModal('close".$i."');\">&times;</span>
                                  <br>
                                  <br>
                                  <div style=\"display: flex;\">
                                        
                                        <!-- Left side (description) -->
                                        <div style='width:50%;'>
                                            
                                        <h2 class = 'nameTitle'>".$arrivals[$i]["name"]."</h2>
                                                
                                        <hr style='width: 90%;'>
                                        <form method='POST' action='cart.php'>
                                                <div class='price'>$".$arrivals[$i]['price']."</div>
                                                <input type='hidden' name='nameProduct' value='".$arrivals[$i]['name']."'>
                                                <input type='hidden' name='price' value='".$arrivals[$i]['price']."'>
                                            
                                            
                                                <div style='margin-top: 10px;'>
                                                    <span style='font-size: 20px;'>Quantity</span>
                                                    
                                                    <input type='button' value='-' class='qtyminus' field='quantity' />
                                                    <input  readonly type='text' name='quantity' value='0' class='qty' />
                                                    <input type='button' value='+' class='qtyplus' field='quantity' />
                                                </div>
                                                
                                                <select name='size'>
                                                <option value='small'>Small</option>
                                                <option value='medium'>Medium</option>
                                                <option value='large'>Large</option>
                                                <option value='xl'>XL</option>
                                              </select>
                                                
                                                <input type='submit' value='Add to Cart'>
                                            </form>
                                        </div>
                                        
                                        <!-- Image -->
                                        <div style='width:50%;'>
                                            <img class=\"productImage\" src=\"".$arrivals[$i]["picture"]."\">
                                        </div>
                                       
                                  <!-- End of div modal container -->
                                  </div>
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
            
           
                
            <footer style="background-color: #222222; margin-top: 40px;">
                <div style="display: flex;">
                    
                    <div style="width: 50%;">
                        <a class='appointment' style= 'float: right; margin-top: 7px;'href="https://shops.getsquire.com/book/the-barbers-inc-south-san-jose-san-jose/barber/gomez-the-barber">Make an appointment!</a>
                    </div>
                   
                    <div style="margin: auto; width: 50%; padding-left: 40px;">
                        <a target="_blank" href="[full link to your Twitter]">
                        <img title="Twitter" alt="Twitter" src="https://socialmediawidgets.files.wordpress.com/2014/03/01_twitter.png" width="30" height="30" />
                        </a>
                        <a target="_blank" href="[full link to your youtube page]">
                        <img title="Youtube" alt="Youtube" src="https://socialmediawidgets.files.wordpress.com/2014/03/youtube.png" width="30" height="30" />
                        </a>
                        
                        <a target="_blank" href="https://www.instagram.com/gomez_the_barber/">
                        <img title="Instagram" alt="RSS" src="https://socialmediawidgets.files.wordpress.com/2014/03/10_instagram.png" width="30" height="30" />
                        </a>
                        
                        <a target="_blank" href="https://www.facebook.com/alex.gomez.98">
                        <img title="Facebook" alt="Facebook" src="https://socialmediawidgets.files.wordpress.com/2014/03/facebook.png" width="30" height="30" />
                        </a>
                        
                    </div>
                         
            </footer>
            
        <!-- End of div container -->
        </div>
        
        
        <script src="../js/javascript.js" type="text/javascript"></script>
        
        <script>
                var modals = [];
                var buttons = [];
                var closeButton = [];
                
                function closeModal(closeId)
                {
                    var i;
                    
                    for(i = 0; i < 4; i++)
                    {
                        if(closeButton[i].id === closeId)
                        {
                            modals[i].style.display = "none";
                        }
                    }
                }
                
                
                
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
                    closeButton[i] = document.getElementById("close"+i)
                }
                
            console.log("buttons[0]=" +buttons[0])
                
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
        
        
        
    jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
});

        
            
</script>
        
    </body>
</html>

<?php

	function getNewArrivals()
	{
		///echo"inside validate user function";
		global $dbConn;
		    
		$query = "select * from Products order by category limit 4;";
	  
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