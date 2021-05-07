<!DOCTYPE HTML>
<html lang="en-UK">

<head>
    <?php include "Components/head.html"; ?>

    <title>Grocery App - Home</title>
</head>

<body>
    <!-------------------------------------Nav-->
    <?php include "Components/nav.html"; ?>
    <!------------------------------------------------------------Main-->
    <main>
        <section class="main">

            <img src="ICO/PICTURES/BreakdownSample.png" alt="spending breakdown">

            <h2>Spending</h2>
            <h3>Diary</h3>
            <ul>
                <li>Milk</li>
                <li>Milk</li>
            </ul>
            <h3>Vegitables</h3>
            <ul>
                <li>Apple</li>
                <li>Iphone</li>
                <li>Ipad</li>
                <li>iMac</li>
            </ul>
            <h3>Fruits</h3>
            <ul>
                <li>Potato</li>
                <li>Potato</li>
            </ul>
            <h3>Other</h3>
            <ul>
                <li>Water</li>
            </ul>

        </section>
    </main>
    <!-------------------------------Footer-->
    <?php include "Components/footer.html"; ?>
    <script>
        if ('serverWorker' in navigator) {
            navigator.serviceWorker.register('JS/service-worker.js')
        }
    </script>
</body>

</html>