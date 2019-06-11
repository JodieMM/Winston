<?php
	include '../Design/header.php';
	// Create session
	if (!isset($_SESSION)){
		session_start();
	}
	
	// Create full set of questions if new quiz
	if (!isset($_SESSION['mandarin'])){
		// Choose Questions
		$questions = [];
		// TEMPORARY !*!*!
		$questions = [0, 1, 2, 3, 4, 5];
		
		shuffle($questions);
		$_SESSION['mandarin'] = $questions;
		$_SESSION['incorrect'] = [];

		
	// If existing quiz, remove last question and add answer
	} else {
		if (isset($_POST['restart'])){
			unset($_SESSION['mandarin']);
			header('Location: ../Pages/mandarin.php');
		} else {
			$result = $_POST['answer'];
			
			// Get Question
			
			// Check Matches
			/** if (matches){
				increase mantoeng or engtoman ++
			} else {
				decrease mantoeng or engtoman = 0
				array_push($_SESSION['incorrect'], QUESTION);
			}
			unset($_SESSION['mandarin'][0]);
			$_SESSION['mandarin'] = array_values($_SESSION['mandarin']);
			**/
		}
	}
	// If no more questions, finish quiz
	if ($_SESSION['mandarin'] == []){
		unset($_SESSION['mandarin']);
		header('Location: ../Pages/mandarinComplete.php');
	}
?>

<section class="content">
	<h1> Mandarin Test </h1>
	<div class="music-test">
		<?php
			$note = $_SESSION['music'][0];
			echo"<img src=\"../Music/$note.jpg\" alt=\"Note $note\" ></img>";
		?>
		<br>
		What letter does this symbol represent?
		<br>
		<form method="post">
			<input type="text" name="answer" id="answer"></input>
			<input type="submit" name="submit" id="submit"></input>
			<?php
				if (strlen($note) == 3){
					echo "<input type=\"submit\" name=\"skip\" id=\"skip\" value=\"Skip Audio Question\"></input>";
				}
				echo "<br><input type=\"submit\" name=\"restart\" id=\"restart\" value=\"Restart Quiz\"></input>";
			?>
		</form>
	</div>
	
</section>

<?php
	include '../Design/footer.php';
?>