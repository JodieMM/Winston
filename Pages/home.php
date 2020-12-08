<?php
	include '../Design/header.php';
?>

<div class="content">
	<h1> Winston </h1>
	<p>I've put some links here for your convenience, Ma'am.</p>
	<div id="option-button-row">
		<div id="option-button" onclick="socialMediaLinks()">Social Media</div>
		<div id="option-button" onclick="facebook()">Facebook</div>
		<div id="option-button" onclick="gmail()">Gmail</div>
		<div id="option-button" onclick="youtube()">YouTube</div>
	</div>
	<div id="option-button-row">
		<div id="option-button" onclick="trello()">Trello</div>
		<div id="option-button" onclick="twitter()">Twitter</div>
		<div id="option-button" onclick="github()">GitHub</div>
		<div id="option-button" onclick="aws()">AWS</div>
	</div>	
	<div id="option-button-row">
		<div id="option-button" onclick="youtubemp3()">Youtube to MP3</div>
		<div id="option-button" onclick="duolingo()">DuoLingo</div>
		<div id="option-button" onclick="da()">DeviantArt</div>
		<div id="option-button" onclick="singing()">Singing Practice</div>
	</div>
</div>

<?php
	include '../Design/footer.php';
?>