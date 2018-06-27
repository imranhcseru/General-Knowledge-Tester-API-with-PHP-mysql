<?php
	include('header.php');
	require('db_connect.php');
?>
<section>
	<span class="label"><h2>Sign In To Participate</h2></span>
	<form action="" method="POST" enctype="multipart">
		<span class="label">Email:</span><br>
		<input class="input" type="text" name="email" placeholder="Username" value=""><br>
		<span class="label">Password:</span><br>
		<input class="input" type="Password" name="password" placeholder="Password" value=""><br>	
		<button type="submit" class="game-btn" name = "sign-in-btn">Sign In</button>				
	</form>

	<span class="label"><h2>Don't have an account?</h2></span>
	<form action="" method="POST" enctype="multipart">
		<button type="submit" class="game-btn" name = "register-btn">Register Now</button>
	</form>
</section>
<?php 
	if(isset($_POST['sign-in-btn'])){
		$submit_email = $_POST['email'];
		$submit_pass = $_POST['password'];
		if(!empty($submit_email) and !empty($submit_pass)){
			$query = "SELECT id FROM users where email = '$submit_email' AND password = '$submit_pass'";
			if($query_run = mysqli_query($con,$query)){
				$query_num_rows = mysqli_num_rows($query_run);
				if($query_num_rows == 0){
					header('Location:wrong.php');
				}
				else{
					session_start();
					$name_query = "SELECT * FROM users where email = '$submit_email'";
					$result = mysqli_query($con,$name_query)->fetch_assoc();
					$_SESSION["name"] = $result['name'];
					$_SESSION["email"] = $result['email'];
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
	}
?>
<?php
	include('footer.php');
?>