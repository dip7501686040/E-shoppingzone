<?php
	include('header.php');
?>
<form action="signup.php" method="POST">
<div id="login-box">
		<div class="left-box">
			<h1> Login</h1>

			<input type="text" name="phone" placeholder="phone"/>
			<input type="password" name="password" placeholder="Password"/>
			<input type="submit" name="login-button" value="Login"/>

		</div>
		<div class="right-box">

			<span class="signinwith">Login in with<br/>social Network
			</span>


			<button class="social facebook">Log in with Facebook</button>
			<button class="social twitter">Log in with Twitter</button>
			<button class="social google">Log in with Google+</button>


	</div>
	<div class="or">OR</div>
	<div class="goto-signup" onclick="goto_signup()">
		 New to E-ShoppingZone?Create an account
	</div>
	<div class="close">
		<a href="index.php"><i class="fa fa-times"></i></a> 
	</div>
</div>
</form>
	<form method="POST">	
	<div id="signup-box">
		<div class="left-box">
			<h1> Sign up</h1>

			<input type="text" name="fname" placeholder="First Name"/>
			<input type="text" name="lname" placeholder="Last Name"/>
			<input type="email" name="email" placeholder="Email"/>
			<input type="text" name="phone" placeholder="Phone No."/>
			<input type="password" name="password" placeholder="Password"/>

			<input type="password" name="password2" placeholder="Retype Password"/>

			<input id="signup-button" type="submit" name="signup-button" value="Sign up"/>
		</div>
		<div class="right-box">
			<span class="signinwith">Sign in with<br/>social Network
			</span>

			<button class="social facebook">Log in with Facebook</button>
			<button class="social twitter">Log in with Twitter</button>
			<button class="social google">Log in with Google+</button>
			
		</div>
		<div class="or">OR</div>
		<div class="goto-login" onclick="goto_login()">
			Existing user?Login
	   </div>
	   <div class="close">
		   <a href="index.php"><i class="fa fa-times"></i></a> 
	    </div>
	</div>
	</form>
	<script>
		function goto_signup(){
			document.getElementById('login-box').style.display="none";
			document.getElementById('signup-box').style.display="block";
		}
		function goto_login(){
			document.getElementById('signup-box').style.display="none";
			document.getElementById('login-box').style.display="block";
		}
	</script>
</body>

</html>
<?php
	if(isset($_POST['signup-button'])){
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$password=$_POST['password'];
	include('dbcon.php');
	$query="insert into buyer (buyer_id,buyer_fname,buyer_lname,buyer_email,buyer_phone,buyer_pass) values(NULL,'$fname','$lname','$email',$phone,'$password')";
	if(mysqli_query($con,$query))
	{
		?>
			<script>
					alert("Your account has been cretated");
			</script>
			<?php
	}
	else{
		?>
		<script>
			goto_login();
			function goto_login(){
					document.getElementById('signup-box').style.display="block";
					document.getElementById('login-box').style.display="none";
					alert("failed to create your account please try again");
			};
		</script>
		<?php
	}
	}

	if(isset($_POST['login-button'])){

		$phone=$_POST['phone'];
		$password=$_POST['password'];
		include'dbcon.php';
		$query="select buyer_id,buyer_phone,buyer_pass from buyer where buyer_phone='$phone' and buyer_pass='$password'";
		$resultset=mysqli_query($con,$query);
		if(mysqli_num_rows($resultset)==1){
			$data=mysqli_fetch_assoc($resultset);
			$id=$data['buyer_id'];
			$phone=$data['buyer_phone'];
			$password=$data['buyer_pass'];
			$_SESSION['b_id']=$id;
			header('location:logedin_index.php');
		}
	}
?>