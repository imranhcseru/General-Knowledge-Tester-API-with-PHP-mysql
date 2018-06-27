<?php 
	header('Content-Type:text/html; charset=utf-8');
	include('header.php');
	require('db_connect.php');
	session_start();
?>


<?php 
	$count = 0;
	$_SESSION["count"] = $count;
	
	function score_per_ques($ques_no){
		switch($ques_no){
			case 1:
				$point = 500;
				break;
			case 2:
				$point = 1000;
				break;
			case 3:
				$point = 2000;
				break;
			case 4:
				$point = 5000;
				break;
			case 5:
				$point = 10000;
				break;
			case 6:
				$point = 20000;
				break;
			case 7:
				$point = 40000;
				break;
			case 8:
				$point = 80000;
				break;
			case 9:
				$point = 160000;
				break;
			case 10:
				$point = 320000;
				break;
			case 11:
				$point = 640000;
				break;
			case 12:
				$point = 1250000;
				break;
			case 13:
				$point = 2500000;
				break;
			case 14:
				$point = 5000000;
				break;
			case 15:
				$point = 10000000;
				break;
			default:
				$point = 0;

		}
		return $point;
	}

	function questionGenerator(){
		$used_ques = array();
		while(1){
			$id = mt_rand(1,30);
			if(!in_array($id,$used_ques)){
				array_push($used_ques,$id);
					break;
			}
		}
		return $id;
	}
	$question_id = questionGenerator();
	$show_ques = "SELECT * FROM questions where id = '$question_id'";
	$result = mysqli_query($con,$show_ques)->fetch_assoc();

?>
	<section>
		<form action = "" method="POST" class="game-content" enctype="multipart">
			<label class="game_ques"></label><h4><?php echo $result['ques']?></h4>
			<input class="option-btn" type = "radio" name = "quiz" value = "op-a"><?php echo $result['option_a']?>
			<input class="option-btn" type = "radio" name = "quiz" value = "op-b"><?php echo $result['option_b']?><br>
			<input class="option-btn" type = "radio" name = "quiz" value = "op-c"><?php echo $result['option_c']?>
			<input class="option-btn" type = "radio" name = "quiz" value = "op-d"><?php echo $result['option_d']?>
			<button type="submit" class="game-btn" name = "game-submit-btn">submit</button>
			<button type="submit" class="game-btn" name = "home-btn">Back To Home</button>
		</form>
	</section>
		<?php
		if(isset($_POST['game-submit-btn'])){
			if($_POST['quiz'] == $result['correct_ans']){
				++$count;
				$point_for_answer = score_per_ques($count);
				$_SESSION["point_for_answer"] = $point_for_answer;
				header('Location:score_board.php');
			}
			else{
				$point_for_answer = 0;
				$_SESSION["point_for_answer"] = $point_for_answer;
				$count = 16;

			}
			if($count == 16){
				header('Location:final-score-board.php');	
			}
		}
		else{
			//echo <script>alert("Choose Your Answer?");</script>;
		}
		if(isset($_POST['home-btn'])){
			header('Location:home.php');
		}
	?>
<?php 
	include('footer.php');
?>

