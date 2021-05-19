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

    <title>Grocery App - Add Receipt</title>
</head>

<body>
    <!-------------------------------------Nav-->
    <?php include "Components/nav.php"; ?>
    <!------------------------------------------------------------Main-->
    <div id="big-Pic-div" onclick="bigScreen()">
        <img src="" alt="picture" id="big-pic" onclick="bigScreen()">
    </div>
    <main>
        <section class="main">
            <div>
                <div id="receipt-div">
                    <img src="ICO/PICTURES/image.png" alt="Upload Image" onclick="bigScreen()" id="receipt" onclick="getFile()"><br>
                    <button onclick="getFile()" class="button">Upload</button>
                    <button onclick="recognisePicture()" class="button">Read</button>
                    <button onclick="getProducts()" class="button">Get Produycts</button>
                </div>
                <div id="result-div">
                    <h1>Read</h1>
                    <p id="result"></p>
                </div>
                <div id="products-div">
                    <h2>Products Found</h2>
                    <p id="products"></p>
                </div>
                <div>
                    <ul>
                        <li>
                            <div>
                                <input type="text" placeholder="Product 1"><br>
                                <select aria-placeholder="Category">
                                    <option>One</option>
                                </select>
                                <select aria-placeholder="Sub Category">
                                    <option>Sub One</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div>
                                <input type="text" placeholder="Product 2"><br>
                                <select aria-placeholder="Category">
                                    <option>One</option>
                                </select>
                                <select aria-placeholder="Sub Category">
                                    <option>Sub One</option>
                                </select>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

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