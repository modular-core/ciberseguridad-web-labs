<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['username'] == "admin") {
	echo "Hola: " . $_SESSION['username'];
}
else {
	echo "This is a page only for Administrators<br>";
	echo "<br><a href='login.php'>Login</a>";
	exit;
}

$now = time();
if($now > $_SESSION['expire']) {
	session_destroy();
	echo "Session Finished,
	<a href='login.php'>You need to Login</a>";
	exit;
}
?>

<br><br><b>Administrators - Register a User<b><br><br>
<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table>
  <tr>
    <td>User ID:</td><td><input type="text" name="userid"></td>
  </tr>
  <tr>
	<td>Password:</td><td><input type="password" name="pass"></td>
  </tr>
  <tr>
	<td>Name:</td><td><input type="text" name="name"></td>
  </tr>
</table> 
<input type="submit" name="submit" value="Submit"><br>
</form>

<?php
if(isset($_GET['submit'])){
	$userid = $_GET['userid'];
	$pass = $_GET['pass'];
	$name = $_GET['name'];
	
	include("connectionDB.php");
	
	$result = mysqli_query($link, "INSERT INTO login_table(userid, pass, name) VALUES ('$userid','$pass','$name')");
	echo "User Sucessfully Registered!";
}
?>

<br><br>
<a href=logout.php>Logout</a><br><br>
<a href=control-panel.php>Return to Control Panel</a><br><br>