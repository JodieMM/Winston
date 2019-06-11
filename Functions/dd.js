// -- D&D FUNCTIONS --

var weapons = [];


function diceroll(x){
	number = roll(x);
	document.getElementById("dicerolls").innerHTML += number;
	document.getElementById("dicerolls").innerHTML += "<br>";
}

function roll(x){
	if (x == 0)
	{
		x = parseInt(document.getElementById("customdice").value);
	}
	var number = (Math.random() * 100) / (100 / x);
	return Math.ceil(number);
}

function cleardice(){
	document.getElementById("dicerolls").innerHTML = "";
}

function searchfor(){
	input = document.getElementById("search").value;
	document.getElementById("searchresponse").innerHTML = input;
}

function addweapon(){
	name = document.getElementById("weaponName").value;
	type = document.getElementById("weaponType").value;
	dice = document.getElementById("weaponDice").value;
	weapons.push([name, type, dice]);
	drawweapon(weapons.length - 1);
	return false;
}

function drawweapon(index){
	var source = (weapons[index][1] == "sword" || weapons[index][1] == "Sword") ? "../Design/sword.jpg" : "../Design/bow.jpg";
	document.getElementById("weapons").innerHTML +=
	"<p>"+weapons[index][0]+"<img src="+source+" onclick=\"rollweapon("+index+")\"/></p>";
}

function rollweapon(index){
	var die = weapons[index][2];
	var dice = die.split(" ");
	var total = 0;
	for (i = 0; i < dice.length; i++)
	{
		// xDy roll
		if (dice[i].length == 3)
		{
			for (j = 0; j < parseInt(dice[i][0], 10); j++)
			{
				total += roll(parseInt(dice[i][2]));
			}
		}
		// + X
		else
		{
			total += parseInt(dice[i], 10);
		}
	}
	document.getElementById("dicerolls").innerHTML += total;
	document.getElementById("dicerolls").innerHTML += "<br>";
}

function clearWeapons(){
	weapons = [];
	document.getElementById("weapons").innerHTML = "";
}
	
