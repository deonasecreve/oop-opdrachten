<?php

require 'student.php';
require_once 'savetodb.php';

$dblink = mysqli_connect('localhost','root', '', 'student');

if (!$dblink) {
	die("connection error: " . mysqli_connect_error());
}

$s = new student  ('99026577', 'Tim', 'de', 'Heiland', 'Hugo de Grootstraat 12', '4206 ZE', 'Gorinchem', 'tim.heiland@gmail.com');
$s1 = new student ('91034567', 'Maaike', 'de', 'Vis', 'Laan van Nieuw Zeeland 3', '3798 DT', 'Dordrecht', 'mdevis@gmail.com');
$s2 = new student ('99012345', 'Leo', 'bakt', 'iets', 'Fantasiestraat 1', '1111 FA', 'Fantasiewerled', 'leo@live.nl');

$s2->SaveTodb($dblink);

$dblink->close();


?>