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

    <title>Grocery App - User</title>
</head>

<body>
    <!-------------------------------------Nav-->
    <?php include "Components/nav.php"; ?>
    <!------------------------------------------------------------Main-->
    <main>
        <section class="main">
            <svg id="user" version="1.2" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path d="M17,9c0-1.381-0.56-2.631-1.464-3.535C14.631,4.56,13.381,4,12,4S9.369,4.56,8.464,5.465C7.56,6.369,7,7.619,7,9  s0.56,2.631,1.464,3.535C9.369,13.44,10.619,14,12,14s2.631-0.56,3.536-1.465C16.44,11.631,17,10.381,17,9z" />
                <path d="M6,19c0,1,2.25,2,6,2c3.518,0,6-1,6-2c0-2-2.354-4-6-4C8.25,15,6,17,6,19z" />
            </svg>
            <h1>Hello <?php echo $_SESSION['name'] ?></h1>
            <form method="POST">
                <label for="name">Name</label><br>
                <input type="text" name="name" required value="<?php echo $_SESSION['name'] ?>"><br>
                <label for="address">Address</label><br>
                <textarea required name="address"><?php echo $_SESSION['address'] ?></textarea>
                <h3>Change Password</h3>
                <input type="password" name="pass" placeholder="Password"><br>
                <input type="password" name="confPass" placeholder="Confirm Password">
                <br><br>
                <div class="button">
                    <input type="submit" name="button" class="button" value="Save">
                </div>
                <div class="button">
                    <input type="submit" name="button" class="button" value="Log Out">
                </div>
                <div class="button red">
                    <input type="submit" id="red" name="button" class="button" value="Delete Account">
                </div>
            </form>
            <?php
            if (isset($_POST['button'])) {
                $actions = $_POST['button'];
                if ($actions == "Save") {
                    include("PHP/connector.php");
                    $pass = $_POST['pass'];
                    $confPass = $_POST['confPass'];
                    $name = $_POST['name'];
                    $address = $_POST['address'];

                    if ($pass == $confPass) {
                        if ($pass != '') {
                            $update = "UPDATE `user` SET `password` = '$pass' WHERE `user`.`ID` = $_SESSION[id];";
                            if ($con->query($update)) {
                                prompt("Updated");
                                header("Location: user.php");
                            } else {
                                prompt("Failed to update Password");
                            }
                        }
                    } else {
                        prompt("Ensure Password and Confirm password are the same!");
                    }
                    $update = "UPDATE `user` SET `name` = '$name' WHERE `user`.`ID` = $_SESSION[id];";
                    if ($con->query($update) === TRUE) {
                        prompt("Updated");
                        die;
                    } else {
                        prompt("Failed to update Name");
                    }
                    $update = "UPDATE `user` SET `address` = '$address' WHERE `user`.`ID` = $_SESSION[id];";
                    if ($con->query($update) === TRUE) {
                        prompt("Updated");
                        die;
                    } else {
                        prompt("Failed to update Address");
                    }

                    //prompt("Please make sure Password and Confirm Password are the same");
                } else if ($actions == "Log Out") {
                    end_session();
                } else if ($actions == "Delete Account") {
                    include("PHP/connector.php");
                    $update = "UPDATE `user` SET `disabled` = '1' WHERE `user`.`ID` = $_SESSION[id];";
                    if ($con->query($update) === TRUE) {
                        prompt("Sad to see you go");
                        end_session();
                    } else {
                        prompt("Could Not Delete");
                    }
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