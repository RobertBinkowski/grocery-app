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
    <?php include "PHP/login.php" ?>

    <title>Grocery App - Home</title>
</head>

<body>
    <!------------------------------------------------------------Main-->
    <main>
        <section class="main">
            <form method="POST" id="login">
                <img src="ICO/logo.png" alt="Grocery App">
                <h1>Grocery App</h1>
                <label for="username">Username</label><br>
                <input type="text" id="username" required name="username" placeholder="username"><br>
                <label for="password">Password</label><br>
                <input type="password" id="password" required name="password" placeholder="username">
                <br><br><br>
                <div class="button">
                    <input type="submit" value="log in" class="button">
                </div>
                <div class="button">
                    <a href="register.php">
                        <p>Register</p>
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

        #login {
            padding-top: 2em;
            min-width: 30em;
            min-height: 20em;
            border-radius: 1em;
        }

        #login img {
            height: 5em;
            width: 5em;
        }
    </style>
</body>

</html>