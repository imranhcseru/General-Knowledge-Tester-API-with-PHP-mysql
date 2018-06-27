<form action="" method="POST">
	<button type="submit" class="game-btn" name = "logout-btn">Log Out</button>
</form>
<?php
	if(isset($_POST['logout-btn'])){
		session_start();
		session_destroy();
		header('Location:index.php');
	}
?>