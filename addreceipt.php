<?php
session_start();
include "PHP/connector.php";
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
    <div id="big-Pic-div">
        <img src="" alt="picture" id="big-pic" onclick="bigScreen()">
    </div>
    <main>
        <section class="main">
            <div>
                <form id="receipt-div" method="POST">
                    <img src="ICO/PICTURES/image.png" alt="Upload Image" onclick="bigScreen()" id="receipt" onchange="return recognisePicture()">
                    <input type="date" required name="date">
                    <input type="file" id="file" name="file" accept="image/png, image/jpeg" onchange="loadFile(event)"><br>
                    <button onclick="return recognisePicture()" class="button">Read</button>
                    <br>
                    <!-- <progress value="0" max="100"></progress> -->
                    <br>
                    <input type="text" name="store" id="storeName" placeholder="Shop Name">
                    <input type="text" name="storeAddress" id="storeAddress" placeholder="Shop Address">
                    <table id="dynamic">
                    </table>
                    <button class="button" onclick="return addFields()">Add Product</button>
                    <br><br>
                    <button type="submit" name="button" class="button" value="save">Save</button>
                    <button type="submit" name="button" class="button red" value="cancel">Cancel</button>
                </form>
                <?php
                if (isset($_POST['button'])) {
                    include "PHP/connector.php";
                    $action = $_POST['button'];
                    if ($action == "save") {
                        $date = $_POST['date'];
                        $userID = $_SESSION['id'];
                        $store = $_POST['store'];
                        $price = 0;
                        $img = "";
                        $id = NULL;
                        $user = $con->prepare("INSERT INTO `receipt` (`ID`, `shop_name`, `price`, `date`, `img_dir`, `userID`) VALUES (?, ?, ?,?, ?, ?);");
                        $user->bind_param("ssssss", $id, $store, $price, $date, $img, $userID);
                        $user->execute();

                        $recID = mysqli_insert_id($con);

                        for ($i = 0; $i < count($_POST['product']); $i++) {
                            $price = doubleval($_POST['price'][$i]);
                            $categoryID =  $_POST['category'][$i];
                            $amount = $_POST['amount'][$i];
                            $q = mysqli_query($con, "SELECT * FROM `category` WHERE `ID` = $categoryID AND `userID` = $_SESSION[id]");
                            $budget = 1000;
                            $spent = $amount * $price;
                            if (!isset($q)) { // If no Category is set
                                $user = $con->prepare("INSERT INTO `category` (`ID`, `Name`, `Spent`, `Budget`, `userID`) VALUES (?, ?, ?, ?, ?);");
                                $user->bind_param("ssssss", $id, $categoryID, $spent, $budget, $userID);
                                $user->execute();
                            } else {
                                //UPDATE `category` SET `Budget` = '20' WHERE `category`.`ID` = 13;
                                $user = $con->prepare("UPDATE `category` SET `Spent` = '$spent' WHERE `ID` = $categoryID AND `userID` = $_SESSION[id]");
                                //$user->bind_param("ssssss", $spent);
                                $user->execute();
                            }
                            //Update product
                            $item = $i - 1;
                            $name = $_POST['product'][$i];
                            $id = NULL;
                            $prod = $con->prepare("INSERT INTO `product` (`ID`, `userID` ,`Name`, `categoryID`, `price`, `receiptID`) VALUES (?, ?, ?, ?, ?, ?);");
                            $prod->bind_param("ssssss", $id, $userID, $name, $categoryID, $price, $recID);
                            for ($ii = 0; $ii < $amount; $ii++) {
                                $prod->execute();
                            }
                        }
                        prompt("Updated");
                        die;
                    }
                }
                ?>
                <p id="result"></p>
            </div>
        </section>
    </main>
    <!-------------------------------Footer-->
    <?php include "Components/footer.php"; ?>
    <script>
        if ('serverWorker' in navigator) {
            navigator.serviceWorker.register('JS/service-worker.js')
        }

        function addFields() {
            var table = document.getElementById("dynamic");
            var row = table.insertRow(0);
            var cell0 = row.insertCell(0);
            var cell1 = row.insertCell(1);
            var cell2 = row.insertCell(2);
            var cell3 = row.insertCell(3);
            var cell4 = row.insertCell(4);
            var cell5 = row.insertCell(5);
            var cell6 = row.insertCell(6);
            cell0.innerHTML = "<td><input type='text' required name='product[]' placeholder='Product' list='products' style='width:26em;''></td>";
            cell1.innerHTML = `<td><datalist id='products'>
            <?php
            $q = mysqli_query($con, "SELECT * FROM `product` WHERE `product`.`userID` = $_SESSION[id]");
            if (isset($q)) {
                while ($row = $q->fetch_array()) {
                    echo "<option value='$row[2]'>";
                }
            } else {
                echo "<option value=''>";
            }
            ?>
                        </datalist></td>`;
            cell2.innerHTML = "<td><input type='text' name='category[]' required placeholder='category' list='categories' style='width:10em;''></td>";
            cell3.innerHTML = `<td><datalist id='categories'>
            <?php
            $q = mysqli_query($con, "SELECT * FROM `category` WHERE `category`.`userID` = $_SESSION[id]");
            if (isset($q)) {
                while ($row = $q->fetch_array()) {
                    echo "<option value='$row[0]'>$row[1]</option>";
                }
            } else {
                echo "<option value=''>";
            }
            ?>
                        </datalist></td>`;
            cell4.innerHTML = "<td><input type='doubleval' required name='price[]' placeholder='Price' style='width:5em;'></td>";
            cell5.innerHTML = "<td><input type='number' name='amount[]' placeholder='Amount' style='width:5em;' value='1'></td>";
            cell6.innerHTML = "<td><button onclick='return deleteField(this)' class='button red'>X</button></td>";
            return false;
        }

        function addFields(text) {
            var table = document.getElementById("dynamic");
            var row = table.insertRow(0);
            var cell0 = row.insertCell(0);
            var cell1 = row.insertCell(1);
            var cell2 = row.insertCell(2);
            var cell3 = row.insertCell(3);
            var cell4 = row.insertCell(4);
            var cell5 = row.insertCell(5);
            var cell6 = row.insertCell(6);
            cell0.innerHTML = "<td><input type='text' required name='product[]' value=" + text + " placeholder='Product' list='products' style='width:26em;''></td>";
            cell1.innerHTML = `<td><datalist id='products'>
            <?php
            $q = mysqli_query($con, "SELECT * FROM `product` WHERE `product`.`userID` = $_SESSION[id]");
            if (isset($q)) {
                while ($row = $q->fetch_array()) {
                    echo "<option value='$row[2]'>";
                }
            } else {
                echo "<option value=''>";
            }
            ?>
                        </datalist></td>`;
            cell2.innerHTML = "<td><input type='text' name='category[]' required placeholder='category' list='categories' style='width:10em;''></td>";
            cell3.innerHTML = `<td><datalist id='categories'>
            <?php
            $q = mysqli_query($con, "SELECT * FROM `category` WHERE `category`.`userID` = $_SESSION[id]");
            if (isset($q)) {
                while ($row = $q->fetch_array()) {
                    echo "<option value='$row[0]'>$row[1]</option>";
                }
            } else {
                echo "<option value=''>";
            }
            ?>
                        </datalist></td>`;
            cell4.innerHTML = "<td><input type='doubleval' required name='price[]' placeholder='Price' style='width:5em;'></td>";
            cell5.innerHTML = "<td><input type='number' name='amount[]' placeholder='Amount' style='width:5em;' value='1'></td>";
            cell6.innerHTML = "<td><button onclick='return deleteField(this)' class='button red'>X</button></td>";
            return false;
        }

        function deleteField(row) {
            var i = row.parentNode.parentNode.rowIndex;
            document.getElementById("dynamic").deleteRow(i);
            return false;
        }

        function recognisePicture() {
            alert("This may take up to 10 s");
            Tesseract.recognize(
                document.getElementById("receipt").src,
                'eng', {
                    logger: m => console.log(m)
                }
            ).then(({
                data: {
                    text
                }
            }) => {
                text = text.toLowerCase();
                getProducts(text); // change to text
                shopDetails(text);
            })
            return false;
        }; //Read image with the Tesseract

        function getProducts(input) {
            var value = /\d+/g;
            var i;
            var output = "";
            i = input.search("reland.");
            do {
                output += input.charAt(i);
                i++;
            } while (input.lastIndexOf("total") != i);

            //remove values
            output = output.replaceAll("eur", "");
            output = output.replaceAll("€", "");

            output = output.split(" ");
            prompt(output);
            for (i = 0; i < output.length; i++) {
                addFields(output[i]);
            }

            return false;
        }

        function shopDetails(input) {
            var storeName = "";
            var storeAddress = "";
            var i;

            input = input.split();

            //In this I tried to find text that would correspond to a location on earth
            //Also the name of the store
            //// for(i =0; i < input.length() ;i++){
            //     // const cities = require('all-the-cities');
            //     // cities.filter(city => city.name.match('Albuquerque'));
            //// }


            document.getElementById("storeName").value = storeName;
            document.getElementById("storeAddress").value = storeAddress;
        }; //get the location of the receipt
    </script>
</body>

</html>