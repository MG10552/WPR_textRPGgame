<?
	session_start();

	include "connect.php";

	$get_name = "SELECT * FROM user_char";
	$result = mysql_query($get_name) or die ("Cannot Get Default User Level");
	$retry = "<META HTTP-EQUIV=refresh CONTENT=\"3; url=train.php\">";
	$login = "<META HTTP-EQUIV=refresh CONTENT=\"0; url=train.php\">";

	if ($_POST['password'] == $_POST['retype_password']) {
		while ($row = mysql_fetch_array($result)) {
			$check_users = $row['name'];
			
			if($check_users == $_POST['name']) {
				echo $retry;
			}
		}

		$name = $_POST['name'];
		$password = $_POST['password'];
		$race = $_POST['race'];
		$class = $_POST['class'];

		switch ($class) {
			case "fighter":
				$max_mana = "0";
				$cur_mana = "0";
				$weapon = "Dagger";
				$armor = "Cloth";
				$level = "1";
				$xp = "0";
				$max_hp = "10";
				$cur_hp = "10";
				break;

			case "mage":
				$max_mana = "10";
				$cur_mana = "10";
				$weapon = "Dagger";
				$armor = "Cloth";
				$level = "1";
				$xp = "0";
				$max_hp = "5";
				$cur_hp = "5";
				break;

			case "rogue":
				$max_mana = "0";
				$cur_mana = "0";
				$weapon = "Dagger";
				$armor = "Cloth";
				$level = "1";
				$xp = "0";
				$max_hp = "6";
				$cur_hp = "6";
				break;

			case "cleric":
				$max_mana = "10";
				$cur_mana = "10";
				$weapon = "Club";
				$armor = "Cloth";
				$level = "1";
				$xp = "0";
				$max_hp = "8";
				$cur_hp = "8";
				break;
		}
		
		switch ($race) {
			case "human":
				$strength = "10";
				$dexterity = "10";
				$intelligence = "10";
				$constitution = "10";
				break;

			case "elf":
				$strength = "5";
				$dexterity = "15";
				$intelligence = "15";
				$constitution = "5";
				break;

			case "dwarf":
				$strength = "20";
				$dexterity = "5";
				$intelligence = "10";
				$constitution = "15";
				break;

			case "orc":
				$strength = "20";
				$dexterity = "5";
				$intelligence = "5";
				$constitution = "20";
				break;

			case "goblin":
				$strength = "5";
				$dexterity = "20";
				$intelligence = "5";
				$constitution = "10";
				break;
		}
		
		$gold = "100";
		$query = "INSERT INTO user_char (name, password, race, class, strength, dexterity, intelligence, constitution, max_mana, cur_mana, max_hp, cur_hp, weapon, armor, level, xp, gold) VALUES ('$name', '$password', '$race', '$class', '$strength', '$dexterity', '$intelligence', '$constitution', '$max_mana', '$cur_mana', '$max_hp', '$cur_hp', '$weapon', '$armor', '$level', '$xp', '$gold')";
		mysql_query($query) or die("Error Inserting New Data!");

		echo $login;
	} else {
		// If passwords do not match display error and send back to signup page
		echo "<h2>Passwords do not match!</h2>";
		echo $retry;
	}
?>