
<?php  
	header('Content-Type:text/html; charset=utf-8');
	include('header.php');
	session_start();
?>
		<section>
			<form action = "rule.php" method="POST" class="game-content">
				<button type="submit" class="game-btn" name = "rule-btn">Rule</button><br>
			</form>
			<form action = "game.php" method="POST" class="game-content">
				<button type="submit" class="game-btn" id="start-btn" name = "start-game-btn">Start Game</button><br>
			</form>
			<form action = "high-score.php" method="POST" class="game-content">
				<button type="submit" class="game-btn" name = "high-score-btn">High Score</button>
			</form>
			<?php
				include('logout.php');
			?>
		</section>
<?php  
	include('footer.php');
?>