<?php
// make sure our code knows about the Student class
require 'student.php';
// make database connection
$dblink = mysqli_connect('localhost', 'root', '', 'student');
// Check if connection exists
if (!$dblink) {
  die("Connection error: " . mysqli_connect_error());
}
$s = new student('', '', '', '', '', '', '', '');
$s->LoadFromDatabase($dblink, '42');
var_dump($s);
$dblink->close();
?>