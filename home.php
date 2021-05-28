<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en-UK">

<head>
    <?php
    include "PHP/function.php";
    check_session();
    ?>
    <?php include "Components/head.php"; ?>
    <?php include "PHP/connector.php"; ?>
    <title>Grocery App - Home</title>
</head>

<body>
    <!-------------------------------------Nav-->
    <?php include "Components/nav.php"; ?>
    <!------------------------------------------------------------Main-->
    <main>
        <section class="main">

            <h2>Spending</h2>
            <?php
            $q = mysqli_query($con, "SELECT * FROM `category` WHERE `category`.`userID` = $_SESSION[id]");
            if (isset($q)) {
                echo "<div class='categories'>";
                while ($row = $q->fetch_array()) {
                    echo "<div class='category'>";
                    echo "<p class='left'><strong>$row[1]</strong></p>";
                    echo "<p class='right'>€$row[2]/€$row[3]</p>";
                    echo "<progress min='0' value='$row[2]' max='$row[3]'></progress>";
                    ////echo "</div><div class='category'>";
                    //// $prod = mysqli_query($con, "SELECT * FROM `product` WHERE `product`.`userID` = $_SESSION[id]");
                    //// if (isset($prod)) {
                    ////     echo "<div class='sub-category'><ol>";
                    ////     while ($pr = $prod->fetch_array()) {
                    ////         echo "<li><p class='left'>$pr[2]</p>";
                    ////         echo "<p class='right'>Spending: $pr[4]</p></li>";
                    ////     }
                    ////     echo "</ol></div>";
                    //// } else {
                    ////     echo "<div class='sub-category'>";
                    ////     echo "<strong>No Data Found</strong>";
                    ////    echo "</div>";
                    //// }
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "<div class='category'>";
                echo "<strong>No Data Found</strong>";
                echo "</div>";
            }
            ?>

        </section>
    </main>
    <!-------------------------------Footer-->
    <?php include "Components/footer.php"; ?>
    <script>
        if ('serverWorker' in navigator) {
            navigator.serviceWorker.register('JS/service-worker.js')
        }
    </script>
</body>

</html>