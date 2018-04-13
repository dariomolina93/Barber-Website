<html>
    <head>
        <title>Gomez The Barber</title>
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    </head>
    <body id = "container">
        <?php
		    session_start();
		    
		    if(empty($_SESSION))
		    {
		    	header("Location: home.php");
		    	exit;
		    }
		   
		   //var_dump($_SESSION);
		
		?>
			<!-- Image Logo -->
		<div>
              
              <div id="imageLogo" style="padding-left: 0px;">
                  <img class = 'imageBarber' src="../images/barberLogo.jpg" alt="Logo">
              </div>
                
        </div>
        <hr style='margin-top: 0px;'>
            
		
	    <form method="POST" action="confirmation.php">
	        <div id="mainAction" style="display:flex;">
	            
	            <div id="shipInfo" style="margin-left: auto; margin-right:60px;">
	                <h3 style="font-size: 30px;">Shipping Information</h3>
	                <table bgcolor="#333333">
	                    <tr>
	                        <td>Full Name</td>
	                        <td><input required type="text" name="fullName" placeholder="John Dow"></td>
	                    </tr>
	                    <tr>
	                        <td>Email</td>
	                        <td><input  required type="email" name="email" placeholder="email@example.com"></td>
	                    </tr>
	                    
	                    <tr>
	                        <td>Phone</td>
	                        <td><input required type="text" name="phone" placeholder="(555) 555-5555"></td>
	                    </tr>
	                    
	                    <tr>
	                        <td>Street Address</td>
	                        <td><input required type="text" name="phone" placeholder="123 Main St."></td>
	                    </tr>
	                    
	                    <tr>
	                        <td>Zip Code</td>
	                        <td><input required type="text" name="phone" placeholder="93933"></td>
	                    </tr>
	                    
	                    <tr>
	                        <td>City</td>
	                        <td><input required type="text" name="phone" placeholder="Atlanta"></td>
	                    </tr>
	                     <tr>
	                        <td>State</td>
	                        <td><input required type="text" name="phone" placeholder="CA"></td>
	                    </tr>
	                </table>
	                
	               	<div id="cardInfo">
                		<h3 style="font-size: 30px; margin-top: 33px;">Card Information</h3>
                		
                		
                		<table bgcolor="#333333">
	                    <tr>
	                        <td>Card Number</td>
	                        <td><input required type="text" name="cardNumber" placeholder="1234 5678 1234 1234"></td>
	                    </tr>
	                    <tr>
	                        <td>Date</td>
	                        <td><input  required type="text" name="mm/yy" placeholder="mm/yy"></td>
	                    </tr>
	                    
	                    <tr>
	                        <td>Cvv</td>
	                        <td><input  required type="text" name="cvv" placeholder="cvv"></td>
	                    </tr>
	                    
	                    <tr>
	                        <td>Zip Code</td>
	                        <td><input  required type="text" name="zipCodeCard" placeholder="zip code"></td>
	                    </tr>
	                </table>
                	</div>
	                
	            </div>
                <div id="orderDetails" style="margin-right: auto;">
                	<h3 style="font-size: 30px;">Order Details</h3>
                	
                	<?php
                	for($i = 0; $i < $_SESSION['orders']; $i++)
	               {
	                   echo"
	                   <div style='display:flex; background-color:333333; border: 1px solid black;'>
	                        <div>
	                            
	                            <h4 class='accomodateMargin' style='color: white;'> ".$_SESSION[$i.'a']["quantity"]."  x  </h4>
	                            <input type='hidden' name='quantity".$i."' value='".$_SESSION[$i.'a']["quantity"]."'/>
	                            
	                        </div>
	                        
	                        <div>
	                            <input type='hidden' name='name".$i."' value = '". $_SESSION[$i.'a']["name"]."'>";
	                            
	                            if(!empty($_SESSION[$i.'a']["size"]))
	                                echo "<h4 class = 'accomodateMargin' style='color: white;'>". $_SESSION[$i.'a']["name"]."(".$_SESSION[$i.'a']["size"].")</h4>";
	                            
	                            else 
	                                echo "<h4 class = 'accomodateMargin' style='color: white;'>". $_SESSION[$i.'a']["name"]."</h4>";
	                            
	                         
	                         //number_format((float)$_SESSION[$i.'a']["price"], 2, '.', '')   
	                    echo"
	                        </div>
	                        
	                        <div>
	                            <h4 class = 'accomodateMargin' style='color: white; margin-left:auto;'>$". number_format(((float)$_SESSION[$i.'a']["price"] * (float)$_SESSION[$i.'a']["quantity"]), 2, '.', '') ."</h4>
	                            <input type='hidden' name='price".$i."' value = '". $_SESSION[$i.'a']["price"]."'>
	                            
	                        </div>
	         
	                   </div>
	                   ";
	                   
	               }
	               
	                echo"
	                	<hr>
	                	<div style='display:flex;'>
	                		<h4 class = 'accomodateMargin'>Subtotal</h4>
	                		<h4 class = 'accomodateMargin' style='margin-left: auto;'>$".$_SESSION["totalPrice"]."</h4>
	                	</div>
	                	<div style='display:flex;'>
	                		<h4 class = 'accomodateMargin'>Shipping</h4>
	                		<h4 class = 'accomodateMargin' style='margin-left: auto;'>$5.00</h4>
	                	</div>
	                	<div style='display:flex;'>
	                		<h4 class = 'accomodateMargin'>Tax</h4>
	                		<h4 class = 'accomodateMargin' style='margin-left: auto;'>$0.00</h4>
	                	</div>
	                	<hr>";
	                	
	                	$x = (float)$_SESSION["totalPrice"];
	                	$x += 5;
	                	$x = number_format((float)$x, 2, '.', '');
	                	
	                	echo"
	                	<div style='display:flex; margin-top: -8px;'>
	                		<h3>Total</h3>
	                		<h3 style='margin-left: auto;'>$".$x."</h3>
	                	</div>
	                	
	                	<textarea style='margin: 0px; width: 224px; height: 52px;' name='textAreaComment'></textarea>
	                	
	                	<input class='placeOrder' type='submit' value='Place Order'>
	                   ";
            		
                	
                	
                	?>
    
                </div>	            
	        </div>
	        
	    </form>
        
    </body>
		
</html>