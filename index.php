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
            <img src="ICO/logo.png" alt="Grocery App">
            <h1>Grocery App</h1>
            <p>Welcome to our Grocery App</p>
            <p>This app is created to ehlp you maintain your expences</p>
        </section>
        <br>
        <section>
            <h2>Purpose</h2>
            <p>Welcome to my grocery app, I cerated this project to satisfy my final project for the 3rd year college project</p>
            <p>I used these languages:</p>
            <ul>
                <li>PHP</li>
                <li>SCSS</li>
                <li>JavaScript</li>
            </ul>
            <p>Liblaries:</p>
            <ul>
                <li>Tesseract.php</li>
            </ul>
            <p>Serve Side</p>
            <ul>
                <li>MySQL</li>
            </ul>
        </section>
        <br>
        <section>
            <svg version="1.2" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path d="M17,9c0-1.381-0.56-2.631-1.464-3.535C14.631,4.56,13.381,4,12,4S9.369,4.56,8.464,5.465C7.56,6.369,7,7.619,7,9  s0.56,2.631,1.464,3.535C9.369,13.44,10.619,14,12,14s2.631-0.56,3.536-1.465C16.44,11.631,17,10.381,17,9z" />
                <path d="M6,19c0,1,2.25,2,6,2c3.518,0,6-1,6-2c0-2-2.354-4-6-4C8.25,15,6,17,6,19z" />
            </svg>
            <h2>Me</h2>
            <p>Hello, My name is Robert Binkowski. I am a software developer in 3rd year college</p>
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
            max-width: 20em;
            position: fixed;
            right: 0;
            padding: 1em;
            background-color: var(--bg-1);
        }

        .button {
            padding-left: 1em;
            padding-right: 1em;
        }

        img {
            height: 5em;
            width: 5em;
        }

        svg {
            height: 5em;
            width: 5em;
        }
    </style>
</body>

</html>