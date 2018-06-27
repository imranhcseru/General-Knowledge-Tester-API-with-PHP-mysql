<?php
	header('Content-Type:text/html; charset=utf-8');
	require('db_connect.php');
	include('header.php');

?>

		<section>
			<form action = "" method="POST" class="game-content">
				<label>Question:</label>
				<textarea type="text" rows ="6" cols="60" name="question" placeholder="Enter  Question"></textarea><br>
				<label>Option A:</label>
				<input type="text" name="option-a" placeholder="Enter  Option-A"><br>
				<label>Option B:</label>
				<input type="text" name="option-b" placeholder="Enter  Option-B"><br>
				<label>Option C:</label>
				<input type="text" name="option-c" placeholder="Enter  Option-C"><br>
				<label>Option D:</label>
				<input type="text" name="option-d" placeholder="Enter  Option-D"><br>
				<label>Answer  :</label>
				<input type="text" name="answer" placeholder="Enter  Correct Answer"><br>
				<button type="submit" name="submit">Submit</button>
			</form>
		</section>
		<?php  
	include('footer.php');
?>
	<?php
		if(isset($_POST['submit'])){
			echo $_POST['submit'];
			$question = $_POST['question'];
			$option_a = $_POST['option-a'];
			$option_b = $_POST['option-b'];
			$option_c = $_POST['option-c'];
			$option_d = $_POST['option-d'];
			$answer = $_POST['answer'];
			$insert_query = "INSERT into questions(ques,option_a,option_b,option_c,option_d,correct_ans) VALUES('$question','$option_a','$option_b','$option_c','$option_d','$answer')";
			mysqli_query($con,$insert_query);
		}
			// completed query to upload data to database
		else
			die();
	?>
