<?php
	include('header.php');
	require('db_connect.php');
?>
<section>
	<h2>Register An account</h2>
	<form action="" method="POST" enctype="multipart">
		<span class="label">Name:</span><br>
		<input class="input" type="text" name="name" placeholder="Name" value="" required><?php echo $name_error;?><br>		
		<span class="label">Email:</span><br>
		<input class="input" type="text" name="email" placeholder="Email" value="" required><?php echo $email_error;?><br>
		<span class="label">Password:</span><br>
		<input class="input" type="Password" name="password" placeholder="Password" value="" required><br>	
		<span class="label">Confirm Password:</span><br>
		<input class="input" type="Password" name="confirm_password" placeholder="Confirm Password" value="" required><?php echo $password_error;?><br>	
		<button type="submit" class="game-btn" name = "register-btn">Register</button>				
	</form>
	<?php
		if(isset($_POST['register-btn'])){
			$name = mysqli_real_escape_string($con,$_POST['name']);
			$email = mysqli_real_escape_string($con,$_POST['email']);
			$password = mysqli_real_escape_string($con,$_POST['password']);
			$c_password = mysqli_real_escape_string($con,$_POST['confirm_password']);
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
	  			$name_error = "Invalid name"; 
			}
			elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$email_error = "Invalid email address";
			}
			elseif($password != $c_password){
				$password_error = "Password Didn't match";
			}
			else{
				$check_query = "SELECT * FROM users where email = '$email'";
				$query = mysqli_query($con,$check_query);
				$row_num = mysqli_num_rows($query);
				echo $row_num;
				if($row_num > 0){
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
		else{
			die();
		}
	?>
	
</section>


<?php
	include('footer.php');
?>