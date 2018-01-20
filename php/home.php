<html>
    <head>
        <title>Gomez The Barber</title>
        <link rel="stylesheet" href="../css/style.css">
        
    </head>
    <body>
        <div id="cointer">
            
            <!-- Image div -->
            <div id="imageLogo">
                <img src="../images/barberLogo.jpg" alt="Logo" height="250" width="700">
            </div>
            
            <!-- Menu -->
            <div id="categories">
                <ul>
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
                <h2>New Arrivals</h2>
                
                <!-- main container -->
                <div class="displayHorizontal">
                    
                    <!-- inner product container -->
                    <div class = "innerContainer">
                        <div>
                            <img class="productImage" src="https://square-production.s3.amazonaws.com/files/3e199fc39a96aaf2193d8c77e64fc450508feb6f/original.jpeg">
                        </div>
                        
                        <div class = "displayVertical">
                            <div>Red Fade Bandana</div>
                            <button>$35</button>
                        </div>
                        
                    </div>
                    
                    <!-- inner product container -->
                    <div class = "innerContainer">
                        <div>
                            <img class="productImage" src="https://square-production.s3.amazonaws.com/files/3e199fc39a96aaf2193d8c77e64fc450508feb6f/original.jpeg">
                        </div>
                        
                        <div class = "displayVertical">
                            <div>Red Fade Bandana</div>
                            <button>$35</button>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            
        
        
        <!-- End of div container -->
        </div>
        
        <script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    
    if (slideIndex > slides.length) {slideIndex = 1;}    
    
    slides[slideIndex-1].style.display = "block";  
    setTimeout(showSlides, 4000); // Change image every 4 seconds
}
</script>
    </body>
</html>