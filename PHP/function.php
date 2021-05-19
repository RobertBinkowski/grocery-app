<?php

function check_session()
{
    if (!isset($_SESSION['id'])) {
        header("Location: login.php");
    }
}

function prompt($message)
{
    echo "<script type='text/javascript'> var message = alert('$message'); </script>";
}

function end_session()
{
    session_destroy();
    header("Location: login.php");
}

function display_all()
{
    include("PHP/connector.php");
    $result = mysqli_query($con, "SELECT * FROM `receipt` WHERE `userID` = $_SESSION[id]");
    if (!isset($result)) {
        echo "<div class='result'><p>No Data</p></div>";
    } else {
        echo "<div class='outcome'>";
        while ($row = $result->fetch_array()) {
            echo "<div class='result'>";
            echo "<div class='info'>";
            echo "<p class='store_name'><b>$row[1]</b></p>"; //Shop name
            echo "<p class='amount'><b>€$row[2]</b></p>"; // Amount Spent
            echo "<p class='time' >$row[3]</p>"; //time
            echo "</div>";
            //if ($row[4] != "") {
            echo "<div class='img'>";
            echo "<img src='$row[4]' alt='receipt'></div>"; // Receipt
            echo "</div>";
            //}
        }
        echo "</div>";
    }
    mysqli_close($con);
}
function display_monthly()
{
}
function diplay_weekly()
{
}
