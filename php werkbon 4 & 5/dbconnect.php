<?php	
 session_start();

$dblink = mysqli_connect('localhost','root', '', 'student');

if(!$dblink) {
	die("Connection Error: " . mysqli_connect_error());
}

?>