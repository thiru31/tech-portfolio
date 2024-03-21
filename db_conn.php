<?php  

$sname = "localhost";
$uname = "thiruma3_contactform";
$password = "asdf";
$db_name = "thiruma3_contactform";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}

