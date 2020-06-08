<!DOCTYPE html>
<html>
    <head>
        <title>
            E-ShoppingZone
        </title>
        <link rel="stylesheet" type="text/css" href="css/index_style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="header">
            <div id="header-menu">
                <div class="toggle-btn" onclick="toggleSidebar()">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <ul>
                    <li>Home</li>
                    <li>About</li>
                    <li>Contact</li>
                </ul>
            </div>
            <div id="logo">
                <h4>e-ShoppingZone</h4>
            </div>
            <div id="search-bar">
                <form action="">
                    <input type="text" name="search_box" placeholder="  search..">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div id="login">
                <a href=""><i class="fa fa-user-circle-o"></i></a>
            </div>
            <div id="notification">
                <a href=""><i class="fa fa-bell"></i></a>
            </div>
            <div id="wishlist">
                <a href=""><i class="fa fa-heart"></i></a>
            </div>
            <div id="cart">
                <a href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
            </div>
        </div>
        <div id="navbar">
            
        </div>
        <div id="slidebar">
            <img class="slides" src="image/a.jpg">
            <img class="slides" src="image/b.jpg">
            <img class="slides" src="image/c.jpg">
            <img class="slides" src="image/d.jpg">
            <img class="slides" src="image/e.jpg">
        </div>
            <div class="column">
                <div class="card1">
                    <img src="image/a.jpg">
                    <div class="price">10000/-</div>
                </div>
                <div class="card2">
                    <img src="image/a.jpg">
                    <div class="price">10000/-</div>
                </div>
                <div class="card3">
                    <img src="image/a.jpg">
                    <div class="price">10000/-</div>
                </div>
            </div>
            <div class="footer">

            </div>
        <script>
            function toggleSidebar(){
                if(document.getElementById("header-menu").classList.toggle('active')){
                    document.getElementById("logo").style.display="none";
                }
                else{
                    document.getElementById("logo").style.display="block";
                }
            }
            var slideIndex=0;
            slideShow();
            function slideShow(){
                var i;
                var img=document.getElementsByClassName("slides");
                for(i=0;i<img.length;i++)
                {
                    img[i].style.display="none";
                }
                slideIndex++;
                if(slideIndex>img.length){
                    slideIndex=1;
                }
                img[slideIndex-1].style.display="block";
                setTimeout(slideShow, 2000);
            }
        </script>
    </body>

</html>