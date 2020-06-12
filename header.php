<?php
session_start(); 
include('dbcontroller.php');
$db_handle=new DBController();
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    $user_id= $_SESSION['user_id'];
	$user_fname= $_SESSION['user_fname'];
	$user_phone=$_SESSION['phone'];
	$user_email=$_SESSION['email'];
}
else {
    $user_id='USER';$user_fname='Signin';
}

if(isset($_POST['add-to-cart'])){
    if(isset($_POST['size'])){
            $size=$_POST['size'];
            }
            else{
                $size='None';
            }

	if(isset($_SESSION['cart'])){
	    $item_array_id=array_column($_SESSION['cart'],"product_id");
	    if(in_array($_POST['product_id'],$item_array_id)){
            echo "<script>alert('product is already added')</script>";
			echo "<script>window.location='cart.php'</script>";
		}
		else{
           $count=count($_SESSION['cart']);
           $item_array=array(
			'product_id'=>$_POST['product_id'],
            'quantity'=>$_POST['quantity'],
            'size'=>$size,
		);
		$_SESSION['cart'][$count]=$item_array;
		}
	
	}
	else{
		$item_array=array(
			'product_id'=>$_POST['product_id'],
            'quantity'=>$_POST['quantity'],
            'size'=>$size,
		);
		$_SESSION['cart'][0]=$item_array;
		
	}
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-ShoppingZone</title>
    <!-- css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="css/index_style.css">
    <link rel="stylesheet" type="text/css" href="css/signup_style.css">
    <!--//css-->
    <!--bootstrap,jquery and proper.js-->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="css/owl.theme.default.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.5.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/owl.carousel.js"></script>
    <!--//-->
    <!--fontawsome cdn-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js" 
    integrity="sha256-EhSd26A4BBY7cx1qenrGNmgTke2gzkGS0HDPmLVVQ6w=" crossorigin="anonymous"></script>
    <!--//fontawsome cdn-->
    <!--google fonts-->

    <!--//google fonts-->
</head>
<body>
    <script>
        function toggleSidebar(){
                if(document.getElementById("header-menu").classList.toggle('active')){
                    document.getElementById("logo").style.display="none";
                }
                else{
                    document.getElementById("logo").style.display="block";
                }
            }
    </script>
    <!--header start-->

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
                <h4><a href="index.php">e-ShoppingZone</a></h4>
            </div>
            <div id="search-bar">
                <form action="">
                    <input type="text" name="search_box" placeholder="search...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div id="login">
                <a href="<?php if(isset($_SESSION['user_id'])){echo 'user_account.php';}else{echo 'signup.php';}?>" 
                    class="btn btn-light"><?php echo $user_fname;?></a>
            </div>
            <div id="notification">
                <a href=""><i class="fa fa-bell"></i></a>
            </div>
            <div id="wishlist">
                <a href=""><i class="fa fa-heart"></i></a>
            </div>
            <div class="cart">
                <?php
                if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                    $count=count($_SESSION['cart']);
                    ?>
            <a class="btn btn-dark" href="cart.php" role="button">
                <div class="cart-icon">
                        <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <span><div class="value"><?php echo $count; ?></div></span>
                </a>
                <?php }
                else{
                ?>
                <a class="btn btn-dark" href="empty_cart.php" role="button">
                <div class="cart-icon">
                        <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <span><div class="value">0</div></span>
                </a>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
        </div>

        <!--header end-->

        <!--navbar start-->

        <div id="navbar">
            <div class="fashion">
                <a href=""><img src="image/fashion.png"></a>
            </div>
            <div class="electronics">
                <a href=""><img src="image/electronics.png"></a>
            </div>
            <div class="kids">
                    <a href=""><img src="image/kids.png"></a>
            </div>
            <div class="study">
                    <a href=""><img src="image/study.png"></a>
            </div>
            <div class="home">
                    <a href=""><img src="image/home.png"></a>
            </div>
            <div class="gym">
                    <a href=""><img src="image/gym.png"></a>
            </div>
            <div class="sports">
                   <a href=""><img src="image/sports.png"></a>
            </div>
            <div class="audio">
                    <a href=""><img src="image/audio.png"></a> 
            </div>
        </div>
        <!--navbar end-->
</body>
</html>