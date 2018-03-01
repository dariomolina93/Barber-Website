<html>
    <head>
        <title>Gomez The Barber</title>
        <link rel="stylesheet" href="../css/style.css">
        
    </head>
    
    <?php
    
		session_start();
        
    
        
        if(!empty($_POST))
        {
            echo "inside else post empty?: ". empty($_POST);
            var_dump($_POST);
            echo"right after var_dump post <br><br>";
            if (!isset($_SESSION['orders']))
            { 
                $_SESSION["orders"] = 0;
            }
        
            $string = strval($_SESSION["orders"])."a";
            $_SESSION[$string]= array("name"=>$_POST["nameProduct"], "price" => $_POST["price"], "size"=>$_POST["size"], "quantity"=>$_POST["quantity"] );
            $_SESSION["orders"]++;
            
            header("Location: cart.php");
            exit();
            
        }
        
        if($_SESSION["orders"] == 0)
        {
            header("Location: home.php");
            exit();
        }
        
        
        var_dump($_SESSION);
        
        echo "order items: {$_SESSION['orders']} <br><br>";
        
        
        
	?>
    <body>
        <div id="container">
            
            <!-- Image div -->
            <div style='display:flex; margin-top: -90px;'>
                
                <div id="imageLogo">
                    <img class = 'imageBarber' src="../images/barberLogo.jpg" alt="Logo">
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
                    <li><a href="./about.php">About</a></li>
                    <li><a href="./contact.php">Contact</a></li>
                </ul>
            </div>
            <hr>
            
           <?php
           
           
           echo "
                    <table border='1' bordercolor='red' align='center'>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Size</th>
                        </tr>
                ";
            for($i = 0; $i < $_SESSION['orders']; $i++)
            {
                echo "
                    <tr>
                        <td>". $_SESSION[$i.'a']["name"]."</td>
                        <td>". $_SESSION[$i.'a']["price"]."</td>
                        <td>". $_SESSION[$i.'a']["quantity"]."</td>
                        <td>". $_SESSION[$i.'a']["size"]."</td>
                    </tr>
                ";
            }
            
            echo "</table>";
           
           ?>
          
        </div>
        
    </body>
</html>