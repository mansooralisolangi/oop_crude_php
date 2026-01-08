<?php
include_once("database.php");


$obj = new Database();

// iss method main mene 2 paramter add kiye hn to abhe argumaints pass karna lazmi h 
$obj->insert("students",['name'=>'hatesh lakhani ', 'age'=>130, 'city'=>'mirpur khas']);
echo "data inserted successfully result neche h";
print_r($obj->getresult());



?>