<!DOCTYPE HTML>
<html lang="en-UK">

<head>
    <?php include "Components/head.html"; ?>

    <title>Grocery App - Search</title>

</head>

<body>
    <!-------------------------------------Nav-->
    <?php include "Components/nav.html"; ?>
    <!------------------------------------------------------------Main-->
    <main>
        <section class="main">
            <input type="text" placeholder="Product/Shop">
            <button class="button">Search</button>
            <div id="result-div">
                <p>Tesco</p>
                <p>Milk</p>
                <p>€10:80</p>
            </div>

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