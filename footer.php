<!-- footer -->
<div id="footer">
    <div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-sm-6 col-xs-6">
				<div class="logo-block">
				    <a href="index.php" class="btn">e-ShoppingZone</a>
				</div>
				
			</div>
			<div class="col-md-2 col-sm-6 col-xs-6">
				<h2>Information</h2>
				<ul>
					<li><a href="about.php">About us</a></li>
					<li><a href="store.php">Store info</a></li>
					<li><a href="faq.php">FAQ's</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-6 neededlinks">
				<h2>Needed Links</h2>
				<ul style="padding: 0 0 0 0;">
					<li><a href="delivery.php">Delivery Policy</a></li>
					<li><a href="privacy.php">Privacy Policy</a></li>
					<li><a href="return.php">Return policy</a></li>
					<li><a href="terms.php">Terms & Condition</a></li>
				 
				</ul>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-6 contact">
				<h2>Contact With Us</h2>
				<ul>
					<li><span><i class="fa fa-phone-volume"></i></span> : +91 1234567890</li>
					<li><span><i class="fas fa-envelope"></i></span> : madefruonline@gmail.com</li>
					<li><span><i class="fas fa-envelope"></i></span> : +91 1234567890</li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-md-5">
				
			</div>
			<div class="col-md-3 ficon">
				<h2></h2>
				<ul class="icon">
					<li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
					<li><a href="#"><i class="fab fa-twitter-square"></i><a></li>
					<li><a href="#"><i class="fab fa-instagram"></i></a></li>
				</ul>
			</div>

			<div class="col-md-4">
				
			</div>

		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<div class="copy-right">
	<div class="container">
		<p>Copyright&copy; 2020 madefru. All rights reserved | Developed by Dipankar Saha</p>
	</div>
</div>
</div>
<script>
	$(document).ready(function(){
    $('#new-item').owlCarousel({
	autoWidth:true,
	nav: true,
    navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:6
        }
    },
})
$('#popular-item').owlCarousel({
	autoWidth:true,
	nav: true,
    navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:6
        }
    },
})
$('#hit-item').owlCarousel({
	autoWidth:true,
	nav: true,
    navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:6
        }
    },
})
});
</script>
</body>
</html>
<!-- //footer -->