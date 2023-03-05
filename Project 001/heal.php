<?
session_start();

include "connect.php";

$user_name = $_SESSION['user_name'];

$return = "<META HTTP-EQUIV=refresh CONTENT=\"0; url=index.php\">";

$get_maxhp = "SELECT max_hp FROM user_char WHERE name = '$user_name'";
$result = mysql_query($get_maxhp) or die("Error getting character HP!");

while ($row = mysql_fetch_array($result)) {
	$max_hp = $row['max_hp'];
}

$heal_char = "UPDATE user_char SET cur_hp = '$max_hp' WHERE name = '$user_name'";
$done = mysql_query($heal_char) or die("Error healing character!");

echo $return;

?>