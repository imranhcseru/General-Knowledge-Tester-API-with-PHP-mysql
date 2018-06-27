<?php
	header('Content-Type:text/html; charset=utf-8');
	require('db_connect.php');

?>
<!DOCTYPE html>
<html lang="bn">
<head>
	<title>General Knowledge tester</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
</head>
<body>
	<div id = "container">
		<header id = "header">
			<h1>Test Your General Knowledge for Competetive Exam</h1>
		</header>
		<section>
			<form action = "" method="POST" class="game-content">
				<h2>Rules:</h2>
				
				<?php 
					$serial_no = 1;
					$show_query = "SELECT * FROM game_rules";
					$result = mysqli_query($con,$show_query);
					while($row = mysqli_fetch_assoc($result)){
						$rules[] = $row;
					}
					$serial_no = 0;
				?>	
				<?php 
					foreach ($rules as $rules) {
						$serial_no++;
					
				?>
				<table id = "rule">
					<td>
						<th class = "rule"><?php echo $serial_no;?></th>
						<th class = "rule"><?php echo $rules['rule'];?></th>
					</td>
					
				</table>	
				<?php
					}
				?>
			<button type="submit" class="game-btn" name = "home-btn">Back To Home</button>
			</form>
			<?php
				if(isset($_POST['home-btn'])){
					header('Location:home.php');
				}
			?>
		</section>
		<footer>
			<form class="social-login">
				<h3>Contact me:</h3>
				<a href="#" class="contact-btn"><i class="fab fa-google-plus">Google</i></a>
				<a href="#" class="contact-btn"><i class="fab fa-facebook">facebook</i></a>
				<a href="#" class="contact-btn"><i class="fab fa-github">Git-hub</i></a>
			</form>
			
		</footer>
	</div>
	<script type="text/javascript" src="javascript.js"></script>
</body>
</html>