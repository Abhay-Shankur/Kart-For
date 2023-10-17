<?php
    require './dbconfig.php';

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // if (isset($_REQUEST['id']) && isset($_REQUEST['product']) && isset($_REQUEST['color']) && isset($_REQUEST['seller']) && isset($_REQUEST['customer']) && isset($_REQUEST['invoice']) ) {
    //     $id=$_REQUEST['id'];

    //     $productId=$_REQUEST['product'];
    //     $categoryId=substr($productId,0,3);

    //     $sqlretrive =" SELECT `table_name` FROM `category` WHERE `category_id`=$categoryId;";
    //     $result = mysqli_query($conn, $sqlretrive);
    //     $row = mysqli_fetch_assoc($result);
    //     $tableName=$row["table_name"];
        
    //     $sqlretrive =" SELECT * FROM `{$tableName}` WHERE `model_id`=".$productId;
    //     $result = mysqli_query($conn, $sqlretrive);

    //     $sql="SELECT * FROM `user` WHERE `user_email`='{$id}'";
    //     $res= mysqli_query($conn,$sql);

    //     if ($result && $res) {
            
    //         $row=mysqli_fetch_assoc($res);
    //         if ((int) $row["user_paycoins"] > (int) json_decode($_REQUEST['invoice'],true)["Order Total"] ) {
    //             $val=(int) $row["user_paycoins"] - (int) json_decode($_REQUEST['invoice'],true)["Order Total"];
    //             // $data=json_decode($row["user_paydetails"],true);
    //             // $data["PayKart Coins"]=$val;
    //             // $data=json_encode($data);
    //             // echo $data;
    //             $orderobj=json_decode($row["user_cart"],true);
                
    //             $row=mysqli_fetch_assoc($result);
    //             $file=file_get_contents('./include/object.json');
    //             $arr_file=json_decode($file,true);
    //             // Cart
    //             $cartobject=$arr_file["Cart Object"]; 
    //             $cartobject["Order Detail"]["Order Id"]=rand(100000,1000000);
    //             $cartobject["Order Detail"]["Order Status"]="Order Placed";
    //             date_default_timezone_set("Asia/Kolkata");
    //             $cartobject["Order Detail"]["Order Time"]=date("h:i:sa");
    //             $cartobject["Product Detail"]["Product Id"]=$productId;
    //             $cartobject["Product Detail"]["Product Name"]=$row["model_name"];
    //             $cartobject["Product Detail"]["Category Id"]=$categoryId;
    //             $cartobject["Product Detail"]["Product Color"]=$_REQUEST['color'];
    //             $cartobject["Product Detail"]["Product Price"]=$row["model_price"];
    //             $cartobject["Product Detail"]["Product Image"]=json_decode($row["model_img"],true)["Design"];
    //             $cartobject["Product Detail"]["Product Rating"]=json_decode($row["model_rating"],true)["Rating"];
    //             $cartobject["Customer Detail"]=json_decode($_REQUEST['customer'],true);
    //             $cartobject["Seller Detail"]=json_decode($_REQUEST['seller'],true);
    //             $cartobject["Invoice Detail"]=json_decode($_REQUEST['invoice'],true);
    //             $cartobject["Invoice Detail"]["Invoice Type"]="Pre-Paid";
    //             $cartobject["Invoice Detail"]["Order Paid"]="Paid";

    //             $flag=0;
    //             if(!empty($orderobj)) {
    //                 foreach ($orderobj as $key => $value) {
    //                     if ($value["Product Detail"]["Product Id"]==$productId && $value["Product Detail"]["Product Color"]==$_REQUEST['color']) {
    //                         $orderobj[$key]=$cartobject;
    //                         $flag=1;
    //                         break;
    //                     }
    //                 }
    //             }
    //             if ($flag==0) {
    //                 $n=count($orderobj)+1;
    //                 $orderobj["Order {$n}"]=$cartobject;
    //             }

    //             $orderobj=json_encode($orderobj);

    //             $sqlinsert="UPDATE `user` SET `user_paycoins`=$val,`user_cart`='{$orderobj}' WHERE `user_email`='{$id}'";
    //             if (mysqli_query($conn,$sqlinsert)) {
    //                 echo "<div class='order-alert' id='order-success'>
    //                     <div class='order-closing order-success' onclick='closeoverlay()'><i class='fas fa-times-circle'></i></div>
    //                     <hr>
    //                     <div class='order-message order-success'>Your Order has been Placed</div>
    //                     <div class='order-type order-success'><i class='fas fa-check-circle'></i></div>
    //                 </div>";
    //             } else {
    //                 // echo "Not Placed";
    //                 echo "<div class='order-alert' id='order-warning'>
    //                     <div class='order-closing order-warning' onclick='closeoverlay()'><i class='fas fa-times-circle'></i></div>
    //                     <hr>
    //                     <div class='order-message order-warning'>Your Order has not been Placed !</div>
    //                     <div class='order-type order-warning'><i class='fas fa-exclamation-triangle'></i></div>
    //                 </div>";
    //             }
    //         } else {
    //             // echo "Not Enough";
    //             echo "<div class='order-alert' id='order-warning'>
    //                 <div class='order-closing order-warning' onclick='closeoverlay()'><i class='fas fa-times-circle'></i></div>
    //                 <hr>
    //                 <div class='order-message order-warning'>Not Enough PayKart Coins !</div>
    //                 <div class='order-type order-warning'><i class='fas fa-exclamation-triangle'></i></div>
    //             </div>";
    //         }
    //     } else {
    //         // echo "error";
    //         echo "<div class='order-alert' id='order-error'>
    //             <div class='order-closing order-error' onclick='closeoverlay()'><i class='fas fa-times-circle'></i></div>
    //             <hr>
    //             <div class='order-message order-error'>Something went wrong. Please try Again</div>
    //             <div class='order-type order-error'><i class='fas fa-exclamation-circle'></i></div>
    //         </div>";
    //     }
    // }

    if(isset($_REQUEST['password']) && !empty($_COOKIE['emailid'])) {
        $sql="SELECT  `user_paypassword` FROM `user` WHERE `user_email`='{$_COOKIE['emailid']}'";
        if($row=mysqli_fetch_assoc(mysqli_query($conn,$sql))) {
            $pass=$_REQUEST['password'];
            $depass=openssl_decrypt($row["user_paypassword"],"AES-128-ECB","kartfor3812");
            if ($pass == $depass) {
                proceed();
            } else {
                echo "<div class='order-alert' id='order-error'>
                    <div class='order-closing order-error' onclick='closeoverlay()'><i class='fas fa-times-circle'></i></div>
                    <hr>
                    <div class='order-message order-error'>You Entered Wrong Pay Password</div>
                    <div class='order-type order-error'><i class='fas fa-exclamation-circle'></i></div>
                </div>";
            }
        } else {
            echo mysqli_error($conn);
        }
    }

    // Not Logged in
    if (empty($_COOKIE['emailid'])) {
        echo "<div class='order-alert' id='order-warning'>
            <div class='order-closing order-warning' onclick='closeoverlay()'><i class='fas fa-times-circle'></i></div>
            <hr>
            <div class='order-message order-warning'>You are Not Logged In !</div>
            <div class='order-type order-warning'><i class='fas fa-exclamation-triangle'></i></div>
        </div>";
    }

    function proceed() {
        $id=$_COOKIE['emailid'];

        $productId=$_COOKIE['Product_Id'];
        $categoryId=substr($productId,0,3);

        $sqlretrive =" SELECT `table_name` FROM `category` WHERE `category_id`=$categoryId;";
        $result = mysqli_query($GLOBALS['conn'], $sqlretrive);
        $row = mysqli_fetch_assoc($result);
        $tableName=$row["table_name"];
        
        $sqlretrive =" SELECT * FROM `{$tableName}` WHERE `model_id`=".$productId;
        $result = mysqli_query($GLOBALS['conn'], $sqlretrive);

        $sql="SELECT * FROM `user` WHERE `user_email`='{$id}'";
        $res= mysqli_query($GLOBALS['conn'],$sql);

        if ($result && $res) {
            
            $row=mysqli_fetch_assoc($res);
            if ((int) $row["user_paycoins"] > (int) json_decode($_COOKIE['Invoice_Detail'],true)["Order Total"] ) {
                $val=(int) $row["user_paycoins"] - (int) json_decode($_COOKIE['Invoice_Detail'],true)["Order Total"];
                // $data=json_decode($row["user_paydetails"],true);
                // $data["PayKart Coins"]=$val;
                // $data=json_encode($data);
                // echo $data;
                $orderobj=json_decode($row["user_cart"],true);
                
                // Row For Product Details
                $row=mysqli_fetch_assoc($result);
                $file=file_get_contents('./object.json');
                $arr_file=json_decode($file,true);
                // Cart
                $cartobject=$arr_file["Cart Object"]; 
                $cartobject["Order Detail"]["Order Id"]=rand(100000,1000000);
                $cartobject["Order Detail"]["Order Status"]="Order Placed";
                date_default_timezone_set("Asia/Kolkata");
                $cartobject["Order Detail"]["Order Time"]=date("h:i:sa");
                $cartobject["Product Detail"]["Product Id"]=$productId;
                $cartobject["Product Detail"]["Product Name"]=$row["model_name"];
                $cartobject["Product Detail"]["Category Id"]=$categoryId;
                $cartobject["Product Detail"]["Product Color"]=$_COOKIE['Product_req'];
                $cartobject["Product Detail"]["Product Price"]=$row["model_price"];
                $cartobject["Product Detail"]["Product Image"]=json_decode($row["model_img"],true)["Design"];
                $cartobject["Product Detail"]["Product Rating"]=json_decode($row["model_rating"],true)["Rating"];
                $cartobject["Customer Detail"]=json_decode($_COOKIE['Customer_Detail'],true);
                $cartobject["Seller Detail"]=json_decode($_COOKIE['Seller_Detail'],true);
                $cartobject["Invoice Detail"]=json_decode($_COOKIE['Invoice_Detail'],true);
                $cartobject["Invoice Detail"]["Invoice Type"]="Pay Coins";
                $cartobject["Invoice Detail"]["Order Paid"]="Paid";

                $flag=0;
                if(!empty($orderobj)) {
                    foreach ($orderobj as $key => $value) {
                        if ($value["Product Detail"]["Product Id"]==$productId && $value["Product Detail"]["Product Color"]==$_REQUEST['color']) {
                            $orderobj[$key]=$cartobject;
                            $flag=1;
                            break;
                        }
                    }
                }
                if ($flag==0) {
                    if(!empty($orderobj)) {
                        $n=count($orderobj)+1;
                        $orderobj["Order {$n}"]=$cartobject;
                    } else {
                        $orderobj["Order 1"]=$cartobject;
                    }
                }

                $orderobj=json_encode($orderobj);

                $sqlinsert="UPDATE `user` SET `user_paycoins`=$val,`user_cart`='{$orderobj}' WHERE `user_email`='{$id}'";
                if (mysqli_query($GLOBALS['conn'],$sqlinsert)) {
                    echo "<div class='order-alert' id='order-success'>
                        <div class='order-closing order-success' onclick='closeoverlay()'><i class='fas fa-times-circle'></i></div>
                        <hr>
                        <div class='order-message order-success'>Your Order has been Placed</div>
                        <div class='order-type order-success'><i class='fas fa-check-circle'></i></div>
                    </div>";
                } else {
                    // echo "Not Placed";
                    echo "<div class='order-alert' id='order-warning'>
                        <div class='order-closing order-warning' onclick='closeoverlay()'><i class='fas fa-times-circle'></i></div>
                        <hr>
                        <div class='order-message order-warning'>Your Order has not been Placed !</div>
                        <div class='order-type order-warning'><i class='fas fa-exclamation-triangle'></i></div>
                    </div>";
                }
            } else {
                // echo "Not Enough";
                echo "<div class='order-alert' id='order-warning'>
                    <div class='order-closing order-warning' onclick='closeoverlay()'><i class='fas fa-times-circle'></i></div>
                    <hr>
                    <div class='order-message order-warning'>Not Enough PayKart Coins !</div>
                    <div class='order-type order-warning'><i class='fas fa-exclamation-triangle'></i></div>
                </div>";
            }
        } else {
            // echo "error";
            echo "<div class='order-alert' id='order-error'>
                <div class='order-closing order-error' onclick='closeoverlay()'><i class='fas fa-times-circle'></i></div>
                <hr>
                <div class='order-message order-error'>Something went wrong. Please try Again</div>
                <div class='order-type order-error'><i class='fas fa-exclamation-circle'></i></div>
            </div>";
        }
    }
    // SQL Closing
    mysqli_close($conn);
?>