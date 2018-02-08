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
        
        $a1 = getNewArrivals();
        $a2 = getNewArrivals();
        $arrivals = array_merge($a1,$a2);
    
	?>
    <body>
        <div id="container">
            
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
                            echo"<div class='loopDiv' style='display: flex; margin-bottom: 20px;'>";
                            
                            for($j =0; $j < 4; $j++)
                            {
                            echo"<div class = \"innerContainer\">
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
                            
                            $i++;
                                
                            }
                            
                            $i--;
                            
                            echo"</div>";
                           
                        }
                    ?>
                </div>
                
                
            </div>
            
            
            <footer style="background-color: #222222;">
                <div style="display: flex;">
                    
                    
                    <div style="margin: auto;">
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
                var modals = [];
                var buttons = [];
                
                function displayModal(buttonId)
                {
                    
                    var i;
                    
                    console.log("length array: "+ buttons.length);
                    
                    for(i = 0; i < 8; i++)
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
                
                for(i = 0; i< 8; i++)
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
                    for(i = 0; i < 8; i++)
                        {
                            if (event.target == modals[i])
                            {
                                modals[i].style.display = "none";
                            }
                        }
                }
            
        });
        
            
</script>
 
        <script>
            
            function getItems(item)
            {
              console.log("div with " + item + "was pressed")
              
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
                            $( "<div class='loopDiv' style='display: flex; margin-bottom: 20px;'></div>" ).appendTo( "#rightSide" );
                            
                            
                            for(var j = 0; j < 4; j++)
                            {
                                console.log("inside for loop j")
                                $("<div class = \"innerContainer\"></div>").appendTo( ".loopDiv" )
                                $("<div class='imageDiv'></div>").appendTo(".innerContainer")
                                $("<img class=\"productImage\" src=\"" + data[i]["picture"] + "\">").appendTo(".imageDiv")
                                i++
                            }
                            i--
                            
                            // "<div class = \"innerContainer\">
                            //             <div>
                            //                 <img class=\"productImage\" src=\"". $arrivals[$i]["picture"]."\">
                            //             </div>
                                        
                            //             <div class = \"displayVertical\">
                            //                 <div class = \"nameOfProduct\">". $arrivals[$i]["name"]."</div>
                            //                 <button  type=\"button\" id='button".$i."' onclick=\"displayModal('button".$i."');\">".$arrivals[$i]["price"]."</button>
                            //             </div>
                                      
                            //           <!-- end of inner product container -->
                            // </div>";
                            
                            
                           // $("<div id=\"modal".$i."\" class=\"modal\"></div>").appendTo(".rightSide")
                            
                            
                        }
                }
                
                else{
                            console.log("Inside else statement < 4")
        
                                 $( "<div class='loopDiv' style='display: flex; margin-bottom: 20px;'></div>" ).appendTo( "#rightSide" );
                            
                            
                            for(var i = 0; i < Object.keys(data).length; i++)
                            {
                                // $("<div class = \"innerContainer\"></div>").appendTo( ".loopDiv" )
                                // $("<div class='imageDiv'></div>").appendTo(".innerContainer")
                                // $("<img class=\"productImage\" src=\"" + data[i]["picture"] + "\">").appendTo(".imageDiv")
                                // $("<div class = \"displayVertical\"></div>").appendTo(".innerContainer")
                                // $("<div class = \"nameOfProduct\">"+ data[i]["name"] +"</div>)").appendTo(".displayVertical")
                                // $("<button  type=\"button\" id='button" +i +"' onclick=\"displayModal('button" +i+"');\">"+ data[i]["price"] +"</button>").appendTo(".displayVertical")
                                
                                     
                                $(".loopDiv").append("<div class = \"innerContainer\"></div>")
                                $(".innerContainer").append("<div class=\"imageDiv\"></div>")
                                $(".imageDiv").append("<img class=\"productImage\" src=\"" + data[i]["picture"] + "\">")
                                $(".innerContainer").append("<div class = \"displayVertical\"></div>")
                                $(".displayVertical").append("<div class = \"nameOfProduct\">"+ data[i]["name"] +"</div>")
                                $(".displayVertical").append("<button  type=\"button\" id='button" +i +"' onclick=\"displayModal('button" +i+"');\">"+ data[i]["price"] +"</button>")
                                
                                
                               
                                
                            }
                           
                            
                            // "<div class = \"innerContainer\">
                            //             <div>
                            //                 <img class=\"productImage\" src=\"". $arrivals[$i]["picture"]."\">
                            //             </div>
                                        
                            //             <div class = \"displayVertical\">
                            //                 <div class = \"nameOfProduct\">". $arrivals[$i]["name"]."</div>
                            //                 <button  type=\"button\" id='button".$i."' onclick=\"displayModal('button".$i."');\">".$arrivals[$i]["price"]."</button>
                            //             </div>
                                      
                            //           <!-- end of inner product container -->
                            // </div>";
                            
                            
                           // $("<div id=\"modal".$i."\" class=\"modal\"></div>").appendTo(".rightSide")
                            
                            
                        
                    
                }
               
                
                
                

            
              },    
              error: function(data) {
                console.log("There was an error with ajax call!");
                
              },
              
            });	
            }
            
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
    