<tr?
	session_start();

	// This page is for logging the user in
	include "connect.php";

	$user_name = $_SESSION['user_name'];
	$armor_query = "SELECT armor, gold FROM user_char WHERE name = '$user_name'";
	$result = mysql_query($armor_query) or die("Error connecting to user table!");

	while ($row = mysql_fetch_array($result)) {
		$armor = $row['armor'];
		$gold = $row['gold'];
	}

	$armor_query = "SELECT armor_ac, price FROM armor WHERE name = '$armor'";
	$result = mysql_query($armor_query) or die("Error connecting to user table!");

	while ($row = mysql_fetch_array($result)) {
		$cost = $row['price'];
		$armor_ac = $row['armor_ac'];
	}

	$cost = (int)($cost/2);

	$all_armor = "SELECT * FROM armor";
	$result = mysql_query($all_armor) or die("Error selecting all armor!");

	$x = 0;
	$y = 0;

	while ($row = mysql_fetch_array($result)) {
		$armor_name[$x] = $row['name'];
		$armor_price[$x] = $row['price'];
		$ac[$x] = $row['armor_ac'];
		$x++;
		$y++;
	}
?>

<html>
	<head>
		<title>Armor Shop</title>
	</head>
	
	<body>

		<link href="style.css" rel="stylesheet" type="text/css">

		<table cellpadding="0" cellspacing="0" border="1" align="center" width="50%" bordercolor="black">
			<tr>
				<td colspan="3" align="center"><h2><u>Armor Shop</u></h1></td></tr>
			<tr>
				<td colspan="3">
					<table align="center" cellpadding="0" cellspacing="0" border="0" align="left" width="50%">
						<tr>
							<td align="left"><b>Current Armor: <?=$armor?></b></td>
						</tr>
						<tr>
							<td align="left"><b>Sell Value: <?=$cost?></b></td>
						</tr>
						<tr>
							<td align="left"><b>Armor Class: <?=$armor_ac?></b></td>
						</tr>
					</table>
				</td></tr>
			<tr>
				<td colspan="3" align="center"><font color="#009900"><b>Gold: <?=$gold?></b></font></td></tr>
			<tr>
				<td colspan="3" align="center">
					<form action="purchase.php" method="post">
						<select name="armors">
							<?
								$x--;

								while ($x >= 0) {
									echo "<option value=$armor_name[$x]>$armor_name[$x]</option>";
									$x--;
								}
							?>
						</select>
						<input type="submit" name="Purchase" value="Purchase">
					</form>
				</td></tr>
			<tr>
				<td bgcolor="#999999" align="center">Name</td>
				<td bgcolor="#999999" align="center">Armor Class</td>
				<td bgcolor="#999999" align="center">Price</td></tr>
			
			<?
				$y--;

				while($y >= 0) {
					echo "<tr><td>$armor_name[$y]</td>";
					echo "<td>$ac[$y]</td>";
					echo "<td>$armor_price[$y]</td></tr>";
					$y--;
				}
			?>
			
			<tr>
				<td colspan="3" align="center"><b><a href="index.php">Back</a></b></td></tr>
		</table>
	</body>
</html>