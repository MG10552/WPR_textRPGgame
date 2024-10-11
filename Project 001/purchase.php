<?
	session_start();

	include "connect.php";

	$armor = $_POST['armors'];
	$user_name = $_SESSION['user_name'];
	$return = "<META HTTP-EQUIV=refresh CONTENT=\"0; url=armor.php\">";
	$return2 = "<META HTTP-EQUIV=refresh CONTENT=\"3; url=armor.php\">";
	$get_cost = "SELECT price FROM armor WHERE name = '$armor'";
	$result = mysql_query($get_cost) or die("Error getting armor price!");

	while ($row = mysql_fetch_array($result)) {
		$cost = $row['price'];
	}

	$user_data = "SELECT gold, armor FROM user_char WHERE name = '$user_name'";
	$result = mysql_query($user_data) or die("Error getting user gold!");

	while ($row = mysql_fetch_array($result)) {
		$gold = $row['gold'];
		$cur_armor = $row['armor'];
	}

	$query_armor = "SELECT price FROM armor WHERE name = '$cur_armor'";
	$result = mysql_query($query_armor) or die("Error getting armor equipment!");

	while ($row = mysql_fetch_array($result)) {
		$user_value = $row['price'];
	}

	$gold = $gold + (int)($user_value/2);

	if ($cost <= $gold) {
		$gold = ($gold - $cost);
		$update_query = "UPDATE user_char SET armor = '$armor', gold = '$gold' WHERE name = '$user_name'";
		$result = mysql_query($update_query) or die("Error connecting to user table!");
		echo $return;
	} else {
		echo "You don't have enough money!";
		echo $return2;
	}
?>