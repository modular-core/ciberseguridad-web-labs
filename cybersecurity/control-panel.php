<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	echo "Hello: " . base64_decode($_COOKIE["username"]);
	echo "<br>";
	echo "[ Session: " . base64_decode($_COOKIE["username"]) . " ]";
}
else {
	echo "This page is only for registered users<br>";
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

<br><br>
<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="text" name="search">
	<input type="submit" name="submit" value="Search"><br>
</form>

<?php
if(isset($_GET['submit'])){
	$search = $_GET['search'];
	echo "Search Result: <b> $search </b><br><br>";
}
?>

<?php
include("connectionDB.php");

$username = base64_decode($_COOKIE["username"]);
$result = mysqli_query($link, "SELECT * FROM login_table WHERE userid = '$username'");

echo "<table border=1;> ";
echo "<tr>";
echo "<th>User ID</th>";
echo "<th>Password</th>";
echo "<th>Name</th>";
echo "</tr>";
while ($row = mysqli_fetch_row($result)){ 
	echo "<tr>";
    echo "<td>$row[0]</td>";
    echo "<td>$row[1]</td>";
    echo "<td>$row[2]</td>";
  	echo "</tr>";
}
echo "</table>";
?>

<br><br>
<a href=administrator.php>Administrator Page</a><br><br>
<a href=transactions.php>Transactions</a><br><br>
<a href=logout.php>Logout</a><br><br>
<a href=login.php>Return to Login</a>