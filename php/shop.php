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
                    <li><a href="#">Shop</a></li>
                    <li><a href="./shop.php">About</a></li>
                    <li><a href="./shop.php">Contact</a></li>
                </ul>
            </div>
            
            <hr>
            
            <!-- catalog -->
            <div style="display: flex;">
                
                <!-- choices -->
                <div style="width: 25%;">
                    <?php displayCategories(); ?>
                </div>
                
                <div style="width: 75%;">
                    
                </div>
                
                
            </div>
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
        <script>
            
            $.ajax({
              url :  "retrieveProducts.php",
              type: 'POST',
              data: rawData,
              contentType: false,
              processData: false,
              success: function(data) {
                console.log(data);
                displaySongInfo(data['artists'],data['title'], data['recommendation_list']);
              },    
              error: function(data) {
                console.log("There was an error with ajax call!");
                
              }
            });	 
            
        </script>
    </body>
</html>

<?php
 
 function displayCategories()
 {
    global $dbConn;
		    
	 $query= "select distinct category from Products";
	
	$statement = $dbConn->prepare($query);
		
    $statement->execute();  
		 
	$i = 0;
	
	while($row = $statement -> fetch())
	{
	    echo "
	    <a href='#'>
            <div class='shop-categories'>
	            ".$row["category"]."
	        </div>
        </a>";
	    
	    
	}
	
 }
 
?>
    