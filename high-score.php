<?php
	header('Content-Type:text/html; charset=utf-8');
	require('db_connect.php');
	include('header.php');
	session_start();

?>

		<section>
			<form action = "" method="POST" class="game-content">
				<span class="label"><h2>Hall of Fame</h2></span>
				
				<?php 
					$serial_no = 1;
					$show_query = "SELECT * FROM score_board ORDER BY score DESC";
					$result = mysqli_query($con,$show_query);
					while($row = mysqli_fetch_assoc($result)){
						$score[] = $row;
					}
					$serial_no = 0;
				?>	
				<table id="score">
					<tr>
						<th>Serial</th>
						<th>Name</th>
						<th>Score</th>
					</tr>
				<?php 
					$top_five = 5;
						foreach ($score as $score) {
							$serial_no++;
							if($serial_no>$top_five)
								break;
					
				?>
					<tr>
						<th class = "scorer"><?php echo $serial_no;?></th>
						<th class = "scorer"><?php echo $score['name'];?></th>
						<th class = "scorer"><?php echo $score['score'];?></th>
					</tr>
						
				<?php

					}
				?>
				</table>
			<button type="submit" class="game-btn" name = "home-btn">Back To Home</button>
			</form>
			<?php
				if(isset($_POST['home-btn'])){
					header('Location:home.php');
				}
			?>
		</section>
<?php  
	include('footer.php');
?>