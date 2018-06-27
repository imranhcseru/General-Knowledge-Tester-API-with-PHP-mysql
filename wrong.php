<?php
	include('header.php');
	require('db_connect.php');
?>
<section>
	<h2>Invalid Username or Password</h2>
	<h2>Sign In To Participate</h2>
	<form action="" method="POST" enctype="multipart">
		<span class="label">Email:</span><br>
		<input class="input" type="text" name="email" placeholder="Username" value=""><br>
		<span class="label">Password:</span><br>
		<input class="input" type="Password" name="password" placeholder="Password" value=""><br>	
		<button type="submit" class="game-btn" name = "sign-in-btn">Sign In</button>				
	</form>

	<h2>Don't Have an account ?</h2>
	<form action="" method="POST" enctype="multipart">
		<button type="submit" class="game-btn" name = "register-btn">Register Now</button>
	</form>
</section>
<?php 
	if(isset($_POST['sign-in-btn'])){
		$submit_email = mysqli_real_escape_string($con,$_POST['email']);
		$submit_pass = mysqli_real_escape_string($con,$_POST['password']);
		if(!empty($submit_email) and !empty($submit_pass)){
			$query = "SELECT id FROM users where email = '$submit_email' AND password = '$submit_pass'";
			if($query_run = mysqli_query($con,$query)){
				$query_num_rows = mysqli_num_rows($query_run);
				if($query_num_rows == 0){
					header('Location:wrong.php');
				}
				else{
					header('Location:home.php');
				}
			}
		}
		else{
			echo "Enter Username and Password!";
		}
	}
	if(isset($_POST['register-btn'])){
		header('Location:register.php');
	}?>
<?php
	include('footer.php');
?>