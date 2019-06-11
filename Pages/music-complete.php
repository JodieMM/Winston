<?php
	include '../Design/header.php';
	// Create session
	if (!isset($_SESSION)){
		session_start();
	}
	// Confirm ready to restart
	unset($_SESSION['music']);
?>

<section class="content">
	<h1> Music Quiz Complete! </h1>
	Your results are below. You took <?php echo round($_SESSION['time'], 3) ?>s to finish the test.
	<div class="music-test">
	<?php
		$num_right = 0;
		foreach($_SESSION['results'] as $result){
			if ($result == "Correct"){
				$num_right++;
			}
		}
		echo"You got $num_right out of ".count($_SESSION['results'])." correct!";
		
		// Check for high score
		if ($num_right == count($_SESSION['results'])){
			$file = fopen("../Music/highscore.txt", "r");
			$high = floatval(fgets($file));
			fclose($file);
			if ($high > $_SESSION['time']){
				$file = fopen("../Music/highscore.txt", "w");
				fwrite($file, $_SESSION['time']);
				fclose($file);
				echo "<p>This is a new high score! Congratulations!</p>";
			}
		}
	?>
	<table>
		<tr>
			<th> Image </th>
			<th> Note </th>
			<th> Response </th>
		</tr>
		<?php
			for ($x = 0; $x < count($_SESSION['results']); $x++){
				echo"<tr><td><img src='../Music/".$_SESSION['questions'][$x].".jpg'></img></td>";
				echo"<td>".$_SESSION['questions'][$x]."</td>";
				echo"<td>".$_SESSION['results'][$x]."</td></tr>";
			}
		?>
	</table>
	</div>
</section>

<?php
	include '../Design/footer.php';
?>