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
            <form method="POST">
                <input type="text" name="search" placeholder="Store">
                <input type="submit" value="Search" class="button">
            </form>
            <?php
            if (isset($_POST['search'])) {
                $data = $_POST['search'];
                display_search($data);
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