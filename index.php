<!DOCTYPE HTML>
<html lang="en-UK">

<head>

    <?php include "Components/head.php" ?>

    <title>Grocery App - Home</title>
</head>

<body>
    <!------------------------------------------------------------Main-->
    <div id="logIn">
        <div class="button">
            <a href="login.php">
                <p>log In</p>
            </a>
        </div>
        <div class="button">
            <a href="register.php">
                <p>Register</p>
            </a>
        </div>
    </div>
    <main>
        <section class="main">
            <h1>Grocery App</h1>
            <p>Welcome to our Grocery App</p>
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
        #logIn {
            position: absolute;
            right: 1em;
            top: 1em;
            display: flex;
        }

        #logIn div {
            margin: .2em;
        }

        #logIn p {
            margin: .5em;
        }
    </style>
</body>

</html>