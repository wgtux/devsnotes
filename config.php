<?php

$db_name = 'devsnotes';
$db_host = "localhost";
$db_user = "root";
$db_pas = "";

$pdo = new PDO("mysql:dbname=$db_name; host=$db_host", $db_user, $db_pas);

$array = [
    'error' => '',
    'pong' => true
];