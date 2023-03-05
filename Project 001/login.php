<?
session_start();

// This page is for logging the user in

include "connect.php";

// Set variables to redirect user to proper area after attempted login

$retry = "<META HTTP-EQUIV=refresh CONTENT=\"3; url=login.php\">";
$login = "<META HTTP-EQUIV=refresh CONTENT=\"0; url=index.php\">";

$post_name = $_POST['name'];
$post_password = $_POST['password'];

// echo $post_name;

$query = "SELECT name, password FROM user_char WHERE name = '$post_name'";
$result = mysql_query($query) or die("Error Checking Passwords!");

while ($row = mysql_fetch_array($result)) {
      $account_name = $row['name'];
      $password = $row['password'];
      // echo $row['password'];
}

// If password matches account name, login

if($password == $post_password) {
   $_SESSION['user_name'] = $account_name;
   /*
   echo $_SESSION['user_name'];
   echo $account_name;
   echo $password;
   */
   echo $login;
}

// If password does not match account name, return to login screen

else {
   echo "<h2>Password does not match password in database!</h2>";
   echo $retry;
}

?>
