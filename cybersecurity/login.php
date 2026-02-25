<!DOCTYPE html>

<html lang="en">

<head>
 <title>Login</title>
 <meta charset = "utf-8">
</head>

<body>

<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="text" name="search">
	<input type="submit" name="submit" value="Search"><br>
</form>

<?php
if(isset($_GET['submit'])){
	$search = $_GET['search'];
	echo "Search Result: <b> $search </b>";
}
?>

<h1>Users Login</h1>
<hr />
<form action="checklogin.php" method="post" >
	<label>User Name:</label><br>
	<input name="username" type="text" id="username" required>
	<br><br>
	<label>Password:</label><br>
	<input name="password" type="password" id="password" required>
	<br><br>
	<input type="submit" name="Submit" value="LOGIN">
</form>
<hr />

<footer>
    <br>
    <a href="http://localhost/cybersecurity/contacts.php?content=embed.html">Contacts</a>
</footer>
 </body>
 
</html>