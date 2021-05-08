<?php

header('Content-type: application/json');

include "DB.php";
$db = new DB('localhost', 'root', 'root', 'used');
$db->fetchAll('inventars');


$data = $db->getAll();

echo json_encode(array_values($data));
