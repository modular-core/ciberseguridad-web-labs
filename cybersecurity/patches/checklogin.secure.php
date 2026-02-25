<?php
session_start();
include("connectionDB.php");

// Basic input presence check
if (!isset($_POST['username']) || !isset($_POST['password'])) {
    echo "Invalid request";
    exit;
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT userid FROM login_table WHERE userid = ? AND pass = ?";

$stmt = mysqli_prepare($link, $sql);

if ($stmt === false) {
    echo "Database error";
    exit;
}

mysqli_stmt_bind_param($stmt, "ss", $username, $password);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) > 0) {

    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    setcookie("username", base64_encode($username));
    setcookie("password", base64_encode($password));

    echo "Welcome: " . htmlspecialchars($_SESSION['username']);
    echo "<br><br><a href='control-panel.php'>Control Panel</a>";
    echo "<br><br><a href='login.php'>Return to Login</a>";

} else {

    echo "Incorrect Username or Password";
    echo "<br><a href='login.php'>Try it again</a>";
}

// Close statement
mysqli_stmt_close($stmt);
?>