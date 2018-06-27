<?php 
	header('Content-Type:text/html; charset=utf-8');
	require('db_connect.php');
	include('header.php');
	session_start();
?>

	<section>
		<h2 class="score-board"><?php echo "You Obtained ".$_SESSION["point_for_answer"]." For this  answer."?></h2>
		<?php
			$last_score = 0;
			
			function total_score($total_score,$score){
				$total_score = $total_score + $score;
				return $total_score;
			} 
			$final_score = total_score($last_score,$_SESSION["point_for_answer"]);
			$_SESSION["final_score"] =  $final_score;
		?>

		<h2 class="score-board"><?php echo "You Total Score ".$_SESSION["final_score"];?></h2>
		<form action = "" method="POST" class="game-content">
			<button type="submit" class="game-btn" name = "finish-btn">Finish Quiz</button>
		</form>

		<form action = "" method="POST" class="game-content">
			<button type="submit" class="game-btn" name = "next-btn">Next Question</button>
		</form>

	</section>
	<?php
		if(isset($_POST['finish-btn'])){
			$_SESSION["count"] = 16;
			header('Location:final-score-board.php');
		}
		if(isset($_POST['next-btn'])){
			header('Location:game.php');
		}
	?>
<?php
	include('footer.php');
?>