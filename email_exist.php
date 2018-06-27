<?php
	include('header.php');
	require('db_connect.php');
?>
<section>
	<h2>Email Already Exist</h2>
	<h2>Register An account</h2>
	<form action="" method="POST" enctype="multipart">
		<span class="label">Name:</span><br>
		<input class="input" type="text" name="name" placeholder="Name" value="" required><br>		
		<span class="label">Email:</span><br>
		<input class="input" type="text" name="email" placeholder="Email" value="" required><br>
		<span class="label">Password:</span><br>
		<input class="input" type="Password" name="password" placeholder="Password" value="" required><br>	
		<button type="submit" class="game-btn" name = "register-btn">Register</button>				
	</form>
</section>
<?php
	if(isset($_POST['register-btn'])){
		$name = mysqli_real_escape_string($con,$_POST['name']);
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$password = mysqli_real_escape_string($con,$_POST['password']);
		if(empty($name)){
			echo "Enter Your Name";
		}
		else{
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "Invalid email address";
			}
			else{
				$check_query = "SELECT * FROM users where email = '$email'";
				if(mysqli_num_rows($con,$check_query) > 0){
					header('Location:email_exist.php');
				}
				
				else{
					$insert_query = "INSERT into users(name,email,password) values('$name','$email','$password')";
					if(mysqli_query($con,$insert_query)){
						echo "Account created successfuly";
						header('Location:index.php');
					}
					else{
						echo "Something Wrong";
						echo "Try Again";
					}
				}

			}
		}
	}
?>
<?php
	include('footer.php');
?>