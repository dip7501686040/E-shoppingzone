<?php include('header.php');
$query="select* from product where product_id='$_REQUEST[product_id]'";
$result=$db_handle->runQuery($query);
$row=$result->fetch_assoc();
?>
<div id="single-product">
    <div class="row">
        <div class="col-6 justify-content-center">
            <ul>
                <?php
                $query1="select img from product_img where product_id='$row[product_id]'";
                $result1=$db_handle->runQuery($query1);
                while($row1=$result1->fetch_assoc()){
                ?>
                <li data-thumb="image/<?php echo $row1['img'];?>">
	                <div class="thumb-image"><img src="image/<?php echo $row1['img'];?>" data-imagezoom="true" 
                    class="img-responsive"> 
	                </div>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-6 justify-content-center">
            <div style="border:1px solid grey;margin:10px 20px 0 20px;background-color:rgba(163, 166, 168, 0.596);">
            <div class="row justify-content-center">
                <h4><b><?php echo "$row[product_name]";?></b></h4>
            </div>
            <div class="row justify-content-center">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="row justify-content-center align-self-center">
                <h5 class="p-1">Rs <del><b><?php echo "$row[price]";?></b></del>&nbsp<b>Rs <?php echo "$row[net_price]";?>
                </b></h5>
            </div>
            <div class="row justify-content-center">
                <b><?php echo round($row['discount']);?>% discount</b>
            </div>
            <div class="row justify-content-center">
                <spna style='color:green;'>In Stock</span>
                <?php 
                    // if($row['quantity']>2){
                    //     echo "<spna style='color:green;'>In Stock</span>";
                    // } 
                    // elseif($row['quantity']==1){
                    //     echo "<spna style='color:green;'>In Stock</span><span style='color:red;'> (only 1 item left Hurry up!)</span>";
                    // }
                    // elseif($row['quantity']==2){
                    //     echo "<spna style='color:green;'>In Stock</span><span style='color:red;'> (2 items left Hurry up!)</span>";
                    // }
                    // else{
                    //     echo"<span style='color:red;'>Out of Stock</span>";
                    // }
                    ?>
            </div>
            <div class="row justify-content-center">
                <h6><?php echo "$row[description]";?></h6>
            </div>
            <form action="cart.php" method="post">
            <div class="row justify-content-center">
                <label for="qty" class="mr-4">Quantity</label>
                <select class="size" name="quantity" id="size"required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <?php 
            //if($row['category']=="CLOTHING"){
            ?>
            <!-- <div class="row justify-content-center">
                <label for="size" class="mr-4">Size</label>
                <select name="size" id="size"required>
                    <option value="">select</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>   
                </select>
            </div> -->
            <?php //}
            //else{?>
            <div class="row justify-content-center">
                <label for="size" class="mr-4">Size</label>
                <select name="size" id="size" disabled>
                    <option value="select">select</option>
                </select>
            </div> 
            <?php //} ?>
            <div class="row justify-content-center">
                <button class="btn btn-dark" style="margin-top:20px;padding:5px 80px"type="submit" name="add-to-cart"
                >Add To Cart</button>
                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
<div class="single-product-footer">
    <?php
        include('footer.php');
    ?>
</div>