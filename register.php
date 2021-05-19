<?php
session_start();
if (isset($_SESSION['id'])) {
    header("Location: home.php");
}
?>
<!DOCTYPE HTML>
<html lang="en-UK">

<head>
    <?php include "Components/head.php"; ?>
    <?php include "PHP/signUp.php" ?>

    <title>Grocery App - Home</title>
</head>

<body>
    <!-------------------------------------Nav-->
    <!------------------------------------------------------------Main-->
    <main>
        <section class="login">

            <form method="POST">
                <label for="username">Username</label>
                <input type="text" id="username"><br>
                <label for="password">Password</label>
                <input type="password" id="password"><br>
                <input type="submit" value="log in" class="button">
                <input type="button" value="sign up" class="button">
            </form>

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