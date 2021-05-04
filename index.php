<!DOCTYPE HTML>
<html lang="en-UK">

<head>
    <!-- Font ------------------------------------------------------------------>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Da+2&display=swap" rel="stylesheet">

    <!-- Imports---------------------------------------------------------------->
    <link href="CSS/nav.css" rel="stylesheet" type="text/css" media="all" /><!-- Nav-->
    <link href="CSS/root.css" rel="stylesheet" type="text/css" media="all" /><!-- Root-->
    <link href="CSS/screen.css" rel="stylesheet" type="text/css" media="all" /><!-- Root-->
    <link rel="manifest" href="JSON/manifest.json" />
    <!-- Rest------------------------------------------------------------------->
    <meta name="Grocery App" content="Grocery Application">
    <link rel="icon" href="IMG/logo.png">
    <title>Grocery App - Add Receipt</title>

    <!-- Liblaries ------------------------------------------------------------>
    <script src='https://unpkg.com/tesseract.js@v2.1.0/dist/tesseract.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

    <!-- Scripts -------------------------------------------------------------->
    <script src="JS/tesseract.js"></script>

</head>

<body>
    <!-------------------------------------Nav-->
    <!-- <?php include "PHP/nav.html"; ?> -->
    <nav id="nav">
        <ul>
            <li class="button" id="name">
                <a href="index.php" target="_self">
                    <p>Grocery App</p>
                </a>
            </li>
            <li class="button">
                <a href="index.php" target="_self">
                    <svg style="enable-background:new 0 0 16 16;" version="1.1" viewBox="0 0 16 16" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path d="M15.45,7L14,5.551V2c0-0.55-0.45-1-1-1h-1c-0.55,0-1,0.45-1,1v0.553L9,0.555C8.727,0.297,8.477,0,8,0S7.273,0.297,7,0.555  L0.55,7C0.238,7.325,0,7.562,0,8c0,0.563,0.432,1,1,1h1v6c0,0.55,0.45,1,1,1h3v-5c0-0.55,0.45-1,1-1h2c0.55,0,1,0.45,1,1v5h3  c0.55,0,1-0.45,1-1V9h1c0.568,0,1-0.437,1-1C16,7.562,15.762,7.325,15.45,7z" />
                    </svg>
                    <p>Home</p>
                </a>
            </li>
            <li class="button">
                <a href="#" target="_self">
                    <svg style="enable-background:new 0 0 16 16;" version="1.1" viewBox="0 0 16 16" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path d="M5,0H1v16h4V0z M4,14H2v-1h2V14z M4,12H2v-1h2V12z M4,10H2V9h2V10z M3,3C2.448,3,2,2.552,2,2c0-0.552,0.448-1,1-1  s1,0.448,1,1C4,2.552,3.552,3,3,3z" />
                        <path d="M6,16h4V0H6V16z M8,1c0.552,0,1,0.448,1,1c0,0.552-0.448,1-1,1S7,2.552,7,2C7,1.448,7.448,1,8,1z M7,9h2v1H7V9z M7,11h2v1H7  V11z M7,13h2v1H7V13z" />
                        <path d="M15,0h-4v16h4V0z M14,14h-2v-1h2V14z M14,12h-2v-1h2V12z M14,10h-2V9h2V10z M13,3c-0.552,0-1-0.448-1-1c0-0.552,0.448-1,1-1  s1,0.448,1,1C14,2.552,13.552,3,13,3z" />
                    </svg>
                    <p>Add Reciept</p>
                </a>
            </li>
            <li class="button">
                <a href="#" target="_self">
                    <svg style="enable-background:new 0 0 16 16;" version="1.1" viewBox="0 0 16 16" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path d="M5,0H1v16h4V0z M4,14H2v-1h2V14z M4,12H2v-1h2V12z M4,10H2V9h2V10z M3,3C2.448,3,2,2.552,2,2c0-0.552,0.448-1,1-1  s1,0.448,1,1C4,2.552,3.552,3,3,3z" />
                        <path d="M6,16h4V0H6V16z M8,1c0.552,0,1,0.448,1,1c0,0.552-0.448,1-1,1S7,2.552,7,2C7,1.448,7.448,1,8,1z M7,9h2v1H7V9z M7,11h2v1H7  V11z M7,13h2v1H7V13z" />
                        <path d="M15,0h-4v16h4V0z M14,14h-2v-1h2V14z M14,12h-2v-1h2V12z M14,10h-2V9h2V10z M13,3c-0.552,0-1-0.448-1-1c0-0.552,0.448-1,1-1  s1,0.448,1,1C14,2.552,13.552,3,13,3z" />
                    </svg>
                    <p>Search</p>
                </a>
            </li>
            <li class="button">
                <a href="#" target="_self">
                    <svg style="enable-background:new 0 0 16 16;" version="1.1" viewBox="0 0 16 16" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path d="M5,0H1v16h4V0z M4,14H2v-1h2V14z M4,12H2v-1h2V12z M4,10H2V9h2V10z M3,3C2.448,3,2,2.552,2,2c0-0.552,0.448-1,1-1  s1,0.448,1,1C4,2.552,3.552,3,3,3z" />
                        <path d="M6,16h4V0H6V16z M8,1c0.552,0,1,0.448,1,1c0,0.552-0.448,1-1,1S7,2.552,7,2C7,1.448,7.448,1,8,1z M7,9h2v1H7V9z M7,11h2v1H7  V11z M7,13h2v1H7V13z" />
                        <path d="M15,0h-4v16h4V0z M14,14h-2v-1h2V14z M14,12h-2v-1h2V12z M14,10h-2V9h2V10z M13,3c-0.552,0-1-0.448-1-1c0-0.552,0.448-1,1-1  s1,0.448,1,1C14,2.552,13.552,3,13,3z" />
                    </svg>
                    <p>Spending</p>
                </a>
            </li>
        </ul>
    </nav>
    <!------------------------------------------------------------Main-->
    <main>
        <section class="main">
            <form class="">
                <button onclick="clear()" class="clear">X</button>
                <img src="IMG_20210430_103257.jpg" alt="receipt image" id="receipt" height="300" width="300">
                <br>
                <button onclick="recognisePicture()">Recognise</button>
                <button onclick="">Upload</button>
                <br>
                <p id="output" style="max-width: 30em;">none</p>
            </form>
        </section>
        <section>

        </section>
    </main>
    <!-------------------------------Footer-->
    <!-- <?php include "PHP/footer.html"; ?> -->
    <script>
        if ('serverWorker' in navigator) {
            navigator.serviceWorker.register('/sw.js')
        }
    </script>
</body>

</html>