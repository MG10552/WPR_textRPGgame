<?
	session_start();

	// This page is where the player selects the monster to fight against
	include "connect.php";

	$user_name = $_SESSION['user_name'];
	$monster_name = $_POST['monsters'];
	$exit = "<META HTTP-EQUIV=refresh CONTENT=\"3; url=armor.php\">";

	$player_query = "SELECT weapon, armor, cur_mana, gold, cur_hp, dexterity, strength, intelligence, xp, level, class FROM user_char WHERE name = '$user_name'";
	$result = mysql_query($player_query) or die("Error getting player weapon/armor!");

	while ($row = mysql_fetch_array($result)) {
		$player_weapon = $row['weapon'];
		$player_armor = $row['armor'];
		$player_hp = $row['cur_hp'];
		$player_mana = $row['cur_mana'];
		$dexterity = $row['dexterity'];
		$strength = $row['strength'];
		$intelligence = $row['intelligence'];
		$xp = $row['xp'];
		$level = $row['level'];
		$class = $row['class'];
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

	$monster_list = "SELECT * FROM monsters WHERE name = '$monster_name'";
	$result = mysql_query($monster_list) or die("Error getting monster list!");

	while ($row = mysql_fetch_array($result)) {
		$monster_level = $row['level'];
		$xp_value = (5 * ($monster_level * $monster_level));
		$monster_hp = ($monster_level * 10);
	}

	$x = 0;
	$y = 0;

	$half_dex = ($dexterity/2);

	$monster_defense = ($monster_level + $monster_level);
	$m_min_damage = ($monster_level * 2);
	$m_max_damage = ($monster_level * 5);
	$monster_dex = (10 + ($monster_level * 2));
	$monster_half = ($monster_dex/2);

	while ($player_hp > 0 AND $monster_hp > 0) {
		if ($x > 100) {
			echo $exit;
		}
		$player_attack = rand($half_dex, $dexterity);
		
		if ($player_attack >= $monster_defense || $player_attack == $dexterity) {
			$damage = rand($weapon_min_dmg, $weapon_max_dmg);
			$monster_hp = $monster_hp - $damage;
			$player_hit[$x] = $damage;
			$x++;
		} else {
			$player_hit[$x] = "miss";
			$x++;
		}
		
		if ($monster_hp > 0) {
			$monster_attack = rand($monster_half, $monster_dex);
			
			if ($monster_attack >= $armor_class || $monster_attack == $monster_dex) {
				$damage = rand($m_min_damage, $m_max_damage);
				$player_hp = $player_hp - $damage;
				$monster_hit[$y] = $damage;
				$y++;
			} else {
				$monster_hit[$y] = "miss";
				$y++;
			}
		} else {
			break;
		}
	}

	$player_count = $x;
	$monster_count = $y;
	$x = 0;
	$y = 0;

	if ($player_hp <= 0) {
		$outcome = "You Lose!";
	} else {
		$outcome = "You Win!";
	}
?>

<html>
	<head>
		<title>Battle</title>
	</head>
	<body>
		<link href="style.css" rel="stylesheet" type="text/css">
		<table cellpadding="0" cellspacing="0" border="1" align="center" width="50%" bordercolor="black">
			<tr>
				<td colspan="2" align="center"><h2><u>Battle</u></h1></td>
			</tr>
			<tr>
				<td colspan="2">
					<table align="center" cellpadding="0" cellspacing="0" border="0" align="left" width="50%">
						<tr>
							<td align="center"><h2><?=$user_name?> vs. <?=$monster_name?></h2></td>
						</tr>
					</table>
				</td></tr>
			<tr>
				<td colspan="2" align="center"><font color="#009900"><b><?=$outcome?></b></font></td></tr>
			<tr>
				<td bgcolor="#999999" align="center">Your attack</td>
				<td bgcolor="#999999" align="center">Monster attack</td></tr>
			
			<?
				while($x < $player_count) {
					if ($x < $player_count) {
						if ($player_hit[$x] != "miss") {
							echo "<tr><td>You hit for ",$player_hit[$x]," points of damage!</td>";
						} else {
							echo "<tr><td>You missed!</td>";
						}
						$x++;
					}
							
					// echo "<tr><td>You hit for ",$player_hit[$x]," points of damage!</td>";
					if ($y < $monster_count) {
						if ($monster_hit[$y] != "miss") {
							echo "<td>",$monster_name," hit you for ",$monster_hit[$y]," points of damage!</td></tr>";
						} else {
							echo "<td>",$monster_name," missed you!</td></tr>";
						}
						$y++;
					} else {
						echo "<td align=center>---</td></tr>";
					}
				}

				echo "<tr><td colspan=2 align=center><table cellpadding=0 cellspacing=0 border=0 align=center width=100% bordercolor=black>";
					if ($player_hp > 0) {
						echo "<tr><td align=center colspan=2><b>You killed the ",$monster_name,"!</b></td></tr>";
						$min_gold = $monster_level * 5;
						$max_gold = $monster_level * 10;
						$gold_reward = rand($min_gold, $max_gold);
						$xp_reward = $xp_value + $xp;
						$gold_query = "UPDATE user_char SET cur_hp = '$player_hp', gold = '$gold_reward', xp = '$xp_reward' WHERE name = '$user_name'";
						$result = mysql_query($gold_query) or die ("Could not update character!");
						$tnl = (100 * ($level * $level));
						
						echo "<tr><td align=center colspan=2><b>You gain ",$gold_reward," gold!</b></td></tr>";
						echo "<tr><td align=center colspan=2><b>You gain ",$xp_value," xp!</b></td></tr>";
						
						$total_gold = $gold_reward + $gold;
						
						$add_gold = "UPDATE user_char SET gold = '$total_gold', xp = '$xp_reward' WHERE name = '$user_name'";
						$result = mysql_query($add_gold) or die("Could not update gold");
						
						while ($xp_reward >= $tnl) {
							$level++;
							$xp = 0;
							
							switch($class) {
								case "fighter":
									$hp_gain = rand(5,10);
									$mana_gain = 0;
									$str_gain = rand(1,4);
									$dex_gain = rand(1,2);
									$int_gain = 1;
									$con_gain = rand(1,3);
									break;
								
								case "rogue":
									$hp_gain = rand(4,6);
									$mana_gain = 0;
									$str_gain = rand(1,2);
									$dex_gain = rand(1,4);
									$int_gain = rand(1,3);
									$con_gain = 1;
									break;

								case "mage":
									$hp_gain = rand(2,5);
									$mana_gain = rand(5,10);
									$str_gain = 1;
									$dex_gain = rand(1,3);
									$int_gain = rand(1,4);
									$con_gain = rand(1,2);
									break;

								case "cleric":
									$hp_gain = rand(4,8);
									$mana_gain = rand(2,10);
									$str_gain = rand(1,3);
									$dex_gain = 1;
									$int_gain = rand(1,2);
									$con_gain = rand(1,4);
									break;
							}
						
							echo "<tr><td align=center colspan=2 height=20></td></tr>";
							echo "<tr><td align=center colspan=2><b>You have leveled!</b></td></tr>";
							echo "<tr><td align=center colspan=2><b>You gain ",$hp_gain," HP!</b></td></tr>";
							echo "<tr><td align=center colspan=2><b>You gain ",$mana_gain," Mana!</b></td></tr>";
							echo "<tr><td align=center colspan=2><b>You gain ",$str_gain," Strength!</b></td></tr>";
							echo "<tr><td align=center colspan=2><b>You gain ",$dex_gain," Dexterity!</b></td></tr>";
							echo "<tr><td align=center colspan=2><b>You gain ",$int_gain," Intelligence!</b></td></tr>";
							echo "<tr><td align=center colspan=2><b>You gain ",$con_gain," Constitution!</b></td></tr>";
						
							$tnl = (100 * ($level * $level));
							$get_all_char = "SELECT constitution, max_hp, max_mana FROM user_char WHERE name = '$user_name'";
							$all_char = mysql_query($get_all_char) or die("Could not get all the char stuff!");

							while ($row = mysql_fetch_array($all_char)) {
									$constitution = $row['constitution'];
									$max_mana = $row['max_mana'];
									$max_hp = $row['max_hp'];
							}
							
							$max_hp = $max_hp + $hp_gain;
							$max_mana = $max_mana + $mana_gain;
							$strength = $strength + $str_gain;
							$dexterity = $dexterity + $dex_gain;
							$intelligence = $intelligence + $int_gain;
							$constitution = $constitution + $con_gain;
							
							$level_up = "UPDATE user_char SET level = '$level', xp = '$xp', max_hp = '$max_hp', max_mana = '$max_mana', strength = '$strength', dexterity = '$dexterity', intelligence = '$intelligence', constitution = '$constitution' WHERE name = '$user_name'";
							$update_char = mysql_query($level_up) or die("Could not update level info!");
						}						
					} else {
						echo "<tr><td align=center colspan=2><b>The ",$monster_name," killed you!</b></td></tr>";
						$kill_char = "UPDATE user_char SET cur_hp = '0' WHERE name = '$user_name'";
						$result = mysql_query($kill_char) or die ("Could not kill char!");
					}
				echo "</td></tr></table>";
			?>
			<tr>
				<td colspan="2" align="center"><b><a href="fight.php">Back</a></b></td></tr>
		</table>
	</body>
</html>