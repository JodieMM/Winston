<?php
	include '../Design/header.php';
	// Create session
	if (!isset($_SESSION)){
		session_start();
	}
	// Confirm ready to restart
	unset($_SESSION['mandarin']);
?>

<section class="content">
	<h1> Mandarin Quiz Complete! </h1>
	Your incorrect answers are below for your revision.
	<div class="music-test">
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