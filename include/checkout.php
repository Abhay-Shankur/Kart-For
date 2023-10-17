<?php
    require 'dbconfig.php';

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Tabs
    if (isset($_REQUEST['tabs']) && isset($_COOKIE['emailid'])) {
        $productId=$_COOKIE['Product_Id'];
        $categoryId=substr($productId,0,3);

        $sqlretrive =" SELECT `table_name` FROM `category` WHERE `category_id`=$categoryId;";
        $result = mysqli_query($conn, $sqlretrive);
        $row = mysqli_fetch_assoc($result);
        $tableName=$row["table_name"];
        
        $sqlretrive =" SELECT * FROM `{$tableName}` WHERE `model_id`=".$productId;
        $result = mysqli_query($conn, $sqlretrive);
        $sql="SELECT * FROM `user` WHERE `user_email`='{$_COOKIE['emailid']}'";
        $res= mysqli_query($conn,$sql);
        $row1 = mysqli_fetch_assoc($res);
        if (!empty($row1["user_paydetails"])) {
            if (mysqli_num_rows($result) > 0 ) {
                $row = mysqli_fetch_assoc($result);
                $rating=json_decode($row['model_rating'],true);
                $imgStrArr=json_decode($row["model_img"],true);
                echo "<div id='order'>
                        <div id='order-head'>
                            <div class='order-head-nav'>
                                <div class='order-head-nav-item active-tab-head' data-id='address'>1</div>
                                <span>Your Address</span>
                            </div>
                            <hr>
                            <div class='order-head-nav'>
                                <div class='order-head-nav-item' data-id='summary'>2</div>
                                <span>Order Summary</span>
                            </div>
                            <hr>
                            <div class='order-head-nav'>
                                <div class='order-head-nav-item' data-id='payment'>3</div>
                                <span>Payment</span>
                            </div>
                        </div>
                        <div id='order-body'>
                            <div class='tab-navigators' onclick='prevTab()' id='prev'><i class='fas fa-chevron-circle-left'></i></div>
                            <div class='tab active-tab' data-tab-no='1' id='address'>
                                <form  action='./product.php?productId=$productId' method='POST'>
                                    <div class='items-group'>
                                        <fieldset>
                                            <legend>Your Full Name *</legend>
                                            <input type='text' name='name' required>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Your Phone No *</legend>
                                            <input type='tel' name='phone' required>
                                        </fieldset>
                                    </div>
                                    <div class='items-group'>
                                        <fieldset>
                                            <legend>Full Address *</legend>
                                            <textarea name='fulladdress' required></textarea>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Landmark</legend>
                                            <input type='text' name='landmark'>
                                        </fieldset>
                                        <fieldset>
                                            <legend>City *</legend>
                                            <input type='text' name='city' required>
                                        </fieldset>
                                        <fieldset>
                                            <legend>State *</legend>
                                            <input type='text' name='state' required>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Pincode *</legend>
                                            <input type='text' name='pincode' required>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Location</legend>
                                            <div id='geo-location' onclick='getlocation()'><i class='fas fa-map-marked-alt' onclick=''>Use Current Location</i></div>
                                        </fieldset>
                                    </div>
                                    <div id='div-next'><input type='submit' name='address-form-submit' value='Next'><i class='fas fa-chevron-circle-right'></i></div>
                                </form>
                            </div>
                            <div class='tab' data-tab-no='2' id='summary'>
                                <div id='left-summary'>
                                    <div id='product-box'>
                                        <div id='product-box-title'>Your Product</div>
                                        <div id='product-box-body'>
                                            <span id='product-box-name'>{$row['model_name']}</span>
                                            <span id='product-box-rating'><i class='fas fa-star'>{$rating['Rating']}</i></span>
                                            <span id='product-box-prize'>₹{$row['model_price']}</span>
                                            <span id='product-box-delivery'>Guaranteed delivery in 4-5 days</span>
                                            <span id='product-box-img'><img onload='loadimage(this)' src='{$imgStrArr['Design']}'></span>
                                        </div>
                                    </div>
                                    <div id='address-box'>
                                        <div id='address-box-title'>Your Address</div>
                                        <div id='address-box-body'></div>
                                    </div>
                                </div>
                                <div id='right-summary'>
                                    <div id='invoice-box'>
                                        <div id='invoice-box-title'>Your Product Invoice</div>
                                        <div id='invoice-box-body'>
                                            <div class='invoice-box-body-row row1'>
                                                <div class='invoice-box-body-col1 '>Product Price</div>
                                                <div class='invoice-box-body-col2'> ₹{$row['model_price']}</div>
                                            </div>
                                            <div class='invoice-box-body-row row2'>
                                                <div class='invoice-box-body-col1'>Delivery</div>
                                                <div class='invoice-box-body-col2'>+ ₹".delivery($row['model_price'])."</div>
                                            </div>
                                            <div class='invoice-box-body-row row3'>
                                                <div class='invoice-box-body-col1'>Discount</div>
                                                <div class='invoice-box-body-col2'>- ₹".discount($row['model_price'])."</div>
                                            </div>
                                            <hr>
                                            <div class='invoice-box-body-row row4'>
                                                <div class='invoice-box-body-col1'>Total</div>
                                                <div class='invoice-box-body-col2'> ₹".gettotal()."</div>
                                            </div>
                                            <hr>
                                            <input type='hidden' id='hidden-input-invoice' value='".setData($row['model_price'])."'>
                                            <input type='hidden' id='hidden-input-seller' value='{$row['seller_info']}'>
                                            <div id='div-next' onclick='nextTab()'><div>Next</div> <i class='fas fa-chevron-circle-right'></i></div>
                                            <!-- <div id='invoice-box-body-invoice-button'><a href='./document/temp.txt' download>Download Product Invoice</a><i class='fas fa-file-download'></i></div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='tab' data-tab-no='3' id='payment'>
                                <form action='./product.php?productId=$productId' method='post' style='display:flex;width:100%;height:100%;'>
                                    <div id='left-summary'>
                                        <div class='box'>
                                            <div class='box-title'>Your PayKart Coins</div>
                                            <div class='box-body'>
                                                <span>You </span>
                                                <div class='div-coins'>
                                                    <span>{$row1['user_paycoins']}</span>
                                                    <i class='fas fa-dollar-sign'></i>
                                                </div>
                                                <div class='div-coins'>
                                                    <span>Add More</span>
                                                    <i class='fas fa-plus-circle'></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='box'>
                                            <div class='box-title'>Choose a Payment Option </div>
                                            <div class='box-body'>
                                                <div class='payment-option'><input type='radio' name='payment-option' val='pcn' required> Pay Coins</div>
                                                <div class='payment-option'><input type='radio' name='payment-option' val='card' required disabled> Card</div>
                                                <div class='payment-option'><input type='radio' name='payment-option' val='upi' required disabled> UPI</div>
                                                <div class='payment-option'><input type='radio' name='payment-option' val='cod' required disabled> Cash On Delivery</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id='right-summary'>
                                        <div class='box'>
                                            <div class='box-title'>Payment</div>
                                            <div class='box-body'>
                                                <div class='items-group'>
                                                    <div class='invoice-box-body-row row4'>
                                                        <div class='invoice-box-body-col1'>Total</div>
                                                        <div class='invoice-box-body-col2'>".gettotal()."</div>
                                                    </div>
                                                </div>
                                                <div class='items-group'>
                                                    <fieldset>
                                                        <legend>Payment Password *</legend>
                                                        <input type='password' name='payment-password' placeholder='Enter Your Payment Password' required>
                                                    </fieldset>
                                                    <input type='submit' name='payment' value='Pay'>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>";
            } else {
                echo "<div class='order-alert' id='order-error'>
                    <div class='order-closing order-error' onclick='closeoverlay()'><i class='fas fa-times-circle'></i></div>
                    <hr>
                    <div class='order-message order-error'>Something went wrong. Please try Again</div>
                    <div class='order-type order-error'><i class='fas fa-exclamation-circle'></i></div>
                </div>";
            }
        } else {
            echo "<div class='order-alert' id='order-warning'>
                <div class='order-closing order-warning' onclick='closeoverlay()'><i class='fas fa-times-circle'></i></div>
                <hr>
                <div class='order-message order-warning'>You Don't have PayKart Account !</div>
                <div class='order-type order-warning'><i class='fas fa-exclamation-triangle'></i></div>
            </div>";
        }
        
    }

    // Not Logged in
    if (isset($_REQUEST['notLoggedIn'])) {
        echo "<div class='order-alert' id='order-warning'>
            <div class='order-closing order-warning' onclick='closeoverlay()'><i class='fas fa-times-circle'></i></div>
            <hr>
            <div class='order-message order-warning'>You are Not Logged In !</div>
            <div class='order-type order-warning'><i class='fas fa-exclamation-triangle'></i></div>
        </div>";
    }

    // Add to Cart
    if (isset($_REQUEST['productId']) && isset($_REQUEST['color'])  && isset($_COOKIE['emailid'])) {
        $productId=$_REQUEST['productId'];
        $categoryId=substr($productId,0,3);
        
        $sqlretrive =" SELECT `table_name` FROM `category` WHERE `category_id`=$categoryId;";
        $result = mysqli_query($conn, $sqlretrive);
        $row = mysqli_fetch_assoc($result);
        ($row > 0 ? $tableName=$row["table_name"] : 0 );

        $sqlretrive =" SELECT * FROM `{$tableName}` WHERE `model_id`=".$productId;
        $result = mysqli_query($conn, $sqlretrive);
        $row = mysqli_fetch_assoc($result);
        // echo $row["model_details"];
        if ($row > 0) {
            $productname=$row["model_name"];
            $sellerinfo=$row["seller_info"]; 
            $productprice=$row["model_price"];
            $productimage=json_decode($row["model_img"],true)["Design"];
            $productrating=json_decode($row["model_rating"],true)["Rating"];
        }  

        $sqlretrive="SELECT `user_cart` FROM `user` WHERE `user_email`='{$_COOKIE['emailid']}'";
        $result = mysqli_query($conn, $sqlretrive);
        $row = mysqli_fetch_assoc($result);
        if ($row > 0) {
            $jsoncart=json_decode($row["user_cart"],true);  
            $n;
            if (!is_null($jsoncart)) {
                $n=count($jsoncart);
            } else {
                $jsoncart=json_decode("{}",true);
                $n=0;
            }
            $itemexist=0;
            if ($n>0) {
                foreach ($jsoncart as $key => $value) {
                    if ($value["Product Detail"]["Product Id"] == $productId && $value["Product Detail"]["Product Color"] == $_REQUEST['color']) {
                        $itemexist=1;
                    }
                }
            }
            
            if ($itemexist == 0) {
                $file=file_get_contents('object.json');
                $arr_file=json_decode($file,true);
                // Cart
                    $cartobject=$arr_file["Cart Object"]; 
                // Cart Order Details
                    // $cartobject["Order Detail"]["Order Id"];
                    $cartobject["Order Detail"]["Order Status"]="In Cart";
                    // $cartobject["Order Detail"]["Order Time"];
                // Cart Product Detail
                    $cartobject["Product Detail"]["Product Id"]=$productId;
                    $cartobject["Product Detail"]["Product Name"]=$productname;
                    $cartobject["Product Detail"]["Category Id"]=$categoryId;
                    $cartobject["Product Detail"]["Product Color"]=$_REQUEST['color'];
                    $cartobject["Product Detail"]["Product Price"]=$productprice;
                    $cartobject["Product Detail"]["Product Image"]=$productimage;
                    $cartobject["Product Detail"]["Product Rating"]=$productrating;
                // Cart Customer Detail
                // Cart Seller Detail
                    $cartobject["Seller Detail"]=json_decode($sellerinfo,true);
                // Cart Invoice Detail

                $next=$n+1;
                $jsoncart["Order {$next}"]=$cartobject;
                $strcart=json_encode($jsoncart,true);
                // echo $strcart;
                $sqlinsert="UPDATE `user` SET `user_cart`='{$strcart}' WHERE `user_email`='{$_COOKIE['emailid']}'";
                if (mysqli_query($conn,$sqlinsert)) {
                    echo "<div class='order-alert' id='order-success'>
                        <div class='order-closing order-success' onclick='closeoverlay()'><i class='fas fa-times-circle'></i></div>
                        <hr>
                        <div class='order-message order-success'>Your Item added to Cart</div>
                        <div class='order-type order-success'><i class='fas fa-check-circle'></i></div>
                    </div>";
                } else {
                    echo "<div class='order-alert' id='order-error'>
                        <div class='order-closing order-error' onclick='closeoverlay()'><i class='fas fa-times-circle'></i></div>
                        <hr>
                        <div class='order-message order-error'>Something went wrong. Please try Again</div>
                        <div class='order-type order-error'><i class='fas fa-exclamation-circle'></i></div>
                    </div>";
                }
            } else {
                echo "<div class='order-alert' id='order-warning'>
                    <div class='order-closing order-warning' onclick='closeoverlay()'><i class='fas fa-times-circle'></i></div>
                    <hr>
                    <div class='order-message order-warning'>Item Already Added to Cart !</div>
                    <div class='order-type order-warning'><i class='fas fa-exclamation-triangle'></i></div>
                </div>";
            }
        } else {
            echo mysqli_error($conn);
        }
    }

    $price=$delivery=$discount=$total=0;
    function delivery($val) {
        $price=$val;
        $delivery=100;
        $GLOBALS['total']=$price+$delivery;
        return $delivery;
    }
    function discount($val) {
        $price=$val;
        if ($GLOBALS['total'] < 500) {
            $discount=50;
        } else {
            $discount=100;
        } 
        $GLOBALS['total']-=$discount;
        return $discount;
    }
    function gettotal() {
        return $GLOBALS['total'];
    }
    // $data="";
    function setData($val) {
        $file=file_get_contents('object.json');
        $arr_file=json_decode($file,true);
        // Cart
        $cartobject=$arr_file["Cart Object"]; 
        $cartobject["Invoice Detail"]["Invoice Type"]="NULL";
        $cartobject["Invoice Detail"]["Order Price"]=(String) $val;
        $cartobject["Invoice Detail"]["Order Delivery"]=(String) delivery($val);
        $cartobject["Invoice Detail"]["Order Discount"]=(String) discount($val);
        $cartobject["Invoice Detail"]["Order Total"]=(String) $GLOBALS['total'];
        $cartobject["Invoice Detail"]["Order Paid"]="Not Paid";
        // $GLOBALS['data']=json_encode($cartobject["Invoice Detail"]);
        $data=json_encode($cartobject["Invoice Detail"]);
        return $data;
    }
    // function getData() {
    //     return $GLOBALS['data'];
    // }
    // SQL Closing
    mysqli_close($conn);

?>