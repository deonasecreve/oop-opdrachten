<?php

require_once 'student.php';
require_once 'studentcollection.php';

$s = new student ('99009000', 'Deona', '', 'Secreve', 'Schrijnwerkerstraat 14', '4204GR', 'Gorinchem', 'deona.secreve@outlook.com');
$x = new student ('99026577', 'Kirsa', '', 'Secreve', 'Schrijnwerkerstraat 14', '4204GR', 'Gorinchem', 'kirsa.secreve@outlook.com');

$col = new studentcollection();
$col->Add($s);
$col->Add($x);


echo 'Hier komen de Voornamen:';
echo $col->GetListFirstNames();

echo '<br/><br/>';

echo 'Hier komen alle gegevens van Deona en Kirsa:';
echo '<br><br>';
echo $col->ToJson();

$col->WriteJsonToFile('test.json');

echo '<br><br>';
echo 'Hier komen de vardumps van Deona en Kirsa:';

var_dump($col);
echo 'Hier komt de student die alleen nog bestaat:';
echo $col->RemoveByFirstname('Kirsa');
var_dump($col);


echo 'Hie komt de persoon die is gevonden bij de voornaam:';
echo '<br><br>';
print_r($col->FindByFirstname('Deona'));
echo '<br>';



echo '<br>';

echo'Hier komt alles uit de database:';
echo '<br/><br/>';
echo $col->ReadFromDatabase($dblink);

