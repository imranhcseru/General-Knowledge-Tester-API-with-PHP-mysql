<?php
	require('db_connect.php');
	header('Content-Type:text/html; charset=utf-8');
	include('header.php');
	session_start();
?>
<section>
		<h2><?php
		echo "Game Over";
	?><h2>

	<h2><?php
		$neat_total = $_SESSION["final_score"];
		$scorer = $_SESSION["name"];
		$insert_score = "INSERT into score_board(name,score) values('$neat_total','$scorer')";
		if(mysqli_query($con,$insert_score)){
			echo $scorer."<br>";
			echo "Your Score ".$neat_total;
		}
		

		$_SESSION["final_score"] = 0;
	?><h2>
	<form action = "high-score.php" method="POST" class="game-content">
		<button type="submit" class="game-btn" name = "high-score-btn">High Score</button>
	</form>
	<form action="" method="POST">
		<button type="submit" class="game-btn" name = "home-btn">Back To Home</button>
	</form>
	<?php
		if(isset($_POST['home-btn'])){
			header('Location:home.php');
		}
	?>
	<?php
		include('logout.php');
	?>
</section>
<?php
	include('footer.php');
?>