<?php include('header.php');?>
<form action="" method="POST">
	<div id="signup-box">
		<div class="left-box">
			<h1> Sign up</h1>

			<input type="text" name="fname" placeholder="First Name" required/>
			<input type="text" name="lname" placeholder="Last Name" required/>
			<input type="email" name="email" placeholder="Email" required/>
			<input type="text" name="phone" placeholder="Phone No." pattern="[1-9]{1}[0-9]{9}"
			title="only 10 digits mobile number allowed" required/>
			<input type="password" name="password" placeholder="Password" required/>

			<input type="password" name="password2" placeholder="Retype Password" required/>

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
<form method="POST">	
	<div id="login-box">
		<div class="left-box">
			<h1> Login</h1>

			<input type="text" name="phone" placeholder="Phone"title="only 10 digits mobile number allowed"
			pattern="[1-9]{1}[0-9]{9}" required/>
			<div>Or</div>
			<input type="email" name="email" placeholder="Email"/>
			<input type="password" name="password" placeholder="Password" required/>
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
			New to MadeFru?Create an account
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

<?php
	if(isset($_POST['signup-button'])){
		include('user-id.php');
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$password=$_POST['password'];
		$query1="select phone from user where phone='$phone'";
		$query2="select email from user where email='$email'";
		$query3="INSERT INTO `user` (`id`, `user_id`, `name`, `fname`, `lname`, `dob`, `email`, `address`, `city`, 
		`state`, `pincode`, `phone`, `password`, `date_of_creation`, `time_of_creation`, `refered_by`, `country`) 
		VALUES (NULL, '$id', '$fname $lname', '$fname', '$lname', NULL, '$email', NULL, NULL, NULL, NULL, '$phone', 
		'$password', CURDATE(), CURTIME(), NULL, NULL)";
		$rowcount1=$db_handle->numOfRows($query1);
		$rowcount2=$db_handle->numOfRows($query2);
		if($rowcount1==1){
			?>
			<script>
				alert("Phone No. already exists please login");
				document.getElementById('login-box').style.display="block";
				document.getElementById('signup-box').style.display="none";
			</script>
			<?php
		}
		elseif($rowcount2==1){
			?>
			<script>
				alert("email already exists please login");
				document.getElementById('login-box').style.display="block";
				document.getElementById('signup-box').style.display="none";
			</script>
			<?php	
		}
		else{
			$result=$db_handle->runQuery($query3);
			if($result==true){
				$_SESSION['phone']=$phone;
				$_SESSION['email']=$email;
				$_SESSION['user_id']=$id;
				$_SESSION['user_fname']=$fname;
				?>
				<script>
					window.location.href="index.php";
				</script>
				<?php
			}
			else{
				?>
				<script>
					alert("Sorry, Try again");
					window.location.href="signup.php";
					document.getElementById('login-box').style.display="none";
					document.getElementById('signup-box').style.display="block";

				</script>
				<?php
			}
		}
	}

	if(isset($_POST['login-button'])){

		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$query1="select phone from user where phone='$phone'";
		$query2="select email from user where email='$email'";
		$query3="select user_id,fname,phone,email from user where password='$password' and (phone='$phone' or email='$email')";
		$rowcount1=$db_handle->numOfRows($query1);
		$rowcount2=$db_handle->numOfRows($query2);
		if($rowcount1!=1 && $rowcount2!=1){
			?>
			<script>
				alert("phone or email dosen't exists, plz Signup")
				document.getElementById('login-box').style.display="none";
				document.getElementById('signup-box').style.display="block";
			</script>
			<?php	
		}
		else{
			$result=$db_handle->runQuery($query3);
			if(mysqli_num_rows($result)==1){
				$data=mysqli_fetch_assoc($result);
				$_SESSION['user_id']=$data['user_id'];
				$_SESSION['user_fname']=$data['fname'];
				$_SESSION['phone']=$data['phone'];
				$_SESSION['email']=$data['email'];
				?>
				<script>
					window.location.href="index.php";
				</script>
				<?php
			}
			else{
				?>
				<script>
					alert("Incorrect password");
					document.getElementById('login-box').style.display="block";
					document.getElementById('signup-box').style.display="none";
				</script>
				<?php
			}
		}
	}
?>

