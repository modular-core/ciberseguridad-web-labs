<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<b>Search Amount >= Than:<b> <input type="text" name="search">
	<input type="submit" name="submit" value="Search"><br><br>
</form>

<?php
if(isset($_GET['submit'])){
	$search = $_GET['search'];
	echo "Amount >= Than: <b> $search </b><br><br>";
	
	include("connectionDB.php");
	
	$result = mysqli_query($link, "SELECT * FROM transactions WHERE amount >= '$search'");
	
	echo "<table border=1;> ";
	echo "<tr>";
	echo "<th>Transaction ID</th>";
	echo "<th>Description</th>";
	echo "<th>Amount</th>";
	echo "</tr>";
	while ($row = mysqli_fetch_row($result)){ 
		echo "<tr>";
		echo "<td>$row[0]</td>";
		echo "<td>$row[1]</td>";
		echo "<td>$row[2]</td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>

<br><br>
<a href=logout.php>Close Session</a><br><br>
<a href=control-panel.php>Return to Control Panel</a><br><br>
<a href=login.php>Return to Login</a>