<?php  

$sname = "localhost";
$uname = "admin";
$password = "";

$db_name = "database";


$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}

?>