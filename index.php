<?php
    include('header.php');
?>
        <!--slidebar start-->

        <div id="slidebar">
            <img class="slides" src="image/a.jpg">
            <img class="slides" src="image/b.jpg">
            <img class="slides" src="image/c.jpg">
            <img class="slides" src="image/d.jpg">
            <img class="slides" src="image/e.jpg">
        </div>

        <!--slidebar end-->

        <!--shop start-->

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

        <!--shop end-->

        <!--footer start-->
            <div class="footer">

            </div>
        <!--footer end-->
        
        <script>
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
                setTimeout(slideShow, 3000);
            }
        </script>
    </body>

</html>