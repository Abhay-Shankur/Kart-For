<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <!-- Web Icon -->
    <link rel="shortcut icon" href="./assets/const/logo/eKartIcon.jpg" type="image/x-icon">
    <!-- For Web Style  -->
    <link rel="stylesheet" href="css/const.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/cart.css">

    <!-- For logo icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- For Material icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- For google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- Prefunctioning JavaScript  -->
    <script src="js/image-load.js"></script>
    <title>Kart for</title>
</head>
<body onload="onbodyload()">
    <?php 
        require_once 'header.php';
    ?>

    <section>
        <?php
            /* PHP CODE */
            require './include/dbconfig.php';

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            if (isset($_COOKIE['emailid'])) {
                $sql = "SELECT  `user_cart` FROM `user` WHERE `user_email`='{$_COOKIE['emailid']}'";
                if(mysqli_query($conn,$sql)) {
                    $row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
                    $cartobj=json_decode($row["user_cart"],true);
                    if (!empty($cartobj)) {
                        echo "<div id='cart-list'>";
                        foreach ($cartobj as $orderkey => $ordervalue) {
                            echo "<div class='cart-list-item' data-catid='1' data-id='1' >
                                <div class='cart-list-item-title'>
                                    <div class='order-no'>{$orderkey}</div>
                                    <div class='order-status'>{$ordervalue['Order Detail']['Order Status']}</div>
                                </div>
                                <div class='cart-list-item-body'>
                                    <div class='product-name'>{$ordervalue['Product Detail']['Product Name']} ({$ordervalue['Product Detail']['Product Color']})</div>
                                    <div class='product-rating'><i class='fas fa-star'>{$ordervalue['Product Detail']['Product Rating']}</i></div>
                                    <div class='product-price'>₹{$ordervalue['Product Detail']['Product Price']}</div>
                                    <div class='product-seller'>{$ordervalue['Seller Detail']['Seller Company']}</div>
                                    <div class='product-image'><img src='{$ordervalue['Product Detail']['Product Image']}'></div>
                                </div>
                            </div>";    
                        }
                        echo "</div>";
                    } else {
                        echo "<img src='./assets/const/emptycart.png' onload='loadimage(this)' id='cart-empty'>";
                    }
                }
            } else {
                echo "<img src='./assets/const/buynow.png' onload='loadimage(this)' id='buy-now'>";
            }          

            // SQL Closing
            mysqli_close($conn);
        ?>
        
        
    </section>

    <!-- JavaScripts -->
    <script src="js\const.js"></script>
    <script src='js\form.js'></script>
    <script src="js\cart.js"></script>
    
    <?php 
        require_once 'footer.php';
    ?>
    
</body>
</html>