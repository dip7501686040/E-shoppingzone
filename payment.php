<?php
include('header.php');
$itemtotal=$_REQUEST['itemtotal'];
$total=$_REQUEST['total'];
$delivery=$total-$itemtotal;
?>
<div class="delivery-address">
    <ul>
        <ul class="row">
            <li class="col-3">
                <h5>Manage Address</h5>
            </li>
        </ul>
        <li>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" 
                        aria-controls="collapseOne">
                        + Add New Address
                        </button>
                    </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="" method="POST">
                        <ul class="row">
                            <li class="col-4">
                                <input type="text" name="name" placeholder="Name" size="30" required>
                            </li>
                            <li class="col-4">
                                <input type="text" name="phone" placeholder="Phone" size="30" required>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-4">
                                <input type="text" name="pin" placeholder="Pincode" size="30" required>
                            </li>
                            <li class="col-4">
                                <input type="text" name="locality" placeholder="Locality" size="30" required>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-12">
                                <textarea name="address" placeholder="Address" required cols="83"></textarea>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-4">
                                <input type="text" name="city" placeholder="City/District/Town" size="30" required>
                            </li>
                            <li class="col-4">
                                <input type="text" name="state" placeholder="State" size="30" required>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-4">
                                <input type="text" name="landmark" placeholder="Landmark(optional)" size="30">
                            </li>
                            <li class="col-4">
                                <input type="text" name="altphone" placeholder="Alternate phone(optional)" size="30">
                            </li>
                        </ul>
                        <ul class="row align-center">
                            <label for="">Address Type</label>
                            <li class="col-1 align-center">
                                <input type="radio" name="type" value="home" id="home" required>
                                <label for="home">Home</label>
                            </li>
                            <li class="col-1 align-center">
                                <input type="radio" name="type" value="work" id="work" required>
                                <label for="work">Work</label>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-2">
                                <input class="btn btn-dark" type="submit" name="savenew" value="Save">
                            </li>
                            <li class="col-2">
                                <input class="btn btn-light" Type="submit" name="cancel" value="Cancel">
                            </li>
                        </ul>
                        </form>
                    </div>
                    </div>
                </div>
                <?php  
                    $i=1;
                    $query="select * from delivery_address where user_id='$_SESSION[user_id]'";
                    $result=$db_handle->runQuery($query);
                    while($row=$result->fetch_assoc()){
                ?>
                <div class="card">
                    <div class="card-header" id="heading<?php echo"$i"; ?>">
                    <h2 class="mb-0">
                        <div class="row">
                            <div class="col-10">
                                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo"$i"; ?>" aria-expanded="false" 
                                aria-controls="collapse<?php echo"$i"; ?>">
                                <span><?php echo"$row[type]"; ?></span><br>
                                <b><?php echo"$row[name]"; ?></b><b>&nbsp&nbsp&nbsp&nbsp<?php echo"$row[phone]"; ?></b><br><p><?php echo"$row[address]"; ?>,
                                <?php echo"$row[locality]"; ?>,<?php echo"$row[city]"; ?>,<?php echo"$row[state]"; ?>,<?php echo"$row[pin]"; ?></p>
                                </button>
                            </div>
                            <div class="col-2">
                                <?php 
                                   if($row['selected']==1){
                                       echo"<h6>Default Address</h6>";
                                    }
                                ?>
                            </div>
                        </div>
                    </h2>
                    </div>
                    <div id="collapse<?php echo"$i"; ?>" class="collapse" aria-labelledby="heading<?php echo"$i"; ?>" data-parent="#accordionExample">
                    <div class="card-body">
                       <form action="" method="POST">
                        <ul class="row">
                            <?php if($row['selected']==0){?>
                            <li class="col-12">
                                <label for="setdefault"><h5>Set As Default</h5></label>
                                <input id="setdefault" type="checkbox" name="setas-default" value="1">
                            </li>
                            <?php }?>
                        </ul>
                        <ul class="row">
                            <li class="col-4">
                                <input type="text" name="name<?php echo"$i"; ?>" placeholder="Name" value="<?php echo"$row[name]"; ?>" size="30" required>
                            </li>
                            <li class="col-4">
                                <input type="text" name="phone<?php echo"$i"; ?>" placeholder="Phone" value="<?php echo"$row[phone]"; ?>" size="30" required>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-4">
                                <input type="text" name="pin<?php echo"$i"; ?>" placeholder="Pincode" value="<?php echo"$row[pin]"; ?>" size="30" required>
                            </li>
                            <li class="col-4">
                                <input type="text" name="locality<?php echo"$i"; ?>" placeholder="Locality" value="<?php echo"$row[locality]"; ?>" size="30" required>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-12">
                                <textarea name="address<?php echo"$i"; ?>" placeholder="Address" required cols="83"><?php echo"$row[address]"; ?></textarea>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-4">
                                <input type="text" name="city<?php echo"$i"; ?>" placeholder="City/District/Town" value="<?php echo"$row[city]"; ?>" size="30" required>
                            </li>
                            <li class="col-4">
                                <input type="text" name="state<?php echo"$i"; ?>" placeholder="State" value="<?php echo"$row[state]"; ?>" size="30" required>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-4">
                                <input type="text" name="landmark<?php echo"$i"; ?>" placeholder="Landmark(optional)" value="<?php echo"$row[landmark]"; ?>" size="30">
                            </li>
                            <li class="col-4">
                                <input type="text" name="altphone<?php echo"$i"; ?>" placeholder="Alternate phone(optional)" value="<?php echo"$row[alternate_phone]"; ?>" size="30">
                            </li>
                        </ul>
                        <ul class="row align-center">
                            <label for="">Address Type</label>
                            <li class="col-1 align-center">
                                <input type="radio" name="type<?php echo"$i"; ?>" value="home" id="home" required <?php if($row['type']=='home'){echo"checked";} ?>>
                                <label for="home">Home</label>
                            </li>
                            <li class="col-1 align-center">
                                <input type="radio" name="type<?php echo"$i"; ?>" value="work" id="work" required <?php if($row['type']=='work'){echo"checked";}?>>
                                <label for="work">Work</label>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-2">
                                <input type="hidden" name="id<?php echo"$i"; ?>" value="<?php echo"$row[id]"; ?>">
                                <input class="btn btn-dark" type="submit" name="saveupdate<?php echo"$i"; ?>" value="Save">
                            </li>
                            <li class="col-2">
                                <input class="btn btn-light" Type="submit" name="cancel<?php echo"$i"; ?>" value="Cancel">
                            </li>
                        </ul>
                        </form>
                    </div>
                    </div>
                </div>
                <?php $i++;}?>
            </div>
        </li>
    </ul>
</div>
<div class="payment-option"> 
    <form action="" method="post">
    <input type="radio" id="male" name="gender" value="Cash on Delivery" required>
    <label for="male">Cash on Delivery</label><br>
    <input type="radio" id="female" name="gender" value="Debit Card/Credit Card" required>
    <label for="female">Debit Card/Credit Card</label><br>
    <input type="radio" id="other" name="gender" value="UPI" required>
    <label for="other">UPI</label></br>
    <input type="radio" id="other" name="gender" value="net banking" required>
    <label for="other">Net Banking</label>
</div>
<div class="payment-footer">
    <?php
        include('footer.php');
    ?>
</div>
<div class="payment-summery">
        <h5>Summery</h5>
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
                <button type="submit" class="btn btn-dark" id="checkout" name="pay">Pay</button>
                <?php }
                else{?>
                <a href="signup.php" class="btn btn-dark">Login To Checkout</a>
                <?php }?>
            </li>
        </ul>
        </form>
    </div>
<?php
    if(isset($_POST['savenew'])){
        $query="update delivery_address set selected=0 where user_id='$_SESSION[user_id]'";
        $db_handle->runQuery($query);
        $query="insert into delivery_address(id,user_id,name,phone,pin,locality,address,city,state,landmark,alternate_phone,type,selected)
        values(Null,'$_SESSION[user_id]','$_POST[name]','$_POST[phone]','$_POST[pin]','$_POST[locality]','$_POST[address]','$_POST[city]',
        '$_POST[state]','$_POST[landmark]','$_POST[altphone]','$_POST[type]',1)";
        if($result=$db_handle->runQuery($query)){
            echo"<script>alert('address added successfully please refersh')</script>";
            echo"<script>window.location.href='payment.php'</script>";
        }
        else{
            echo"<script>alert('address not added')</script>";
            echo"<script>window.location.href='payment.php'</script>";
        }
    }
    for($j=1;$j<$i;$j++){
        if(isset($_POST['saveupdate'.$j])){
            $query="update delivery_address set name='".$_POST['name'.$j]."',phone='".$_POST['phone'.$j]."',pin='".$_POST['pin'.$j]."',
            locality='".$_POST['locality'.$j]."',address='".$_POST['address'.$j]."',city='".$_POST['city'.$j]."',state='".$_POST['state'.$j]."',
            landmark='".$_POST['landmark'.$j]."',alternate_phone='".$_POST['altphone'.$j]."',type='".$_POST['type'.$j]."'
            where id=".$_POST['id'.$j]."";
            $result=$db_handle->runQuery($query);
            if(isset($_POST['setas-default'])){
                $query1="update delivery_address set selected=1 where id=".$_POST['id'.$j]."";
                $query2="update delivery_address set selected=0 where not(id=".$_POST['id'.$j].") and user_id='$_SESSION[user_id]'";
                $result1=$db_handle->runQuery($query1);
                $result2=$db_handle->runQuery($query2);
            }
            if($result==true || $result1==true || $result2==true){     
                echo"<script>alert('address updated successfully please refresh')</script>";
                echo"<script>window.location.href='payment.php'</script>";
            }
            else{
                echo"<script>alert('address not updated')</script>";
                echo"<script>window.location.href='payment.php'</script>";
            }
        }
    }
    if(isset($_POST['pay'])){
    $query="select * from delivery_address where selected=1 and user_id='$_SESSION[user_id]'";
    $result=$db_handle->runQuery($query);
    if($result->num_rows>0){
        $delivery_address=$result->fetch_assoc();
        $count=count($_SESSION['cart']);
        if($count>0){
            include('order_id.php');
            $item=$_SESSION['cart'];
            $order_id=$id;
            $query="insert into order_address(id,order_id,name,phone,pin,locality,address,city,state,landmark,alternate_phone,type) values(Null,
            '".$order_id."','".$delivery_address['name']."','".$delivery_address['phone']."','".$delivery_address['pin']."',
            '".$delivery_address['locality']."','".$delivery_address['address']."','".$delivery_address['city']."','".$delivery_address['state']."',
            '".$delivery_address['landmark']."','".$delivery_address['alternate_phone']."','".$delivery_address['type']."')";
            $db_handle->runQuery($query);
            $query="insert into customer_order(id,order_id,total,delivery_charge,itemtotal,date,time,status,user_id,payment_method,txnid) 
            values(Null,'".$order_id."','".$total."','".$delivery."','".$itemtotal."',CURDATE(),CURTIME(),'placed',
            '".$_SESSION['user_id']."','online','xxxxxxx')";
            $result=$db_handle->runQuery($query);
            if($result==true){
                foreach ($item as $key=>$value){
                    $quantity=$item[$key]['quantity'];
                    $product_id=$item[$key]['product_id'];
                    $size=$item[$key]['size'];
                    $query1="insert into order_items(id,order_id,product_id,quantity,size) values(Null,'$order_id','$product_id','$quantity','$size')";
                    $result1=$db_handle->runQuery($query1);
                }
                if($result1==true){
                        unset($_SESSION['cart']);
                        echo"<script>window.location.href='order_placed.php?order_id=$order_id'</script>";
                    }
            }
        }
        else{
            echo"<script>alert('cart is empty');</script>";
            echo"<script>window.location.href='index.php'</script>";
        }
    }
    else{
        echo"<script>alert('Please Add a Delivery Address');</script>";
        echo"<script>window.location.href='payment.php'</script>";
    }
}
?>
 