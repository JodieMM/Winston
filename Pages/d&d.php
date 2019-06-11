<?php
	include '../Design/header.php';
?>

<section class="fullcontent">
	<div class="dicepanel">
		<table>
			<tr><td onclick="diceroll(4)">d4</td></tr>
			<tr><td onclick="diceroll(6)">d6</td></tr>
			<tr><td onclick="diceroll(8)">d8</td></tr>
			<tr><td onclick="diceroll(10)">d10</td></tr>
			<tr><td onclick="diceroll(12)">d12</td></tr>
			<tr><td onclick="diceroll(20)">d20</td></tr>
			<tr><td onclick="diceroll(100)">d100</td></tr>
			<tr><td><input type="number" id="customdice" value=2></input></td></tr>
			<tr><td onclick="diceroll(0)">Roll</td></tr>
			<tr><td onclick="cleardice()">Clear</td></tr>
		</table>
	</div>
	
	<div class="diceresults">
		<h1>Dice Results</h1>
		<p id="dicerolls"></p>
	</div>
	
	<div class="titleweapons">
		<img src="../Design/d&dlogo.png" alt="D&D Logo"/>
		<div class="weapons" id="weapons"></div>
		<div class="weaponInfo">
			<form action="#" onsubmit="addweapon()">
				<input id="weaponName" placeholder="Name" autocomplete="off"></input>
				<input id="weaponType" placeholder="Type" autocomplete="off"></input>
				<input id="weaponDice" placeholder="Dice" autocomplete="off"></input>
				<button type="submit">Add</button>
				<button type="button" onclick="clearWeapons()">Clear</button>
			</form>
		</div>
	</div>
	
	<div class="searchbar">
		<h1>Search Bar</h1>
		<form action="#" onsubmit="searchfor()">
			<input id="search" autocomplete="off"/>
		</form>
		<p id="searchresponse"></p>
	</div>
</section>

<?php
	include '../Design/footer.php';
?>