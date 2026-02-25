<!DOCTYPE html>

<html lang="en">

<head>
 <title>Contacts</title>
 <meta charset = "utf-8">
</head>

<body>

<?php
$content = isset($_GET['content']) ? trim($_GET['content']) : 'default';
include($_GET['content']);
?>
 
<footer>
    <br>
    <a href="http://localhost/cybersecurity/login.php">Return to Login</a>
</footer>

</body>
</html>