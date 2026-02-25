<?php
session_start();
?>

<?php
$username = $_POST['username'];
$password = $_POST['password'];

include("connectionDB.php");

$result = mysqli_query($link, "SELECT * FROM login_table WHERE userid = '$username' and pass = '$password'");

if ($result->num_rows > 0) {
	$_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
	
	setcookie( "username", $encoded = base64_encode($username));
	setcookie( "password", $encoded = base64_encode($password));
	
    echo "Welcome: " . $_SESSION['username'];
    echo "<br><br><a href=control-panel.php>Control Panel</a>";
	echo "<br><br><a href=login.php>Return to Login</a>";
 }
 else { 
   echo "Incorrect Username or Password";
   echo "<br><a href='login.php'>Try it again</a>";
 }
 ?>