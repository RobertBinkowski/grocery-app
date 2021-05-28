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
    <?php include "PHP/register.php" ?>

    <title>Grocery App - Home</title>
</head>

<body>
    <!-------------------------------------Nav-->
    <!------------------------------------------------------------Main-->
    <main>
        <section class="login">

            <form method="POST" id="register">
                <img src="ICO/logo.png" alt="Grocery App">
                <h1>Register</h1>
                <label for="name">Name</label><br>
                <input required type="text" name="name"><br><br>
                <label for="address">Address</label><br>
                <textarea required name="address"></textarea><br><br>
                <label for="username">Username</label><br>
                <input required type="text" name="username"><br><br>
                <label for="password">Password</label><br>
                <input required type="password" name="password"><br><br>
                <label for="password">Confirm Password</label><br>
                <input required type="password" name="password"><br><br>
                <div class="button">
                    <input type="submit" value="register" class="button">
                </div>
                <div class="button">
                    <a href="login.php">
                        <p>Back</p>
                    </a>
                </div>
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
    <style>
        main {
            display: flex;
            justify-content: center;
        }

        #register {
            padding-top: 2em;
            min-width: 30em;
            min-height: 20em;
            border-radius: 1em;
        }

        #register img {
            height: 5em;
            width: 5em;
        }
    </style>
</body>

</html>