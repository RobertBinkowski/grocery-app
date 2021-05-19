<?php

// $host = 'binkowski9569305.domaincommysql.com';
// $user = 'robert';
// $password = '\xvDpfLq;Yk:86_>';
// $database_name = 'grocery_app_250';
$host = 'localhost';
$user = 'user';
$password = 'pass';
$database_name = 'grocery_app_250';


$con = new mysqli($host, $user, $password, $database_name);

if ($con->connect_error) {
    die("Connection Failed: " . $con->connect_error);
}

// $link = mysql_connect('binkowski9569305.domaincommysql.com', 'robert', '\xvDpfLq;Yk:86_>');
// if (!$link) {
//     die('Could not connect: ' . mysql_error());
// }
// echo 'Connected successfully';
// mysql_select_db(grocery_app_250);
