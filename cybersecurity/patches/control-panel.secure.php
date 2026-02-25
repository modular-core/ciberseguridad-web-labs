<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "This page is only for registered users<br>";
    echo "<br><a href='login.php'>Login</a>";
    exit;
}

$now = time();
if ($now > $_SESSION['expire']) {
    session_destroy();
    echo "Session Finished,
    <a href='login.php'>You need to Login</a>";
    exit;
}

// Display user information as text, not executable content
$usernameCookie = $_COOKIE["username"] ?? '';
$username = base64_decode($usernameCookie, true);
$safeUsername = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');

echo "Hello: " . $safeUsername;
echo "<br>";
echo "[ Session: " . $safeUsername . " ]";
?>

<br><br>
<form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>">
    <input type="text" name="search">
    <input type="submit" name="submit" value="Search"><br>
</form>

<?php
if (isset($_GET['submit'])) {
    // Encode output to prevent script execution
    $search = $_GET['search'] ?? '';
    $safeSearch = htmlspecialchars($search, ENT_QUOTES, 'UTF-8');
    echo "Search Result: <b> " . $safeSearch . " </b><br><br>";
}
?>

<?php
include("connectionDB.php");

// Identity is still resolved for the lab, but output is handled safely
$result = mysqli_query(
    $link,
    "SELECT * FROM login_table WHERE userid = '" . mysqli_real_escape_string($link, $username) . "'"
);

echo "<table border=1;> ";
echo "<tr>";
echo "<th>User ID</th>";
echo "<th>Password</th>";
echo "<th>Name</th>";
echo "</tr>";

while ($row = mysqli_fetch_row($result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row[0], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td>" . htmlspecialchars($row[1], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td>" . htmlspecialchars($row[2], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "</tr>";
}
echo "</table>";
?>

<br><br>
<a href="administrator.php">Administrator Page</a><br><br>
<a href="transactions.php">Transactions</a><br><br>
<a href="logout.php">Logout</a><br><br>
<a href="login.php">Return to Login</a>