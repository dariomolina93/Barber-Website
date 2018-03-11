<html>
    <head>
        <title>Gomez The Barber</title>
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    </head>
    
    <?php
    
		session_start();
        
        if(!empty($_POST))
        {
            if (!isset($_SESSION['orders']))
            { 
                $_SESSION["orders"] = 0;
            }
        
            $string = strval($_SESSION["orders"])."a";
            $_SESSION[$string]= array("name"=>$_POST["nameProduct"], "price" => $_POST["price"], "size"=>$_POST["size"], "quantity"=>$_POST["quantity"] );
            $_SESSION["orders"]++;
            
            header("Location: cart.php");
            exit;
        }
        
        if($_SESSION["orders"] == 0)
        {
            header("Location: home.php");
            exit();
        }
        
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
            <div id="orders" style='margin-top: 30px;'>
                
            <form method="POST" action="checkout.php">
               <?php
               
               for($i = 0; $i < $_SESSION['orders']; $i++)
               {
                   echo"
                   <div class='outer-container'>
                        <div style='width: 30%; margin-left:128px; margin-top: 8px;' >
                            <input type='button' value='-' class='qtyminus' field='quantity".$i."' />
                            <input  readonly type='text' name='quantity".$i."' value='1' class='qty' />
                            <input type='button' value='+' class='qtyplus' field='quantity".$i."' />
                        </div>
                        
                        <div style='width: 30%;'>
                            <h3 style='color: white;'>". $_SESSION[$i.'a']["name"]."</h3>
                            <input type='hidden' name='name".$i."' value = '". $_SESSION[$i.'a']["name"]."'>
                        </div>
                        
                        <div style=' width: 16%;'>
                            <h3 id='price".$i."' style='color: white;'>$". $_SESSION[$i.'a']["price"]."</h3>
                            <input type='hidden' name='price".$i."' value = '". $_SESSION[$i.'a']["name"]."'>
                            
                        </div>
                        <span id='close".$i."' style='margin-top: 3px;' id='close".$i."' class='close'>&times;</span>
                   </div>
                   ";
                   
               }
               
               ?>
               
                   <div id='subtotal' style='display:flex; margin-top:15px;'>
                        <div style='margin-left:290px; display:flex;'>
                            <h3 style='text-align: right;'>Subtotal  </h3>
                            <h4>(Not including shipping and taxes):</h4>
                        </div>
                        <div style='width: 20%;'>
                            <h3 id="totalCost" style='text-align: right;'><?php
                                $total = 0;
                                
                                for($i = 0; $i < $_SESSION['orders']; $i++)
                                {
                                    $total += $_SESSION[$i.'a']["price"];
                                }
                                echo "$".$total;
                            ?></h3>
                        </div>
                       
                   </div>
                   
                   <div style="display:flex;">
                       <button style='width: 200px; height: 40px; margin-left:auto;'><a href='home.php' style='color: white;'>Continue Shopping</a></button>
                       <input style="margin-right:auto; margin-left:15px;"class='submit' type="submit" value="Checkout">
                   </div>
               </form>
           </div>
          
        </div>
        
<script>
    jQuery(document).ready(function(){
        
        $("span").click(function(e) {
            
            var id= $(this).attr("id");
            console.log("index is: "+ id + "typeof" + typeof(id) )
            
            
            $.ajax({
            url :  "retrieveProducts.php",
            type: 'POST',
            data: {category: "removeProduct", index: id },
            dataType: "json",
            success: function(data) {
                location.reload();

            },
              error:function()
             {
                console.log("error getting product quantity in cart")     
             }
        })
        })
        
        
        
        
        
        
        function calculateTotal(x)
        {
            var total = 0;
            for(var i = 0; i < x; i++)
            {
                var elementText = $("#price"+i).text()
                var price = elementText.substring(1,elementText.length)
                
                console.log("price"+i+ "= " + price)
                total += parseFloat(price)
            }
            
            $("#totalCost").html("$"+total.toFixed(2))
        }
        
    // This button will increment the value
    $('.qtyplus').click(function(e){
        
        console.log("clicked plus button")
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        
        var product_name = $('input[name=name'+fieldName[fieldName.length - 1]+']').attr("value")
        $.ajax({
            url :  "retrieveProducts.php",
            type: 'POST',
            data: {category: "quantity", productName: product_name},
            dataType: "json",
            success: function(data) {
                console.log( data);
                
                var currentVal = parseFloat($('input[name='+fieldName+']').val());
        
                //console.log("current val: " + currentVal);
                // If is not undefined
                
                if (!isNaN(currentVal)) 
                {
                    
                    currentVal++;
                    
                    if( currentVal > parseFloat(data["quantity"]))
                    {
                        console.log("currentvale > quantity")
                        $('input[name='+fieldName+']').val(parseFloat(data["quantity"]));
                        $("#price"+fieldName[fieldName.length - 1]).html("$"+(parseFloat(data["quantity"]) * data["price"]).toFixed(2))
                        calculateTotal(data["totalItems"])
                    }   
                    else
                    {
                        $('input[name='+fieldName+']').val(currentVal);
                        $("#price"+fieldName[fieldName.length - 1]).html("$" +(currentVal * data["price"]).toFixed(2))
                        calculateTotal(data["totalItems"])
                    }
                }        
                else
                {
                    currentVal = 1;
                    $('input[name='+fieldName+']').val(currentVal);
                    $("#price"+fieldName[fieldName.length - 1]).html("$" + (currentVal * data["price"]).toFixed(2))
                    calculateTotal(data["totalItems"])
                }
                
                
                
                
                
            },
              error:function()
             {
                console.log("error getting product quantity in cart")     
             }
        })
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        var product_name = $('input[name=name'+fieldName[fieldName.length - 1]+']').attr("value")
        
        $.ajax({
            url :  "retrieveProducts.php",
            type: 'POST',
            data: {category: "quantity", productName: product_name},
            dataType: "json",
            success: function(data) {
                console.log( data);
                
                var currentVal = parseFloat($('input[name='+fieldName+']').val());
        
                //console.log("current val: " + currentVal);
                // If is not undefined
                
                if (!isNaN(currentVal) && currentVal > 1) 
                {
                    
                    currentVal--;
                    
                    if( currentVal > parseFloat(data["quantity"]))
                    {
                        console.log("currentvale > quantity")
                        $('input[name='+fieldName+']').val(parseFloat(data["quantity"]));
                        $("#price"+fieldName[fieldName.length - 1]).html("$"+(parseFloat(data["quantity"]) * data["price"]).toFixed(2))
                        calculateTotal(data["totalItems"])
                    }   
                    else
                    {
                        $('input[name='+fieldName+']').val(currentVal);
                        $("#price"+fieldName[fieldName.length - 1]).html("$" +(currentVal * data["price"]).toFixed(2))
                        calculateTotal(data["totalItems"])
                    }
                }        
                else
                {
                    currentVal = 1;
                    $('input[name='+fieldName+']').val(currentVal);
                    $("#price"+fieldName[fieldName.length - 1]).html("$" + (currentVal * data["price"]).toFixed(2))
                    calculateTotal(data["totalItems"])
                }
                
            },
              error:function()
             {
                console.log("error getting product quantity in cart")     
             }
        })
    });
});

        
            
</script>
    </body>
</html>