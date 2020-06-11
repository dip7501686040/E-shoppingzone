<?php
    include('header.php');
?>
        <!--slidebar start-->

        <div id="slidebar">
            <img class="slides" src="image/a.png">
            <img class="slides" src="image/b.png">
            <img class="slides" src="image/c.png">
            <img class="slides" src="image/d.png">
            <img class="slides" src="image/e.png">
        </div>

        <!--slidebar end-->

        <!--shop start-->

        <div class="column">
            <div class="card1">
                <img src="image/p_pendrive.jpeg" onclick = "viewProductDetails(this)">
                <div class="details">
                    <h4>SanDisk SDCZ50-064g-I35 64 GB 
                        Pen Drive  (Red, Black) </br>&#x20b9;599/-</h4>                 
                </div>
            </div>
            <div class="card2">
                <img src="image/p_jbl.jpeg" onclick = "viewProductDetails(this)">
                <div class="details">
                    <h4>JBL GO2 Portable Bluetooth Speaker  (Blue, Mono Channel)</br>&#x20b9;1399/-</h4>                 
                </div>
            </div>
            <div class="card3">
                <img src="image/p_temp.jpeg" onclick = "viewProductDetails(this)">
                <div class="details">
                    <h4>Microtek TG8818C Multi Function Infrared Thermometer </br>&#x20b9;3999/-</h4>                 
                </div>
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

            function viewProductDetails(img) {
                location.href = 'single_product.php';
            }
        </script>
    </body>

</html>