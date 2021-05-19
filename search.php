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

    <title>Grocery App - Search</title>

</head>

<body>
    <!-------------------------------------Nav-->
    <?php include "Components/nav.php"; ?>
    <!------------------------------------------------------------Main-->
    <main>
        <section class="main">
            <form action="" method="POST">
                <input type="text" placeholder="Product / Store">
                <input type="button" value="Search" class="button">
            </form>
            <?php

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