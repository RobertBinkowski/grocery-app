<?php

include("connector.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $mysql_query =  $con->prepare("SELECT * FROM `user` WHERE `username` = ?");
        $mysql_query->bind_param("s", $username);
        $mysql_query->execute();

        $resultSet = $mysql_query->get_result();

        if ($resultSet->num_rows > 0) {
            echo "Username taken!";
        } else {
            $query = $con->prepare("INSERT INTO user ( username, password, name, address) values (?,?,?,?)");
            $query->bind_param("ssss", $username, $password, $name, $address);
            $query->execute();
            prompt("User Created");
            header("Location: login.php");
            die;
        }
    } else {
        prompt("Creation Failed");
    }
}
