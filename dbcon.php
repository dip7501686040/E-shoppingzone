<?php
    $con=mysqli_connect('localhost','root','','e-shoppingzonedb');
    if($con==false){
        ?>
        <script>alert("connection failed");</script>
        <?php
    }
?>