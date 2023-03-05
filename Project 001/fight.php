<?
session_start();

// This page is where the player selects the monster to fight against

include "connect.php";

$user_name = $_SESSION['user_name'];

$player_query = "SELECT weapon, gold, strength, armor, cur_hp, dexterity, xp, level FROM user_char WHERE name = '$user_name'";
$result = mysql_query($player_query) or die("Error getting player weapon/armor!");

while ($row = mysql_fetch_array($result)) {
	$player_weapon = $row['weapon'];
	$player_armor = $row['armor'];
	$player_hp = $row['cur_hp'];
	$dexterity = $row['dexterity'];
	$xp = $row['xp'];
	$level = $row['level'];
	$strength = $row['strength'];
	$gold = $row['gold'];
}

$weapon_query = "SELECT min_dmg, max_dmg FROM weapons WHERE name = '$player_weapon'";
$result = mysql_query($weapon_query) or die("Error getting player weapon stats!");

while ($row = mysql_fetch_array($result)) {
	$weapon_min_dmg = $row['min_dmg'];
	$weapon_max_dmg = $row['max_dmg'];
}

$weapon_min_dmg = ($weapon_min_dmg + (int)($strength/2));
$weapon_max_dmg = ($weapon_max_dmg + (int)($strength/2));

$armor_query = "SELECT armor_ac FROM armor WHERE name = '$player_armor'";
$result = mysql_query($armor_query) or die("Error getting player armor stats!");

while ($row = mysql_fetch_array($result)) {
	$armor_ac = $row['armor_ac'];
}

$armor_class = $armor_ac + $dexterity;
$tnl = (100 * ($level * $level));

$monster_list = "SELECT * FROM monsters ORDER BY level DESC";
$result = mysql_query($monster_list) or die("Error getting monster list!");

$x = 0;
$y = 0;

while ($row = mysql_fetch_array($result)) {
	$monster_name[$x] = $row['name'];
	$monster_level[$x] = $row['level'];
	$xp_value[$x] = ((100 * ($monster_level[$x] * $monster_level[$x]))/20);
	$monster_hp[$x] = ($monster_level[$x] * 10);
	$x++;
	$y++;
}

?>

<html>
<head>
<title>Monster Selection</title>

</head>

<body>

<link href="style.css" rel="stylesheet" type="text/css">

<table cellpadding="0" cellspacing="0" border="1" align="center" width="50%" bordercolor="black">
	<tr>
		<td colspan="4" align="center"><h2><u>Monster Fight</u></h1></td>
	</tr>
	<tr>
		<td colspan="4">
			<table align="center" cellpadding="0" cellspacing="0" border="0" align="left" width="50%">
				<tr>
					<td align="left"><b>Current HP: <?=$player_hp?></b></td>
				</tr>
				<tr>
					<td align="left"><b>Min Dmg: <?=$weapon_min_dmg?></b></td>
				</tr>
				<tr>
					<td align="left"><b>Max Dmg: <?=$weapon_max_dmg?></b></td>
				</tr>
				<tr>
					<td align="left"><b>Armor Class: <?=$armor_class?></b></td>
				</tr>
				<tr>
					<td align="left"><b>Gold: <?=$gold?></b></td>
				</tr>				
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="4" align="center"><font color="#009900"><b>XP: <?=$xp?></b></font></td>
	</tr>
	<tr>
		<td colspan="4" align="center"><font color="#009900"><b>TNL: <?=$tnl?></b></font></td>
	</tr>
	<tr>
		<td colspan="4" align="center">
			<form action="battle.php" method="post">
				<select name="monsters">
					<?
						$x--;
						while ($x >= 0) {
							echo "<option value=$monster_name[$x]>$monster_name[$x]</option>";
							$x--;
						}
					?>
				</select>
				<input type="submit" name="Fight" value="Fight">
			</form>
		</td>
	<tr>
		<td bgcolor="#999999" align="center">Level</td>
		<td bgcolor="#999999" align="center">Name</td>
		<td bgcolor="#999999" align="center">HP</td>
		<td bgcolor="#999999" align="center">XP Value</td>		
	</tr>
	<?
		$y--;
		while($y >= 0) {
			echo "<tr><td>$monster_level[$y]</td>";
			echo "<td>$monster_name[$y]</td>";
			echo "<td>$monster_hp[$y]</td>";
			echo "<td>$xp_value[$y]</td></tr>";
			$y--;
		}
	?>
	<tr>
		<td colspan="4" align="center"><b><a href="index.php">Back</a></b></td>
	</tr>
</table>
</body>
</html>

