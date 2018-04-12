<html>
    <head>
        <title>Gomez The Barber</title>
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    </head>
    <body id = "container">
        <?php
		    session_start();
		   
		   var_dump($_POST);
		
		?>
		
	    <form method="POST" action="confirmation.php">
	        <div id="mainAction" style="display:flex;">
	            
	            <div id="shipInfo" style="margin-left: auto;">
	                <h3>Shipping Information</h3>
	                <table bgcolor="#333333">
	                    <tr>
	                        <td>Full Name</td>
	                        <td><input required type="text" name="fullName" value="John Dow"></td>
	                    </tr>
	                    <tr>
	                        <td>Email</td>
	                        <td><input  required type="email" name="email" value="email@example.com"></td>
	                    </tr>
	                    
	                    <tr>
	                        <td>Phone</td>
	                        <td><input required type="text" name="phone" value="(555) 555-5555"></td>
	                    </tr>
	                    
	                    <tr>
	                        <td>Street Address</td>
	                        <td><input required type="text" name="phone" value="(555) 555-5555"></td>
	                    </tr>
	                    
	                    <tr>
	                        <td>Zip Code</td>
	                        <td><input required type="text" name="phone" value="(555) 555-5555"></td>
	                    </tr>
	                    
	                    <tr>
	                        <td>City</td>
	                        <td><input required type="text" name="phone" value="(555) 555-5555"></td>
	                    </tr>
	                     <tr>
	                        <td>State</td>
	                        <td><input required type="text" name="phone" value="(555) 555-5555"></td>
	                    </tr>
	                </table>
	                
	               	<div id="cardInfo">
                		<h3>Card Information</h3>
                		
                		
                		<table bgcolor="#333333">
	                    <tr>
	                        <td>Card Number</td>
	                        <td><input required type="text" name="cardNumber" value="1234 5678 1234 1234"></td>
	                    </tr>
	                    <tr>
	                        <td>Date</td>
	                        <td><input  required type="text" name="mm/yy" value="mm/yy"></td>
	                    </tr>
	                    
	                    <tr>
	                        <td>CVV</td>
	                        <td><input  required type="text" name="cvv" value="cvv"></td>
	                    </tr>
	                    
	                    <tr>
	                        <td>Zip Code</td>
	                        <td><input  required type="text" name="zipCodeCard" value="zip code"></td>
	                    </tr>
	                </table>
                	</div>
	                
	            </div>
                <div id="orderDetails" style="margin-right: auto;">
                	<h3>Order details</h3>
                	
                	
                </div>	            
	        </div>
	        
	    </form>
        
    </body>
		
</html>