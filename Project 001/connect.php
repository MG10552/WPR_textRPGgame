<?

// This file is meant to be used for connecting to the main database of the project

// $db holds the connection code to connect to the database
$db = mysql_connect("localhost", "root") or die("Could not connect.");

// If there is no database or a problem connecting to the database display error
if(!$db)
	die("No database");
if(!mysql_select_db("test",$db))
 	die("No database selected.");

?>
