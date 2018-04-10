<html>
    <head>
        <title>Gomez The Barber</title>
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    </head>
    <body id = "container">
        <?php
		    session_start();
		   
		
		?>
		
	    <form method="POST" action="confirmation.php">
	        <div id="mainAction" style="display:flex;">
	            
	            <div>
	                <h3>Shipping Information</h3>
	                <table>
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
	                        <td><input required type="tel" name="phone" value="(555) 555-5555"></td>
	                    </tr>
	                </table>
	                
	            </div>
                <div></div>	            
	        </div>
	        
	    </form>
        
    </body>
		
</html>