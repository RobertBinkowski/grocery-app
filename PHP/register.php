<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //smth was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password)) {
        $mysql_query =  $db_connection->prepare("select * from users where user_name = ?");
        $mysql_query->bind_param("s", $user_name);
        $mysql_query->execute();

        $resultSet = $mysql_query->get_result();

        if ($resultSet->num_rows > 0) {
            echo "Username taken!";
        } else {
            //save to database
            $query = $db_connection->prepare("insert into users (user_name, password) values (?, ?)");
            $query->bind_param("ss", $user_name, $password);
            $query->execute();

            header("Location: login.php");
            die;
        }
    } else {
        echo "Please enter valid information!";
    }
}
