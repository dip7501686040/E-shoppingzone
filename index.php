<?php include('header.php');?>
<!-- banner -->
    <script>
        $(document).ready(function(){
            $(".carousel-item:first").addClass("active");
        });
    </script>
    <div class="banner">
        <div id="carouselExampleFade" class="carousel slide" data-ride="carousel"data-interval="3000">
            <div class="carousel-inner">
            <?php
            $baner="select* from banner";
            $runban=$db_handle->runQuery($baner);
            while($lopban=mysqli_fetch_array($runban)){
            
            ?>
                <div class="carousel-item">
                    <img src="image/<?php echo $lopban['banner_img']; ?>" class="d-block w-100" alt="...">
                </div>
            <?php } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- //banner -->
    <!-- shop -->
    <!-- new items -->
    <div class="shop">
        <div class="heading">
            <span>NEW ITEMS FROM MADEFRU</span>
            <a href="">view all</a>
        </div>
        <div id="new-item" class="owl-carousel">
        <?php
            $query="select * from product where new_item=1 order by product_id asc limit 6";
            $result=$db_handle->runQuery($query);
            while($row=$result->fetch_assoc()){
        ?>
        <div class="item">
            <div class="card">
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                <?php
                    $query1="select img from product_img where product_id='$row[product_id]'";
                    $result1=$db_handle->runQuery($query1);
                    $row1=$result1->fetch_assoc(); 
                ?>
                    <img class="card-img-top" src="image/<?php echo $row1['img'];?>" alt="Card image cap">
                </a>
                <div class="card-body">
                    <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                        <h6 class="card-title"><?php echo "$row[product_name]";?></h6>
                        <div class="ratings">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </a>
                    <p><b>Rs. <del><?php echo "$row[price]";?></del> <?php echo "$row[net_price]";?></b><br> 
                    <?php echo round($row['discount']);?>% discount
                    <i class="fas fa-share-alt text-muted float-right my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
                    <i class="fas fa-heart text-muted float-right my-1 mr-3" data-toggle="tooltip" data-placement="top" title="I like it"></i>
                    </p>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="clearfix"></div>
        </div>
        <!-- //new items -->
        <!-- popular item -->
        <div class="heading">
            <span>POPULAR ITEMS FROM MADEFRU</span>
            <a href="">view all</a>
        </div>
        <div id="popular-item" class="owl-carousel">
        <?php
            $query="select * from product where popular_item=1 order by product_id asc limit 6";
            $result=$db_handle->runQuery($query);
            while($row=$result->fetch_assoc()){
        ?>
        <div class="item">
            <div class="card">
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>" style="position: relative;">
                <?php
                    $query1="select img from product_img where product_id='$row[product_id]'";
                    $result1=$db_handle->runQuery($query1);
                    $row1=$result1->fetch_assoc(); 
                ?>
                    <img class="card-img-top" src="image/<?php echo $row1['img'];?>" alt="Card image cap">
                </a>
                <div class="card-body">
                    <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>" style="position: relative;">
                        <h6 class="card-title"><?php echo "$row[product_name]";?></h6>
                        <div class="ratings">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </a>
                    <p><b>Rs. <del><?php echo "$row[price]";?></del> <?php echo "$row[net_price]";?></b><br> 
                    <?php echo round($row['discount']);?>% discount
                    <i class="fas fa-share-alt text-muted float-right my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
                    <i class="fas fa-heart text-muted float-right my-1 mr-3" data-toggle="tooltip" data-placement="top" title="I like it"></i>
                    </p>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="clearfix"></div>
        </div>
        <!-- //popular item -->
        <!-- hit item -->
        <div class="heading">
            <span>ALL TIME HIT ITEMS FROM MADEFRU</span>
            <a href="">view all</a>
        </div>
        <div id="hit-item" class="owl-carousel">
        <?php
            $query="select * from product where hit_item=1 order by product_id asc limit 6";
            $result=$db_handle->runQuery($query);
            while($row=$result->fetch_assoc()){
        ?>
        <div class="item">
            <div class="card">
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                <?php
                    $query1="select img from product_img where product_id='$row[product_id]'";
                    $result1=$db_handle->runQuery($query1);
                    $row1=$result1->fetch_assoc(); 
                ?>
                    <img class="card-img-top" src="image/<?php echo $row1['img'];?>" alt="Card image cap">
                </a>
                <div class="card-body">
                    <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                        <h6 class="card-title"><?php echo "$row[product_name]";?></h6>
                        <div class="ratings">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </a>
                    <p><b>Rs. <del><?php echo "$row[price]";?></del> <?php echo "$row[net_price]";?></b><br> 
                    <?php echo round($row['discount']);?>% discount
                    <i class="fas fa-share-alt text-muted float-right my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
                    <i class="fas fa-heart text-muted float-right my-1 mr-3" data-toggle="tooltip" data-placement="top" title="I like it"></i>
                    </p>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="clearfix"></div>
        </div>
        <!-- //hit item -->
    </div>
    <!-- //shop -->
<!-- footer -->
<div class="index-footer">
<?php include('footer.php'); ?>
</div>
<!-- //footer -->