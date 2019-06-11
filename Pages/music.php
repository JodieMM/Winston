<?php
	include '../Design/header.php';
	// Create session
	if (!isset($_SESSION)){
		session_start();
	}
	
	// Create full set of questions if new quiz
	if (!isset($_SESSION['music'])){
		// T stands for Treble, B stands for Bass. An S before the note is a test for the sound, not the symbol.
		$noteArray = ['TA', 'TG', 'TF', 'TE', 'TD', 'TC', 'BA', 'BG', 'BF', 'BE', 'BD', 'BC'];
		//$noteArray = ['TA', 'TG', 'TF', 'TE', 'TD', 'TC', 'BA', 'BG', 'BF', 'BE', 'BD', 'BC', 'STA', 'STG', 'STF', 'STE', 'STD', 'STC', 'SBA', 'SBG', 'SBF', 'SBE', 'SBD', 'SBC'];
		shuffle($noteArray);
		$_SESSION['music'] = $noteArray;
		$_SESSION['questions'] = [];
		$_SESSION['results'] = [];
		// Start timer
		$_SESSION['starttime'] = microtime(true);
	// If existing quiz, remove last question and add answer
	} else {
		if (isset($_POST['restart'])){
			unset($_SESSION['music']);
			header('Location: ../Pages/music.php');
		}
		if (isset($_POST['skip'])){
			unset($_SESSION['music'][0]);
			$_SESSION['music'] = array_values($_SESSION['music']);
		} else {
			$result = $_POST['answer'];
			$question = $_SESSION['music'][0];
			if ((strlen($question) == 2 && $question[1] == strtoupper($result)) || (strlen($question) == 3 && $question[2] == strtoupper($result))){
				array_push($_SESSION['results'], "Correct");
			} else {
				array_push($_SESSION['results'], "Incorrect");
			}
			array_push($_SESSION['questions'], $_SESSION['music'][0]);
			unset($_SESSION['music'][0]);
			$_SESSION['music'] = array_values($_SESSION['music']);
		}
	}
	// If no more questions, finish quiz
	if ($_SESSION['music'] == []){
		$time_post = microtime(true);
		$_SESSION['time'] = $time_post - $_SESSION['starttime'];
		unset($_SESSION['music']);
		header('Location: ../Pages/music-complete.php');
	}
?>

<section class="content">
	<h1> Music Test </h1>
	<div class="music-test">
		<?php
			$note = $_SESSION['music'][0];
			echo"<img src=\"../Music/$note.jpg\" alt=\"Note $note\" ></img>";
		?>
		<br>
		What letter does this symbol represent?
		<br>
		<form method="post">
			<input type="text" autocomplete="off" name="answer" id="answer" autofocus style="text-transform:uppercase"></input>
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