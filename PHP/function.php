<?php
function check_session()
{
    if (!isset($_SESSION['id'])) {
        header("Location: login.php");
    } else {
        include("PHP/connector.php");
        $info = mysqli_query($con, "SELECT * FROM `user` WHERE `ID` = $_SESSION[id]");
        $update = mysqli_fetch_array($info);
        $_SESSION['name'] = $update[3];
        $_SESSION['address'] = $update[4];
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
            $products = mysqli_query($con, "SELECT * FROM `product` WHERE `receiptID` = $row[0]");
            if (!isset($products)) {
                echo "<p>No Products</p>";
            } else {
                echo "<ol>";
                while ($product = $products->fetch_array()) {
                    echo "<li><p>$product[2] - €$product[5]<br></p></li>"; //Display Product and it's price
                }
                echo "</ol>";
            }
            echo "</div>";
            if ($row[4] != "") {
                echo "<div class='img'>";
                echo "<img src='$row[4]' alt='receipt'></div>"; // Receipt
                echo "</div>";
            }
            echo "</div>";
        }
        echo "</div>";
    }
    mysqli_close($con);
}
function display_monthly()
{
    // include("PHP/connector.php");
    // $result = mysqli_query($con, "SELECT * FROM `receipt` WHERE `userID` = $_SESSION[id]");
    // if (!isset($result)) {
    //     echo "<div class='result'><p>No Data</p></div>";
    // } else {
    //     echo "<div class='outcome'>";
    //     while ($row = $result->fetch_array()) {
    //         echo "<div class='result'>";
    //         echo "<div class='info'>";
    //         echo "<p class='store_name'><b>$row[1]</b></p>"; //Shop name
    //         echo "<p class='amount'><b>€$row[2]</b></p>"; // Amount Spent
    //         echo "<p class='time' >$row[3]</p>"; //time
    //         $products = mysqli_query($con, "SELECT * FROM `product` WHERE `receiptID` = $row[0]");
    //         if (!isset($products)) {
    //             echo "<p>No Products</p>";
    //         } else {
    //             echo "<ol>";
    //             while ($product = $products->fetch_array()) {
    //                 echo "<li><p>$product[2] - €$product[5]<br></p></li>"; //Display Product and it's price
    //             }
    //             echo "</ol>";
    //         }
    //         echo "</div>";
    //         if ($row[4] != "") {
    //             echo "<div class='img'>";
    //             echo "<img src='$row[4]' alt='receipt'></div>"; // Receipt
    //             echo "</div>";
    //         }
    //         echo "</div>";
    //     }
    //     echo "</div>";
    // }
    // mysqli_close($con);
}
function diplay_weekly()
{
}
function display_search($data)
{
    // 'name'
    include("PHP/connector.php");
    $result = mysqli_query($con, "SELECT * FROM `receipt` WHERE `userID` = $_SESSION[id] AND `shop_name` LIKE '$data' ");
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
            $products = mysqli_query($con, "SELECT * FROM `product` WHERE `receiptID` = $row[0]");
            if (!isset($products)) {
                echo "<p>No Products</p>";
            } else {
                echo "<ol>";
                while ($product = $products->fetch_array()) {
                    echo "<li><p>$product[2] - €$product[5]<br></p></li>"; //Display Product and it's price
                }
                echo "</ol>";
            }
            echo "</div>";
            if ($row[4] != "") {
                echo "<div class='img'>";
                echo "<img src='$row[4]' alt='receipt'></div>"; // Receipt
                echo "</div>";
            }
            echo "</div>";
        }
        echo "</div>";
    }
    mysqli_close($con);
}
