<?php

include("connector.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        //Prepare a query
        $query = $con->prepare("select * from user where username = ? limit 1");
        $query->bind_param("s", $username);
        $query->execute();

        //If empty
        if (!isset($query)) {
            prompt("No Users Registered");
        }
        $resultSet = $query->get_result();

        //Check
        if ($resultSet->num_rows > 0) {
            $obj = $resultSet->fetch_object();
            if ($obj->disabled == 0) {
                if ($password === $obj->password) {
                    //Data to store in session
                    $_SESSION['id'] = $obj->ID;
                    $_SESSION['name'] = $obj->name;
                    $_SESSION['address'] = $obj->address;
                    header("Location: home.php");
                    die;
                }
            } else {
                prompt("Account Does not Exist");
            }
        }

        prompt("Incorrect Credentials");
    } else {
        prompt("Incorrect Credentials");
    }
}
