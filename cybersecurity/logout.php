<?php

session_start();

setcookie("username","",time()-1);
setcookie("password","",time()-1);

//unset ($SESSION['username']);
//unset ($SESSION['password']);

session_destroy();

header('Location: http://localhost/cybersecurity/login.php');

?>