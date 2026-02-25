<?php
if (!($link = mysqli_connect('localhost', 'root', '', 'security_db'))){
	echo "Database conection error.";
	exit();
}
?>