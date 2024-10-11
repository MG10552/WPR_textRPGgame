<tr?
	session_start();

	// This page is for logging the user in
	include "connect.php";

	$user_name = $_SESSION['user_name'];
	$weapon_query = "SELECT weapon, gold FROM user_char WHERE name = '$user_name'";
	$result = mysql_query($weapon_query) or die("Error connecting to user table!");

	while ($row = mysql_fetch_array($result)) {
		$weapon = $row['weapon'];
		$gold = $row['gold'];
	}

	$weapon_query2 = "SELECT min_dmg, max_dmg, price FROM weapons WHERE name = '$weapon'";
	$result = mysql_query($weapon_query2) or die("Error connecting to user table!");

	while ($row = mysql_fetch_array($result)) {
		$cost = $row['price'];
		$min_dmg = $row['min_dmg'];
		$max_dmg = $row['max_dmg'];
	}

	$cost = (int)($cost/2);

	$all_weapon = "SELECT * FROM weapons";
	$result = mysql_query($all_weapon) or die("Error selecting all weapon!");

	$x = 0;
	$y = 0;

	while ($row = mysql_fetch_array($result)) {
		$weapon_name[$x] = $row['name'];
		$weapon_price[$x] = $row['price'];
		$w_min_dmg[$x] = $row['min_dmg'];
		$w_max_dmg[$x] = $row['max_dmg'];
		$x++;
		$y++;
	}
?>

<html>
	<head>
		<title>Weapon Shop</title></head>
	<body>
		<link href="style.css" rel="stylesheet" type="text/css">
		<table cellpadding="0" cellspacing="0" border="1" align="center" width="50%" bordercolor="black">
			<tr>
				<td colspan="4" align="center"><h2><u>Weapon Shop</u></h1></td></tr>
			<tr>
				<td colspan="4">
					<table align="center" cellpadding="0" cellspacing="0" border="0" align="left" width="50%">
						<tr>
							<td align="left"><b>Current Weapon: <?=$weapon?></b></td></tr>
						<tr>
							<td align="left"><b>Sell Value: <?=$cost?></b></td></tr>
						<tr>
							<td align="left"><b>Min Damage: <?=$min_dmg?></b></td></tr>
						<tr>
							<td align="left"><b>Max Damage: <?=$max_dmg?></b></td></tr>				
					</table>
				</td></tr>
			<tr>
				<td colspan="4" align="center"><font color="#009900"><b>Gold: <?=$gold?></b></font></td></tr>
			<tr>
				<td colspan="4" align="center">
					<form action="purchase2.php" method="post">
						<select name="weapons">
							<?
								$x--;

								while ($x >= 0) {
									echo "<option value=$weapon_name[$x]>$weapon_name[$x]</option>";
									$x--;
								}
							?>
						</select>
						<input type="submit" name="Purchase" value="Purchase">
					</form>
				</td></tr>
			<tr>
				<td bgcolor="#999999" align="center">Name</td>
				<td bgcolor="#999999" align="center">Min Damage</td>
				<td bgcolor="#999999" align="center">Max Damage</td>
				<td bgcolor="#999999" align="center">Price</td></tr>
			<?
				$y--;

				while($y >= 0) {
					echo "<tr><td>$weapon_name[$y]</td>";
					echo "<td>$w_min_dmg[$y]</td>";
					echo "<td>$w_max_dmg[$y]</td>";			
					echo "<td>$weapon_price[$y]</td></tr>";
					$y--;
				}
			?>
			<tr>
				<td colspan="4" align="center"><b><a href="index.php">Back</a></b></td></tr>
		</table>
	</body>
</html>