<?
	session_start();

	// This page is for logging the user in
	include "connect.php";

	$user_name = $_SESSION['user_name'];
	$char_query = "SELECT * FROM user_char WHERE name = '$user_name'";
	$result = mysql_query($char_query) or die("Error connecting to user table!");

	while ($row = mysql_fetch_array($result)) {
		$class = $row['class'];
		$race = $row['race'];
		$level = $row['level'];
		$xp = $row['xp'];
		$gold = $row['gold'];
		$name = $row['name'];
		$armor = $row['armor'];
		$weapon = $row['weapon'];
		$max_hp = $row['max_hp'];
		$cur_hp = $row['cur_hp'];
		$max_mana = $row['max_mana'];
		$cur_mana = $row['cur_mana'];
		$strength = $row['strength'];
		$intelligence = $row['intelligence'];
		$dexterity = $row['dexterity'];
		$constitution = $row['constitution'];
	}

	$char_query = "SELECT * FROM weapons WHERE name = '$weapon'";
	$result = mysql_query($char_query) or die("Error connecting to weapon table!");

	while ($row = mysql_fetch_array($result)) {
		$min_dmg = $row['min_dmg'];
		$max_dmg = $row['max_dmg'];
	}

	$min_dmg = ($min_dmg + (int)($strength/2));
	$max_dmg = ($max_dmg + (int)($strength/2));

	$char_query = "SELECT * FROM armor WHERE name = '$armor'";
	$result = mysql_query($char_query) or die("Error connecting to armor table!");

	while ($row = mysql_fetch_array($result)) {
		$armor_ac = $row['armor_ac'];
	}

	$armor_class = ($dexterity + $armor_ac);
	$tnl = (100 * ($level * $level));
?>

<html>
	<link href="style.css" rel="stylesheet" type="text/css">
	<head>
		<title>Training</title></head>
	<body>
		<table cellpadding="0" cellspacing="0" border="0" align="center" width="50%">
			<tr>
				<td align="left">Name: <?=$name?></td></tr>
			<tr>
				<td align="left">Class: <?=$class?></td></tr>
			<tr>
				<td align="left">Race: <?=$race?></td></tr>
			<tr>
				<td align="left">Level: <?=$level?></td></tr>
			<tr>
				<td align="left">To Next Level: <?=$tnl?></td></tr>
			<tr>
				<td align="left">XP: <?=$xp?></td></tr>
			<tr>
				<td align="left"><font color="#006600"><b>Gold: <?=$gold?></b></font></td></tr>
			<tr>
				<td align="left">Armor Class: <?=$armor_class?></td></tr>
			<tr>
				<td align="left">Weapon: <?=$weapon?></td></tr>
			<tr>
				<td align="left">Armor: <?=$armor?></td></tr>
			<tr>
				<td height="20"></td></tr>
			<tr>
				<td align="left">Strength: <?=$strength?></td></tr>
			<tr>
				<td align="left">Dexterity: <?=$dexterity?></td></tr>
			<tr>
				<td align="left">Intelligence: <?=$intelligence?></td></tr>
			<tr>
				<td align="left">Constitution: <?=$constitution?></td></tr>
			<tr>
				<td height="20"></td></tr>
			<tr>
				<td align="left"><b><font color="red">HP:</font> <?=$cur_hp?>/<?=$max_hp?></b></td></tr>
			<tr>
				<td align="left"><b><font color="blue">Mana:</font> <?=$cur_mana?>/<?=$max_mana?></b></td></tr>
			<tr>
				<td align="left">Min DMG: <?=$min_dmg?></td></tr>
			<tr>
				<td align="left">Max DMG: <?=$max_dmg?></td></tr>
		</table>
		<br/>
		<table cellpadding="0" cellspacing="0" border="1" align="center" width="50%">
			<tr align="center">
				<td><a href="armor.php">Armor Shop</a></td>
				<td><a href="weapon.php">Weapon Shop</a></td>
				<td><a href="heal.php">Healer Shop</a></td></tr>
			<tr align="center">
				<td><a href="inventory.php">Inventory</a></td>
				<td><a href="spell.php">Spell Shop</a></td>
				<td><a href="fight.php">Fight Monsters</a></td></tr>
		</table>
	</body>
</html>