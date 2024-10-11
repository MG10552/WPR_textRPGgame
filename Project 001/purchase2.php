<?
	session_start();

	include "connect.php";

	$weapon = $_POST['weapons'];
	$user_name = $_SESSION['user_name'];
	$return = "<META HTTP-EQUIV=refresh CONTENT=\"0; url=weapon.php\">";
	$return2 = "<META HTTP-EQUIV=refresh CONTENT=\"3; url=weapon.php\">";
	$get_cost = "SELECT price FROM weapons WHERE name = '$weapon'";
	$result = mysql_query($get_cost) or die("Error getting weapon price!");

	while ($row = mysql_fetch_array($result)) {
		$cost = $row['price'];
	}

	$user_data = "SELECT gold, weapon FROM user_char WHERE name = '$user_name'";
	$result = mysql_query($user_data) or die("Error getting user gold!");

	while ($row = mysql_fetch_array($result)) {
		$gold = $row['gold'];
		$cur_weapon = $row['weapon'];
	}

	$query_weapon = "SELECT price FROM weapons WHERE name = '$cur_weapon'";
	$result = mysql_query($query_weapon) or die("Error getting weapon equipment!");

	while ($row = mysql_fetch_array($result)) {
		$user_value = $row['price'];
	}

	$gold = $gold + (int)($user_value/2);

	if ($cost <= $gold) {
		$gold = ($gold - $cost);
		$update_query = "UPDATE user_char SET weapon = '$weapon', gold = '$gold' WHERE name = '$user_name'";
		$result = mysql_query($update_query) or die("Error connecting to user table!");
		echo $return;
	} else {
		echo "You don't have enough money!";
		echo $return2;
	}
?>