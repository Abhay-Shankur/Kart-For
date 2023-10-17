<?php 
    
?>
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
        <link rel="stylesheet" href="css/product.css">
        <link rel="stylesheet" href="css/order.css">

        <!-- For logo icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-- For Material icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <!-- For google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    
        <!-- Prefunctioning JavaScript  -->
        <script src="js/product-prefun.js"></script>
        <script src="js/image-load.js"></script>
        <title>Kart for</title>
    </head>
    
<body>

    <?php 
        require_once 'header.php';
    ?>

    <!-- For Pre Fetch for Product detail -->
    <?php 
    
    if(!empty($_REQUEST['productId'])) {
        $productId=$_REQUEST['productId'];
        /* PHP CODE */
        require './include/dbconfig.php';

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM `mobiles` WHERE `model_id`={$productId}";
        if(mysqli_query($conn,$sql)) {
            $row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
    ?>
        <!-- Content Area -->
        <section class="display-flex" id="content">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?productId=".$productId; ?>" class="display-flex" id="content-area" >
                <div class="display-flex" id="content-area-left-panel">
                    <div class="display-flex" id="product-left-area">
                        <?php 
                            /* PHP CODE */
                            $jsondataimages=json_decode($row["model_img"],true);
                            $imgStrArr=$jsondataimages["Other"];
                            $noImg=count($imgStrArr);
                        ?>
                        <div class="display-flex" id="product-left-section1">
                            <div class="display-flex" id="product-img">
                                <img id="product-img-main" src="<?php echo $jsondataimages["Design"]; ?>" width="100%" height="100%" alt="">
                            </div>
                            <div id="product-fav">
                                <i class='far fa-heart'></i>
                            </div>
                        </div>
                        <div class="display-flex" id="product-left-section2">
                            <div class="display-flex list-arrow" onclick="prevImg()">
                                <i class="material-icons" style="line-height: 2;">&#xe5cb;</i>
                            </div>
                            <div id="product-imgs-list">
                                <?php 
                                    /* PHP CODE */
                                    for($i=0;$i<$noImg;$i++){
                                        echo "<div class='imgs-list-items'>
                                        <img class='product-imgs' onload='loadimage(this)' onmouseover='imgin(this)' onmouseout='imgout()' onclick='imgclick(this)' src='{$imgStrArr[$i]}' data-imgid='{$i}' alt=''>
                                        </div>";
                                    }
                                ?>
                            </div>
                            <div class="display-flex list-arrow" onclick="nextImg()">
                                <i class="material-icons" style="line-height: 2;">&#xe5cc;</i>
                            </div>
                        </div>
                        <div class="display-flex" id="product-left-section3">
                            <input type="submit" name="add-to-cart" value="Add to Cart">
                            <input type="submit" name="buy-now" value="Buy Now">
                        </div>
                    </div>
                </div>
                <div class="display-flex" id="content-area-right-panel">
                    <div class="display-flex" id="product-right-area">
                        <div class="padding-5-10">
                            <span id="title"><?php /* PHP CODE */ echo $row["brand_name"]." ".$row["model_name"]; ?></span>
                        </div>
                        <div class="padding-5-10">
                            <span id="rating"><?php /* PHP CODE */ echo json_decode($row["model_rating"],true)["Rating"]; ?><i class="material-icons" style="font-size: 15px;font-weight: bolder;background-color: transparent;vertical-align: middle;margin-inline-start: 5px;">&#xe83a;</i></span>
                        </div>
                        <div class="padding-5-10">
                            <span id="price-new"><?php /* PHP CODE */ echo "₹".$row["model_price"]."/-"; ?></span>
                            <span id="price-old"><?php /* PHP CODE */ echo "₹",$row["model_price"]+5000 ."/-"; ?></span>
                        </div>
                        <div class="padding-5-10">
                            <ul>
                                <li>
                                    <span class="offers">Bank Offer</span>
                                </li>
                                <li>
                                    <span class="offers">Credit Card Offer</span>
                                </li>
                                <li>
                                    <span class="offers">EMI Offer</span>
                                </li>
                                <li>
                                    <span class="offers">Cashback Offer</span>
                                </li>
                            </ul>
                        </div>
                        <div class="padding-5-10">
                            <?php
                                /* PHP CODE */
                                $sqltemp ="SELECT `brand_name`,`brand_image` FROM `brand` WHERE `brand_id`='".$row['brand_id']."'";
                                $rowtemp = mysqli_fetch_assoc(mysqli_query($conn, $sqltemp));
                                echo "<img id='brand' src='data:image/jpeg;base64,".base64_encode($rowtemp["brand_image"])."' alt='".$rowtemp["brand_name"]."'>";
                                
                                $jsondatadesc=json_decode($row["model_description"],true);
                                echo "<span id='warranty'>".$jsondatadesc["Warranty"]."</span>";
                            ?>
                        </div>
                        <div class="padding-5-10">
                            <fieldset class="fieldsets">
                                <legend>Variants</legend>
                                <div class="fieldsets-div">
                                    <span class="fieldsets-div-title">
                                        Color 
                                        <!-- <span class="content-tiems">Red</span> -->
                                    </span>
                                    <select name="color-option" required>
                                        <option disabled selected value>---Select a Color---</option>
                                        <?php
                                            $jsondatacolor=json_decode($row["model_details"],true);
                                            foreach($jsondatacolor["General"]["Colours"] as $ind=>$val) {
                                                // echo $val;
                                        ?>
                                            <option value="<?php echo $val; ?>" ><?php echo $val; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </fieldset>
                        </div>
                        <div class="padding-5-10">
                            <fieldset class="fieldsets">
                                <legend>Highlights</legend>
                                <ul>
                                    <?php
                                        foreach ($jsondatadesc as $key => $value) {
                                    ?>
                                        <li><span><?php echo "{$key} : {$value}"; ?></span></li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </fieldset>
                        </div>
                        <div class="padding-5-10">
                            <fieldset class="fieldsets">
                                <legend>Seller</legend>
                                <div class="fieldsets-div">
                                    <span class="fieldsets-div-title">
                                        Seller
                                    </span>
                                    <span class="fieldsets-div-content">
                                        <?php $jsondataseller=json_decode($row["seller_info"],true); ?>
                                        <?php echo "Seller Id : {$jsondataseller['Seller ID']}"; ?>
                                        <br>
                                        <?php echo "Seller Name : {$jsondataseller['Seller Name']}"; ?>
                                        <br>
                                        <?php echo "Seller Company : {$jsondataseller['Seller Company']}"; ?>
                                    </span>
                                </div>
                            </fieldset>
                        </div>
                        <div class="padding-5-10">
                            <div id="full-spec-btn" onclick="openspec()">Show Full Specification <i class="fas fa-caret-down"></i></div>
                            <div id="full-spec-div">
                                <div id="full-spec-div-close" class="" onclick="closespec()"><i class="far fa-times-circle"></i></div>
                                <?php 
                                    $jsondatadetail=json_decode($row["model_details"],true);
                                    foreach ($jsondatadetail as $detailkey => $detailvalue) {
                                ?>
                                <table>
                                    <thead>
                                        <tr>
                                            <th colspan="2"><?php echo $detailkey; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($detailvalue as $key => $value) {
                                        ?>
                                        <tr>
                                            <th><?php echo isPrice($key); ?></th>
                                            <td><?php echo isArray($value); ?></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    <?php
        } else {
            echo "No Results Found".mysqli_error($conn);
        }
        // SQL Closing
        mysqli_close($conn);

    ?>

    <div id="order-overlay">
        <!-- <div id="order">
        </div> -->
    </div>

    <!-- JavaScripts -->
    <script src="js\const.js"></script>
    <script src='js\form.js'></script>
    <script src="js\product.js"></script>

    <?php    

        if(isset($_REQUEST['buy-now'])) {
            echo "<script>buyNow('{$productId}','{$_REQUEST['color-option']}');</script>";
        }
        if(isset($_REQUEST['add-to-cart'])) {
            echo "<script>addToCart('{$productId}','{$_REQUEST['color-option']}');</script>";
        }
        
        if(isset($_REQUEST['address-form-submit'])) {
            echo "<script>getTabs();</script>";
            echo "<script>nextTab();</script>";
            $userdetail=userDetail($_REQUEST['name'],$_REQUEST['phone'],$_REQUEST['fulladdress'],$_REQUEST['landmark'],$_REQUEST['city'],$_REQUEST['state'],$_REQUEST['pincode']);
            // print_r($userdetail);
            echo "<script>setDetails('Customer_Detail','{$userdetail}')</script>";
        }

        // $userdetail="";
        if (isset($_REQUEST['payment'])  && !empty($_COOKIE['emailid'])) { 
            $password=$_REQUEST['payment-password'];
            // global $userdetail;
            // print_r($GLOBALS['userdetail']);
            // paymentProcess($password);
            echo "<script>proccessOrder('{$password}');</script>";
        }
    } else {
        echo "<img onload='loadimage(this)' src='./assets/const/404_error_msg.png' style='display: flex;margin: auto;'>";
    }
    ?>

    <?php 
        require_once 'footer.php';
    ?>
    
</body>
</html>

<?php
    
    $flag=0;
    function isArray($arr) {
        $check=$GLOBALS['flag'];
        if (is_array($arr)) {
            return implode(",",$arr);
        } else if ($check==1) {
            return "₹".$arr;
        } else {
            return $arr;
        }
        
    }
    function isPrice($p) {
        $GLOBALS['flag']=0;
        if ($p=="Price in India") {
            $GLOBALS['flag']=1;
        } 
        return $p;
    }

    function userDetail($name,$phone,$fulladdress,$landmark,$city,$state,$pincode) {
        $address = array();
        (!empty($fulladdress)) ? array_push($address,$fulladdress) : 0 ;
        (!empty($landmark)) ? array_push($address,$landmark) : 0;
        (!empty($city)) ? array_push($address,$city) :0 ;
        (!empty($state)) ? array_push($address,$state) : 0;
        (!empty($pincode)) ? array_push($address,$pincode) :0 ;
        $str_add=implode(",",$address);
        echo "<script>document.getElementById('address-box-body').innerText='{$str_add}'</script>";

        $file=file_get_contents('./include/object.json');
        $arr_file=json_decode($file,true);
        $cartobject=$arr_file["Cart Object"];
        $customerdetail=$cartobject["Customer Detail"];
        $customerdetail["Customer Name"]=$name;
        $customerdetail["Customer Phone"]=$phone;
        $customerdetail["Customer Email"]=$_COOKIE['emailid'];
        $customerdetail["Customer Address"]["Full Address"]=$str_add;
        $customerdetail["Customer Address"]["City"]=$city;
        $customerdetail["Customer Address"]["State"]=$state;
        $customerdetail["Customer Address"]["Pincode"]=$pincode;
        $encoded=json_encode($customerdetail);
        return $encoded;
    }

    function paymentProcess($pass) {
        require './include/dbconfig.php';
        $sql="SELECT  `user_paypassword` FROM `user` WHERE `user_email`='{$_COOKIE['emailid']}'";
        if($row=mysqli_fetch_assoc(mysqli_query($conn,$sql))) {
            $depass=openssl_decrypt($row["user_paypassword"],"AES-128-ECB","kartfor3812");
            if ($pass == $depass) {
                echo "<script>proccessOrder();</script>";
            } else {
            //     echo "<div class='order-alert' id='order-warning'>
            //     <div class='order-closing order-warning' onclick='closeoverlay()'><i class='fas fa-times-circle'></i></div>
            //     <hr>
            //     <div class='order-message order-warning'>You are Not Logged In !</div>
            //     <div class='order-type order-warning'><i class='fas fa-exclamation-triangle'></i></div>
            // </div>";
                echo $depass;
            }
        } else {
            echo mysqli_error($conn);
        }
        // SQL Closing
        mysqli_close($conn);
    }

?>