<?php
include('header.php');
$order_id=$_REQUEST['order_id'];
?>
    <div class="order">
        <?php
            $query="select * from customer_order where order_id='$order_id'";
            $result=$db_handle->runQuery($query);
            if($result->num_rows>0){
            $customer_order=$result->fetch_assoc();
        ?>
            <div class="row justify-content-center">
                  <h5>Your Order&nbsp<span class="badge badge-success"><?php echo $customer_order['status']; ?></span></h5>
            </div>
            <hr>
            <div class="row justify-content-center">
                  <h6>Transaction&nbsp<span class="badge badge-success">Success</span></h6>
            </div>
            <div class="row justify-content-center">
                  <h6>Transaction ID- <?php echo $customer_order['txnid']; ?></h6>
            </div>
            <div class="row justify-content-center">
                <h6>Order ID- <?php echo $order_id; ?></h6>
            </div>
            <?php
            $query="select * from order_address where order_id='$order_id'";
            $result=$db_handle->runQuery($query);
            $order_address=$result->fetch_assoc();
            ?>
            <div class="row justify-content-center" style="margin-top: 20px;">
                <div class="col-2" style="margin-top: 20px;">
                    <h6>Delivery Address-</h6>
                </div>
                <div class="col-3">
                    <h6><?php echo $order_address['name']; ?>&nbsp<span class="badge badge-primary"><?php echo $order_address['type']; ?></span></h6>
                    <div style="width: 500px;"><?php echo $order_address['address']; ?>, <?php echo $order_address['locality']; ?>,
                    <?php echo $order_address['city']; ?>, <?php echo $order_address['state']; ?>- <?php echo $order_address['pin']; ?></div>
                    <h6>Phone No.- <?php echo $order_address['phone']; ?></h6>
                </div>
            </div>
            <div class="row justify-content-center p-4">
            <h6>Thank you for shopping from e-ShoppingZone<br>Your order will be shipped to you soon.</h6>
            <table class="table table-borderless">
                <thead class="table-bordered">
                    <tr>
                    <th>sl</th>
                    <th>Image</th>
                    <th>product</th>
                    <th>size</th>
                    <th>color</th>
                    <th>quantity</th>
                    <th>price</th>
                    <th>discount</th>
                    <th>net price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        $query="select * from order_items where order_id='$order_id'";
                        $result1=$db_handle->runQuery($query);
                        while($order_items=$result1->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $i ;?></td>
                        <?php 
                        $query1="select img from product_img where product_id='$order_items[product_id]' limit 1";
                        $result2=$db_handle->runQuery($query1);
                        $pimg=$result2->fetch_assoc();
                        ?>
                        <td><img src="images/<?php echo $pimg['img'];?>" alt=""></td>
                        <?php 
                        $query1="select* from product where product_id='$order_items[product_id]'";
                        $result3=$db_handle->runQuery($query1);
                        $product=$result3->fetch_assoc();
                        ?>
                        <td><?php echo $product['product_name'] ;?></td>
                        <td><?php echo $order_items['size'] ;?></td>
                        <td>None</td>
                        <td><?php echo $order_items['quantity'] ;?></td>
                        <td><?php echo $product['price'] ;?></td>
                        <td><?php echo round($product['discount']) ;?>%</td>
                        <td><?php echo $product['net_price'] ;?></td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
                <tfoot class="justify-content-right">
                  <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                    <td>
                        <b>Subtotal</b>
                    </td>
                    <td>Rs <?php echo $customer_order['itemtotal']; ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                    <td>
                        <b>Delivery</b>
                    </td>
                    <td>Rs <?php echo $customer_order['delivery_charge']; ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                    <td class="table-primary"><b>Total</b></td>
                    <td class="table-primary">Rs <?php echo $customer_order['total']; ?></td>
                </tr>
                </tfoot>
            </table>
        </div>
        <?php
        }    
        ?>
    </div>
</div>
    <div class="mobile-order">
        <?php
            $query="select * from customer_order where order_id='$order_id'";
            $result=$db_handle->runQuery($query);
            if($result->num_rows>0){
            $customer_order=$result->fetch_assoc();
        ?>
            <div class="row justify-content-center">
                  <h5>Your Order&nbsp<span class="badge badge-success"><?php echo $customer_order['status']; ?></span></h5>
            </div>
            <hr>
            <div class="row justify-content-center">
                  <h6>Transaction&nbsp<span class="badge badge-success">Success</span></h6>
            </div>
            <div class="row justify-content-center">
                  <h6>Transaction ID- <?php echo $customer_order['txnid']; ?></h6>
            </div>
            <div class="row justify-content-center">
                <h6>Order ID- <?php echo $order_id; ?></h6>
            </div>
            <?php
            $query="select * from order_address where order_id='$order_id'";
            $result=$db_handle->runQuery($query);
            $order_address=$result->fetch_assoc();
            ?>
            <div class="row justify-content-center" style="margin: 10px 80px;width: 150px;">
                <div style="margin-top: 20px;">
                    <h6>Delivery Address</h6>
                </div>
                <div class="row justify-content-center">
                    <h6><?php echo $order_address['name']; ?>&nbsp<span class="badge badge-primary"><?php echo $order_address['type']; ?></span></h6>
                    <div class="row justify-content-center">
                        <?php echo $order_address['address']; ?>,
                        <?php echo $order_address['locality']; ?>,<br>
                    <?php echo $order_address['city']; ?>, <?php echo $order_address['state']; ?>- <?php echo $order_address['pin']; ?></div>
                    <h6>Phone No.- <?php echo $order_address['phone']; ?></h6>
                </div>
            </div>
            <div class="row justify-content-center p-4">
            <h6>Thank you for shopping from Madefru<br>Your order will be shipped to you soon.</h6>
            </div>
            <?php
                        $i=1;
                        $query="select * from order_items where order_id='$order_id'";
                        $result1=$db_handle->runQuery($query);
                        while($order_items=$result1->fetch_assoc()){
                    ?>
                    <div class="row justify-content-center"><b>SL- <?php echo $i ;?></b></div>
            <ul class="row" style="border: 1px solid rgb(70, 71, 70); margin: 5px; padding: 5px;">
                <li class="col-4">
                    <?php 
                        $query1="select img from product_img where product_id='$order_items[product_id]' limit 1";
                        $result2=$db_handle->runQuery($query1);
                        $pimg=$result2->fetch_assoc();
                        ?>
                        <img src="images/<?php echo $pimg['img'];?>" alt="">
                </li>
                <li class="col-8">
                    <?php 
                        $query1="select* from product where product_id='$order_items[product_id]'";
                        $result3=$db_handle->runQuery($query1);
                        $product=$result3->fetch_assoc();
                        ?>
                        <?php echo $product['product_name'] ;?><br>
                        size- <?php echo $order_items['size'] ;?>,
                        color- None<br>
                        qty- <?php echo $order_items['quantity'] ;?>
                        price- <?php echo $product['price'] ;?><br>
                        discount- <?php echo round($product['discount']) ;?>%<br>
                        net price- <?php echo $product['net_price'] ;?>
                </li>
            </ul>
            <?php
        $i++; }    
        ?>
        <div style="padding-left: 110px;">
            <h6><br>Subtotal- Rs <?php echo $customer_order['itemtotal']; ?></h6>
            <h6><br>Delivery- Rs <?php echo $customer_order['delivery_charge']; ?></h6>
            <h6><br>Total- Rs <?php echo $customer_order['total']; ?></h6>
        </div>
        </div>
        <?php
        }    
        ?>
    </div>
<div class="user-account-footer">
    <?php include('footer.php'); ?>
</div>