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

    <title>Grocery App - Spedning</title>

</head>

<body>
    <!-------------------------------------Nav-->
    <?php include "Components/nav.php"; ?>
    <!------------------------------------------------------------Main-->
    <main>
        <section class="main">
            <form method="post">
                <select name="options">
                    <option value="all">All</option>
                    <option value="monthly">Monthly</option>
                    <option value="weekly">Weekly</option>
                </select>
                <input type="submit" value="Display" class="button">
            </form>
            <br>
            <?php
            if (isset($_POST['options'])) {
                $section = $_POST['options'];
                if ($section == "all") {
                    display_all();
                } else if ($section == "monthly") {
                    display_monthly();
                } else if ($section == "weekly") {
                    diplay_weekly();
                }
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