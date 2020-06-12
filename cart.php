<?php include('header.php');?>
<div class="cartlist">
    <h3>Your cart</h3>
    <div class="cartitem">    
        <table class="table table-borderless">
            <thead class="thead-light">
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Net.Price</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(isset($_SESSION["cart"])){
            $total=0;
            $itemtotal=0;
            $item=$_SESSION['cart'];
	        $product_id_array=array_column($_SESSION['cart'],'product_id');
	        $sql="SELECT * FROM product";
	        $result=$db_handle->runQuery($sql);
	        if($result->num_rows>0){
	        while($row=$result->fetch_assoc()){		
            foreach ($item as $key=>$value){
                $quantity=$item[$key]['quantity'];
                $product_id=$item[$key]['product_id'];
                $size=$item[$key]['size'];
		    if($row['product_id']==$product_id){
		    ?>
            <form action="cart.php?action=remove&product_id_array=$product_id_array" method="post">
            <tr>
                <td>
                    <div class="row">
                        <?php
                            $queryimg="select* from product_img where product_id='$product_id' limit 1";
                            $resultimg=$db_handle->runQuery($queryimg);
                            while($rowimg=$resultimg->fetch_assoc()){
                            
                            ?>
                        <div class="col-4">
                            <img src="image/<?php echo $rowimg['img']; ?>"alt="<?php echo $rowimg['img'];?>">
                        </div>
                        <?php } ?>
                        <div class="col-8">
                            <h5><?php echo $row['product_name']; ?></h5>
                            <p><?php echo $row['description']; ?></p>
                        </div>
                    </div>
                </td>
                <td>
                    <b><?php echo $quantity; ?></b>
                </td>
                <td>
                    <b><?php echo $size; ?></b>
                </td>
                <td>
                    <b>None</b>
                </td>
                <td>
                    <b>Rs<?php echo $row['price']; ?></b>
                </td>
                <td>
                    <b><?php echo round($row['discount']); ?>%</b>
                </td>
                <td>
                    <b>Rs<?php echo $row['net_price']; ?></b>
                </td>
                <td>
                    <button class="btn btn-danger btn-sm" type="submit" name="remove"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            </form>    
                <?php
                $itemtotal+=$row['net_price']*$quantity;
                }
		        }
            }
            }
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php   
        $delivery=50;
        $total=$itemtotal+$delivery;
    ?>
    <div class="summery">
        <h5>Summery</h5>
        <form action="" method="post">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>
                        <b>Item(s) Total</b>
                    </td>
                    <td>Rs <?php echo $itemtotal; ?></td>
                </tr>
                <tr>
                    <td>
                        <b>Delivery</b>
                    </td>
                    <td>Rs <?php echo $delivery; ?></td>
                </tr>
                <tr class="table-active">
                    <td><b>Total</b></td>
                    <td>Rs <?php echo $total; ?></td>
                </tr>
            </tbody>
        </table>
        <ul>
            <?php if(isset($_SESSION['user_id'])){?>
            <li>
                <h6>Payment Mode</h6>
                <input type="radio" value="online" name="payment" id="online" checked>
                <label for="online">online</label>
                <!-- <input type="radio" value="cod" name="payment" id="cod"disabled="true">
                <label for="cod">Cash on Delivery(not available)</label> -->
            </li>
            <li>
                <button type="submit" class="btn btn-dark" id="checkout" name="checkout">Checkout</button>
                <?php }
                else{?>
                <a href="signup.php" class="btn btn-dark">Login To Checkout</a>
                <?php }?>
            </li>
        </ul>
        </form>
    </div>
</div>
<div class="cart-footer">
        <?php
            include('footer.php');
        ?>
</div>
<script>
    $(document).ready(function(){
    $(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y < 305) {
    $('.view-summery').fadeOut();
  } else {
    $('.view-summery').css("display","block");
    $('.view-summery').fadeIn();
  }
});
    $('.view-summery').click(function(){
        $(document).scrollTop(0);
    });
});
</script>
<div class="mobile-cart">
    <div class="summery1">
    <h5>Summery</h5>
        <form action="" method="post">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>
                        <b>Item(s) Total</b>
                    </td>
                    <td>Rs <?php echo $itemtotal; ?></td>
                </tr>
                <tr>
                    <td>
                        <b>Delivery</b>
                    </td>
                    <td>Rs <?php echo $delivery; ?></td>
                </tr>
                <tr class="table-active">
                    <td><b>Total</b></td>
                    <td>Rs <?php echo $total; ?></td>
                </tr>
            </tbody>
        </table>
        <ul>
            <li>
                <?php if(isset($_SESSION['user_id'])){?>
                <?php 
                    $query="select * from delivery_address where selected=1 and user_id='$_SESSION[user_id]'";
                    $result=$db_handle->runQuery($query);
                    if($result->num_rows>0){
                    $row1=$result->fetch_assoc();
                ?>
                <p><?php echo"$row1[name]"; ?>,<?php echo"$row1[phone]"; ?>,<br><?php echo"$row1[address]"; ?>,<br><?php echo"$row1[locality]"; ?>,<?php echo"$row1[city]"; ?>,<br><?php echo"$row1[state]"; ?>-<?php echo"$row1[pin]"; ?></p>
                <a href="user_delivery_address.php" class="address"><b>Change Default Address</b></a>
                <?php } 
                else{ ?>
                    <a href="user_delivery_address.php" class="address"><b>Add Shipping Address</b></a>
                <?php
                }
                ?>
            </li>
            <li>
                <h6>Payment Mode</h6>
                <input type="radio" value="online" name="payment" id="online" checked>
                <label for="online">online</label>
                <!-- <input type="radio" value="cod" name="payment" id="cod"disabled="true">
                <label for="cod">Cash on Delivery(not available)</label> -->
            </li>
            <li>
                <button type="submit" class="btn btn-dark" id="checkout" name="checkout1">Checkout</button>
                <?php }
                else{?>
                <a href="signup.php" class="btn btn-dark">Login To Checkout</a>
                <?php }?>
            </li>
        </ul>
        </form>
    </div>
    
    <div class="cartlist1">
    <?php
        if(isset($_SESSION["cart"])){
        $item=$_SESSION['cart'];
        $product_id_array=array_column($_SESSION['cart'],'product_id');
        $sql="SELECT * FROM product";
        $result=$db_handle->runQuery($sql);
        if($result->num_rows>0){
        while($row=$result->fetch_assoc()){		
        foreach ($item as $key=>$value){
            $quantity=$item[$key]['quantity'];
            $product_id=$item[$key]['product_id'];
            $size=$item[$key]['size'];
        if($row['product_id']==$product_id){
        ?>
        <form action="cart.php?action=remove&product_id_array=$product_id_array" method="post">
            <div class="product">    
                <div class="row">
                    <div class="col-8">
                        <div class="product-name"><?php echo $row['product_name']; ?></div>
                        <div class="product-description"><?php echo $row['description']; ?></div>
                        <div class="product-price"><b>Rs <?php echo $row['net_price']; ?></b> <del><?php echo $row['price']; ?></del> <span class="product-discount"><?php echo round($row['discount']); ?>% off</span></div>
                        <div class="product-size">Size- <?php echo $size; ?></div>
                        <div class="product-color">Color- None</div>
                    </div>
                    <div class="col-4">
                        <?php
                            $queryimg="select* from product_img where product_id='$product_id' limit 1";
                            $resultimg=$db_handle->runQuery($queryimg);
                            while($rowimg=$resultimg->fetch_assoc()){
                        ?>
                        <img src="image/<?php echo $rowimg['img']; ?>"alt="<?php echo $rowimg['img'];?>">
                        <?php } ?>
                        <div class="product-quantity">Qty- <?php echo $quantity; ?></div>
                    </div>
                </div>
                <div class="row justify-content-center p-1">
                    <button class="btn btn-danger btn-sm" type="submit" name="remove"><i class="fas fa-trash"></i></button>
                </div>
            </div>
        </form>
        <?php } 
        }
        }
        }
        }?>
    </div>
    <div class="view-summery">View Summery</div>
</div>

<?php
if(isset($_POST["checkout"])){
        $count=count($_SESSION['cart']);
        if($count>0){
            echo"<script>window.location.href=''</script>";
        }
        else{
            echo"<script>alert('cart is empty');</script>";
            echo"<script>window.location.href='index.php'</script>";
        }
}
if(isset($_POST["checkout1"])){
    $query="select * from delivery_address where selected=1 and user_id='$_SESSION[user_id]'";
    $result=$db_handle->runQuery($query);
    if($result->num_rows>0){
        $count=count($_SESSION['cart']);
        if($count>0){
            echo"<script>window.location.href='payuform.php?itemtotal=$itemtotal&total=".urlencode($total)."'</script>";
        }
        else{
            echo"<script>alert('cart is empty');</script>";
            echo"<script>window.location.href='index.php'</script>";
        }
    }
    else{
        echo"<script>alert('Please Add a Delivery Address');</script>";
        echo"<script>window.location.href='user_delivery_address.php'</script>";
    }
}
 if(isset($_POST['remove'])){
     if($_GET['action']=='remove'){
         foreach($_SESSION['cart'] as $key => $value){
             if($_GET['product_id_array']==$key){
                 unset($_SESSION['cart'][$key]);
                 $_SESSION['cart']=array_values($_SESSION['cart']);
                 echo "<script>alert('product has been removed...!')</script>";
                 if(!empty($_SESSION['cart'])){
                    echo "<script>window.location='cart.php'</script>";
                 }
                 else{
                     echo "<script>window.location='empty_cart.php'</script>";
                 }
             }

         }
     }
}
?>