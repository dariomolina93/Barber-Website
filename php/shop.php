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
        
        $arrivals = getAllProducts();
    
	?>
    <body>
        <div id="container">
            
            <!-- Image div -->
            <div style='display:flex;'>
                
                <div id="imageLogo">
                    <img class = 'imageBarber' src="../images/barberLogo.jpg" alt="Logo">
                </div>
                
                <div style= "text-align:right;">
                    
                    <a href="cart.php">
                        <img  class ='cartLogo' title="checkout" alt="checkout" src="cartLogo.png"/>
                    </a>
                   
                </div>
                
            </div>
            
            <!-- Menu -->
            <div id="categories">
                <ul style="margin-top: 5px;">
                    <li><a id="pic1" href="./home.php">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="./about.php">About</a></li>
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
                
                <div id = 'rightSide' style="width: 75%;">
                    <?php
   
                        for($i = 0; $i < count($arrivals); $i++)
                        {
                            echo"<div class='loopDiv displayHorizontal' style='margin-bottom: 20px;'>";
                            
                            for($j =0; $j < 4; $j++)
                            {
                                if($i == count($arrivals))
                                    break;
                                    
                            echo"<div id='button".$i."' class = \"innerContainer\"  onclick=\"displayModal('button".$i."');\">
                                <div>
                                    <img class=\"productImage\" src=\"". $arrivals[$i]["picture"]."\">
                                </div>
                                
                                <div class = \"displayVertical\">
                                    <div class = \"nameOfProduct\">". $arrivals[$i]["name"]."</div>
                                    <div class = 'nameOfProduct' style ='margin-top:5px;' >$".number_format((float)$arrivals[$i]['price'],2, '.', '')."</div>
                                </div>
                              
                              <!-- end of inner product container -->
                            </div>";
                            
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
                                                <div class='price'>$".number_format((float)$arrivals[$i]['price'],2, '.', '')."</div>
                                                <input type='hidden' name='nameProduct' value='".$arrivals[$i]['name']."'>
                                                <input type='hidden' name='price' value='".number_format((float)$arrivals[$i]['price'],2, '.', '')."'>
                                            
                                            
                                                <div style='margin-top: 10px;'>
                                                    <span style='font-size: 20px;'>Quantity</span>
                                                    
                                                    <input type='button' value='-' class='qtyminus' field='quantity' />
                                                    <input  readonly type='text' name='quantity' value='1' class='qty' />
                                                    <input type='button' value='+' class='qtyplus' field='quantity' />
                                                </div>";
                                                
                                                if($arrivals[$i]["sizeApplicable"])
                                                {
                                                    echo "
                                                    <select name='size'>
                                                        <option value='Small'>Small</option>
                                                        <option value='Medium'>Medium</option>
                                                        <option value='Large'>Large</option>
                                                        <option value='XL'>XL</option>
                                                    </select>";
                                                }
                                                
                                            
                            
                                                echo "
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
                            
                            $i++;
                                
                            }
                            
                            $i--;
                            
                            echo"</div>";
                           
                        }
                    ?>
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
        </div>
        
        <script>
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
        
        <script>

                var modals = [];
                var buttons = [];
                var numberOfProducts;
                var closeButton = [];

        $.ajax({
              url :  "retrieveProducts.php",
              type: 'POST',
              data: {category: "count"},
              dataType: "json",
              success: function(data) {
                console.log( data);
                
                numberOfProducts = parseInt(data[0]["products"]);
                 console.log("numberOfProducts =" + numberOfProducts);
                 console.log("type" +typeof(numberOfProducts))
                
              },
              error:function()
             {
                console.log("error getting product quantity")     
             },
             complete:function()
             {
                 for(var i = 0; i< numberOfProducts; i++)
                    {
                        modals[i] = document.getElementById("modal"+i)
                        buttons[i] = document.getElementById("button"+i)//.addEventListener ("click", displayModal("button"+i), false);
                        closeButton[i] = document.getElementById("close"+i)
                        
                    }
             }
            
        });
        
                function displayModal(buttonId)
                {
                    
                    var i;
                    
                    console.log("Button was clicked to open modal");
                    console.log("button id=" + buttonId)
                    
                    for(i = 0; i < numberOfProducts; i++)
                    {
                        if(buttons[i].id === buttonId)
                        {
                            
                            modals[i].style.display = "block";
                           break;
                        }
                    }
                    
                    window.onclick = function(event)
                {
                    for(i = 0; i < numberOfProducts; i++)
                        {
                            if (event.target == modals[i])
                            {
                                modals[i].style.display = "none";
                                break;
                            }
                        }
                }
                };
                
                
             
             function closeModal(closeId)
                {
                    var i;
                    
                    for(i = 0; i < 4; i++)
                    {
                        if(closeButton[i].id === closeId)
                        {
                            modals[i].style.display = "none";
                            break;
                        }
                    }
                }
            
            
            function getItems(item)
            {
              $.ajax({
              url :  "retrieveProducts.php",
              type: 'POST',
              data: {category: item},
              dataType: "json",
              success: function(data) {
                console.log( data);
                console.log("length of items: "+Object.keys(data).length);
                
                
                $( ".loopDiv" ).remove();
                console.log("after remove")
                
                 //$("<div class='loopDiv' style='display: flex; margin-bottom: 20px;'>helloworld</div>" ).appendTo("#rightSide" );
                if(Object.keys(data).length > 4)
                {
                    console.log("inside if statement items > 4")
                     for(var i = 0; i < Object.keys(data).length; i++)
                        {
                            console.log("Inside for loop i")
                            var temp = i;
                            $( "<div  id='loopDiv"+temp+"' class='loopDiv displayHorizontal' style='display: flex; margin-bottom: 20px;'></div>" ).appendTo( "#rightSide" );
                            
                            console.log("Before j loop i =" + i)
                            for(var j = 0; j < 4; j++)
                            {
                                if(i === Object.keys(data).length)
                                    break;
                                
                                $("#loopDiv"+temp).append("<div id='button"+i+"' class = 'innerContainer' onclick=\"displayModal('button"+i+"');\"></div>")
                    
                                $("#button"+i).append("<div id='imageDiv"+i+"' class=\"imageDiv\"></div>")
                                //console.log("after appending .imageDiv to .innerContainer i=" + i)
                                $("#imageDiv"+i).append("<img class=\"productImage\""+i+" src=\"" + data[i]["picture"] + "\">")
                                //console.log("after appending .productImage to .imageDiv i=" + i)
                                $("#button"+i).append("<div id='displayVertical"+i+"' class = \"displayVertical\"></div>")
                                //console.log("after appending .displayVertical to .innerContainer i=" + i)
                                $("#displayVertical"+i).append("<div id='nameOfProduct"+i+"' class = \"nameOfProduct\">"+ data[i]["name"] +"</div>")
                                //console.log("after appending .nameOfProduct to .displayVertical i=" + i)
                                $("#displayVertical"+i).append("<div class = 'nameOfProduct' style ='margin-top:5px;' >$"+ parseFloat(data[i]["price"]).toFixed(2) +"</div>")
                                //console.log("after appending button to .displayVertical i=" + i + "\n\n\n")
                                
                                $(".loopDiv").append("<div id='modal"+i+"' class=\"modal\"></div>")
                                $("#modal"+i).append("<div id='modal-content"+i+"' class=\"modal-content\"></div>")
                                $("#modal-content"+i).append("<span id='close"+i+"' class='close' onclick=\"closeModal('close"+i+"');\">&times;</span>")
                                $("#modal-content"+i).append("<br>")
                                $("#modal-content"+i).append("<br>")
                                
                                
                                
                                $("#modal-content"+i).append("<div id='panels"+i+"' style=\"display: flex;\"></div>")
                                $("#panels"+i).append("<div id='details"+i+"' style='width:50%;'></div>")
                                $("#details"+i).append("<h2 class = 'nameTitle'>"+data[i]["name"]+"</h2>")
                                $("#details"+i).append("<hr style='width: 90%;'>")
                                $("#details"+i).append("<div class='price'>$"+parseFloat(data[i]["price"]).toFixed(2)+"</div>")
                                $("#details"+i).append("<form id='forms"+i+"'method='POST' action='cart.php'></form>")
                                $("#forms"+i).append("<div id='userInput"+i+"' style='margin-top: 10px;'></div>")
                                $("#forms"+i).append("<input type='hidden' name='nameProduct' value='"+data[i]['name']+"'>")
                                $("#forms"+i).append("<input type='hidden' name='price' value='"+parseFloat(data[i]["price"]).toFixed(2)+"'>")
                                $("#userInput"+i).append("<span style='font-size: 20px;'>Quantity</span>")
                                $("#userInput"+i).append("<input type='button' value='-' class='qtyminus' field='quantity' />")
                                $("#userInput"+i).append("<input  readonly type='text' name='quantity' value='0' class='qty' />")
                                $("#userInput"+i).append("<input type='button' value='+' class='qtyplus' field='quantity' />")
                                
                            
                                if(parseInt(data[i]["sizeApplicable"]))
                                {
                                    $("#forms"+i).append("<select id='select"+i+"' name='size'>")
                                    $("#select"+i).append("<option value='Small'>Small</option>")
                                    $("#select"+i).append("<option value='Medium'>Medium</option>")
                                    $("#select"+i).append("<option value='Large'>Large</option>")
                                    $("#select"+i).append("<option value='XL'>XL</option>")
                                }
                                
                                $("#forms"+i).append("<input style='margin-left: 5px;' type='submit' value='Add to Cart'>")
                                
                                
                                $("#panels"+i).append("<div id='images"+i+"' style='width:50%;'></div>")
                                $("#images"+i).append("<img class=\"productImage\" src=\""+data[i]["picture"]+"\">")
                                i++
                            }
                            i--
                            console.log("after j loop i =" + i)
                        }
                        
                        console.log("after page loaded");
                       
                            modals.length = 0;
                            buttons.length = 0;
                            closeButton.length = 0;
                            
                            console.log("clearing arrays")
                            console.log("modalslength: "+ modals.length)
                            
                            console.log("amount of objects= " +Object.keys(data).length )
                            
                            for(var i = 0; i < Object.keys(data).length; i++)
                            {
                                console.log("inside for loop i=" + i)
                                modals[i] = document.getElementById("modal"+i)
                                buttons[i] = document.getElementById("button"+i)
                                closeButton[i] = document.getElementById("close"+i)
                            }
                            
                            
                            console.log("modalslength: "+ modals.length)
                            console.log("buttons length: "+ buttons.length)
                }
                
                else{
                            console.log("Inside else statement")
        
                            $( "<div class='loopDiv displayHorizontal' style='display: flex; margin-bottom: 20px;'></div>" ).appendTo( "#rightSide" );
                            
                            
                            for(var i = 0; i < Object.keys(data).length; i++)
                            {
                                
                                $(".loopDiv").append("<div id='button"+i+"' class = 'innerContainer' onclick=\"displayModal('button"+i+"');\"></div>")
                                $("#button"+i).append("<div id='imageDiv"+i+"' class=\"imageDiv\"></div>")
                                $("#imageDiv"+i).append("<img class=\"productImage\""+i+" src=\"" + data[i]["picture"] + "\">")
                                $("#button"+i).append("<div id='displayVertical"+i+"' class = \"displayVertical\"></div>")
                                $("#displayVertical"+i).append("<div id='nameOfProduct"+i+"' class = \"nameOfProduct\">"+ data[i]["name"] +"</div>")
                                $("#displayVertical"+i).append("<div class = 'nameOfProduct' style ='margin-top:5px;' >$"+ parseFloat(data[i]["price"]).toFixed(2) +"</div>")
                                
                                $(".loopDiv").append("<div id='modal"+i+"' class=\"modal\"></div>")
                                $("#modal"+i).append("<div id='modal-content"+i+"' class=\"modal-content\"></div>")
                                $("#modal-content"+i).append("<span id='close"+i+"' class='close' onclick=\"closeModal('close"+i+"');\">&times;</span>")
                                $("#modal-content"+i).append("<br>")
                                $("#modal-content"+i).append("<br>")
                                
                                $("#modal-content"+i).append("<div id='panels"+i+"' style=\"display: flex;\"></div>")
                                $("#panels"+i).append("<div id='details"+i+"' style='width:50%;'></div>")
                                $("#details"+i).append("<h2 class = 'nameTitle'>"+data[i]["name"]+"</h2>")
                                $("#details"+i).append("<hr style='width: 90%;'>")
                                $("#details"+i).append("<div class='price'>$"+parseFloat(data[i]["price"]).toFixed(2)+"</div>")
                                $("#details"+i).append("<form id='forms"+i+"'method='POST' action='cart.php'></form>")
                                $("#forms"+i).append("<div id='userInput"+i+"' style='margin-top: 10px;'></div>")
                                $("#forms"+i).append("<input type='hidden' name='nameProduct' value='"+data[i]['name']+"'>")
                                $("#forms"+i).append("<input type='hidden' name='price' value='"+parseFloat(data[i]["price"]).toFixed(2)+"'>")
                                $("#userInput"+i).append("<span style='font-size: 20px;'>Quantity</span>")
                                $("#userInput"+i).append("<input type='button' value='-' class='qtyminus' field='quantity' />")
                                $("#userInput"+i).append("<input  readonly type='text' name='quantity' value='0' class='qty' />")
                                $("#userInput"+i).append("<input type='button' value='+' class='qtyplus' field='quantity' />")
                                
                                console.log("Type of sizeApplicable from response: "+ typeof(data[i]["sizeApplicable"]))
                                 if(parseInt(data[i]["sizeApplicable"]))
                                {
                                    $("#forms"+i).append("<select id='select"+i+"' name='size'>")
                                    $("#select"+i).append("<option value='Small'>Small</option>")
                                    $("#select"+i).append("<option value='Medium'>Medium</option>")
                                    $("#select"+i).append("<option value='Large'>Large</option>")
                                    $("#select"+i).append("<option value='XL'>XL</option>")
                                }
                                $("#forms"+i).append("<input style='margin-left: 5px;' type='submit' value='Add to Cart'>")
                                
                                
                                $("#panels"+i).append("<div id='images"+i+"' style='width:50%;'></div>")
                                $("#images"+i).append("<img class=\"productImage\" src=\""+data[i]["picture"]+"\">")
                            
                                
                            }
                           console.log("after page loaded");
                       
                            modals.length = 0;
                            buttons.length = 0;
                            closeButton.length = 0;
                            
                            console.log("clearing arrays")
                            console.log("modalslength: "+ modals.length)
                            
                            console.log("amount of objects= " +Object.keys(data).length )
                            
                            for(var i = 0; i < Object.keys(data).length; i++)
                            {
                                console.log("inside for loop i=" + i)
                                modals[i] = document.getElementById("modal"+i)
                                buttons[i] = document.getElementById("button"+i)
                                closeButton[i] = document.getElementById("close"+i)
                            }
                            
                            
                            console.log("modalslength: "+ modals.length)
                            console.log("buttons length: "+ buttons.length)
                            
                        
                    
                }
               
                
                
                

            
              },    
              error: function(data) {
                console.log("There was an error with ajax call!");
                
              }
              
            });	
            }
            
            
            
        </script>
    </body>
</html>

<?php
 
 	function getAllProducts()
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
			    $array[$i] = array("name" => $row["name"], "picture"=> $row["picture"], "quantity"=>$row["quantity"],"price"=>$row["price"], "sizeApplicable"=>$row["sizeApplicable"]);
			    $i++;
			}
		return $array;
	}
 
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
	    <a href='#' onclick='event.preventDefault();'>
            <div id = '".$row["category"]."' class='shop-categories' onclick=\"getItems('".$row["category"]."')\">
	            ".$row["category"]."
	        </div>
	   </a>
        ";
	    
	    
	}
	
 }
 
?>
    