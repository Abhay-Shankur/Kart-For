<?php
    require './dbconfig.php';

    if(isset($_COOKIE['emailid'])){
        $sql="SELECT * FROM `user` where `user_email`='{$_COOKIE['emailid']}'";
        $row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
    }
    if (isset($_REQUEST['balance'])) {
        if (!empty($_COOKIE['emailid'])) {
            if (!empty($row["user_paydetails"])) {
                echo "<div id='content-balance'>
                        <div id='content-balance-head'>PayKart Coins</div>  
                        <div id='content-balance-body'>Your Wallet : {$row['user_paycoins']}</div>
                    </div>";
            }
        } else {
            echo "<div id='content-nobalance'>PLEASE <a href=''>LOG IN</a></div>";
        }
    }

    if (isset($_REQUEST['tab'])) {
        if ($_REQUEST['tab'] === "1") {
            if (!empty($row["user_paydetails"])) {
                echo "<!-- Add Amount Tab -->
                    <form class='tab-form' id='add-amount-tab-form' action='./include/payprocess.php?link={$_SERVER['HTTP_REFERER']}' method='post'>
                        <div class='tab-form-head'>
                            Add Amount to Wallet
                        </div>
                        <div class='tab-form-body'>
                            <div class='tab-form-body-items'>
                                <label for='amount-add'>Enter Amout to be add  <i class='fas fa-info-circle' title='Limit: Rs 10000'></i></label>
                                <input type='type' name='amount-add' pattern='[0-9]{0,4}' placeholder='eg: 0-10000' required>
                            </div>
                            <div class='tab-form-body-items'>
                                <label for='amount-add'>Enter PayKart Password</label>
                                <input type='password' name='pay-password' pattern='(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,16}' placeholder='eg: ****' required>
                            </div>
                            <div class='tab-form-body-items'>
                                <input type='submit' name='add-amount-tab-form-submit' value='Add'>
                            </div>
                        </div>
                    </form>";
            } else {
                echo "<!-- Add Card Image -->
                    <img src='./assets/const/other/add-card.jpg' onload='loadimage(this)'>";
            }
        }else if ($_REQUEST['tab'] === "2") {
            if (!empty($row["user_paydetails"]) && !empty($row["user_paypassword"])) {
                $data=json_decode($row["user_paydetails"],true);
                echo "<!-- Card Info Tab -->
                    <div id='card-info'>
                        <div id='card-info-card-type'><i id='card-icon' class='fab fa-cc-{$data['Card Type']}'></i></div>
                        <div id='card-info-name'>{$data['Card Holder Name']}</div>
                        <div id='card-info-number'>XXXX XXXX XXXX ".substr($data['Card Number'],-4)."</div>
                        <div id='card-info-expiry'>{$data['Card Expiry']}</div>
                    </div>";
            }else if (empty($row["user_paydetails"]) && empty($row["user_paypassword"])) {
                echo "<!-- Alert Msg -->
                <div id='overlay'>
                    <div id='overlaymsg'>
                        <div id='overlaymsg-head'><i class='fas fa-times-circle fa-2x' onclick='location.reload()'></i></div>
                        <div id='overlaymsg-body'>
                            <i class='fas fa-exclamation-triangle fa-3x'></i>
                            <div onclick='location.reload()' style='cursor:pointer;'>You Don't have a Pay Password</div>
                        </div>
                    </div>
                </div>";
            } else {
                echo "<!-- Add Card Tab -->
                    <form class='tab-form' id='add-card-tab-form' action='./include/payprocess.php?link={$_SERVER['HTTP_REFERER']}' method='post'>
                        <div class='tab-form-head'>
                            Add a Card
                        </div>
                        <div class='tab-form-body'>
                            <div class='tab-form-body-items'>
                                <label for='cardholder-name'>Enter Card Holder Name :</label>
                                <input type='type' name='cardholder-name' placeholder='eg: John Mark' required>
                            </div>
                            <div class='tab-form-body-items'>
                                <label for='cardholder-number'>Enter Card Holder Number :</label>
                                <input type='type' name='cardholder-number' pattern='[0-9]{4}[ ][0-9]{4}[ ][0-9]{4}[ ][0-9]{4}' placeholder='eg: 1234 5678 9009 8765' required>
                            </div>
                            <div class='tab-form-body-items'>
                                <label for='cardholder-expiry'>Enter Card Expiry :</label>
                                <input type='date' name='cardholder-expiry' required>
                            </div>
                            <div class='tab-form-body-items'>
                                <label for='cardholder-card-type'>Enter Card Type :</label><br>
                                <input type='radio' name='card-type' value='mastercard' required>Master Card <br>
                                <input type='radio' name='card-type' value='visa' required>Visa Card
                            </div>
                            <div class='tab-form-body-items'>
                                <label for='amount-add'>Enter PayKart Password</label>
                                <input type='password' name='pay-password' pattern='(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,16}' placeholder='eg: ****' required>
                            </div>
                            <div class='tab-form-body-items'>
                                <input type='submit' name='add-card-tab-form-submit' value='Add'>
                            </div>
                        </div>
                    </form>";
            }
        }else if ($_REQUEST['tab'] === "3") {
            if (!empty($row["user_paypassword"])) {
                echo "<!-- Change Password -->
                    <form class='tab-form' id='change-password-tab-form' action='./include/payprocess.php?link={$_SERVER['HTTP_REFERER']}' method='post'>
                        <div class='tab-form-head'>
                            Change Password
                        </div>
                        <div class='tab-form-body'>
                            <div class='tab-form-body-items'>
                                <label for='old-password'>Enter Old Password :</label>
                                <input type='password' name='old-password' pattern='(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,16}' placeholder='eg: (old)****' required>
                            </div>
                            <div class='tab-form-body-items'>
                                <label for='new-password'>Enter New Password :</label>
                                <input type='password' name='new-password' pattern='(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,16}' placeholder='eg: (new)****' required>
                            </div>
                            <div class='tab-form-body-items'>
                                <input type='submit' name='change-password-tab-form-submit' value='Change'>
                            </div>
                        </div>
                    </form>";
            } else {
                echo "<!-- Add Password  -->
                    <form class='tab-form' id='add-password-tab-form' action='./include/payprocess.php?link={$_SERVER['HTTP_REFERER']}' method='post'>
                        <div class='tab-form-head'>
                            Add a Password
                        </div>
                        <div class='tab-form-body'>
                            <div class='tab-form-body-items'>
                                <label for='password'>Create a PayKart Password :</label>
                                <input type='password' name='password' pattern='(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,16}' placeholder='eg: ****' required>
                            </div>
                            <div class='tab-form-body-items'>
                                <input type='submit' name='add-password-tab-form-submit' value='Create'>
                            </div>
                        </div>
                    </form>";
            }
            
        }else {
            echo "<!-- Add Card Image -->
            <img src='./assets/feature/cashback.jpg' onload='loadimage(this)'>";
            echo "<!-- Alert Msg -->
            <div id='overlay'>
                <div id='overlaymsg'>
                    <div id='overlaymsg-head'><i class='fas fa-times-circle fa-2x' onclick='location.reload()'></i></div>
                    <div id='overlaymsg-body'>
                        <i class='fas fa-exclamation-triangle fa-3x'></i>
                        <div onclick='openForm(location.href)' style='cursor:pointer;'>Please log in</div>
                    </div>
                </div>
            </div>";
        }
    }

    if (isset($_REQUEST['link']) && !empty($_COOKIE['emailid'])) {
        header("Location:".$_REQUEST['link']);
        if (isset($_REQUEST['add-amount-tab-form-submit'])) {
            $amount=$_REQUEST['amount-add'];
            $password=$_REQUEST['pay-password'];
            if (!empty($row["user_paydetails"])) {
                if (!empty($row["user_paypassword"])) {
                    if (openssl_decrypt($row["user_paypassword"],"AES-128-ECB","kartfor3812")==$_REQUEST['pay-password']) {
                        $amount=(int)$row['user_paycoins']+(int)$amount;
                        $sql="UPDATE `user` SET `user_paycoins`='{$amount}' WHERE `user_email`='{$_COOKIE['emailid']}'";
                        if (mysqli_query($conn,$sql)) {
                            echo "Inserted";
                        } else {
                            echo "Not";
                        }
                    }else {
                        echo "not Pass";
                    }
                } else {
                    echo "No Pass";
                }
            }

        }elseif (isset($_REQUEST['add-card-tab-form-submit'])) {
            if (!empty($row["user_paypassword"])) {
                if (openssl_decrypt($row["user_paypassword"],"AES-128-ECB","kartfor3812")==$_REQUEST['pay-password']) {
                    $file=file_get_contents('./include/object.json');
                    $arr_file=json_decode($file,true);
                    $obj=$arr_file['Card Details'];
                    $obj['Card Holder Name']=$_REQUEST['cardholder-name'];
                    $obj['Card Number'] = $_REQUEST['cardholder-number'];
                    $obj['Card Expiry']=$_REQUEST['cardholder-expiry'];
                    $obj['Card Type']=$_REQUEST['card-type'];
                    $obj=json_encode($obj);
                    $sql="UPDATE `user` SET `user_paydetails`='{$obj}' WHERE `user_email`='{$_COOKIE['emailid']}'";
                    if (mysqli_query($conn,$sql)) {
                        echo "Inserted";
                    } else {
                        echo "Not";
                    }
                }else {
                    echo "not Pass";
                }
            } else {
                echo "No Pass";
            }
        }elseif (isset($_REQUEST['change-password-tab-form-submit'])) {
            $sql="SELECT `user_paypassword` FROM `user` WHERE `user_email`='{$_COOKIE['emailid']}'";
            $row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
            if (openssl_decrypt($row["user_paypassword"],"AES-128-ECB","kartfor3812")==$_REQUEST['old-password']) {
                $password=openssl_encrypt($_REQUEST['new-password'],"AES-128-ECB","kartfor3812");
                $sql="UPDATE `user` SET `user_paypassword`='{$password}' WHERE `user_email`='{$_COOKIE['emailid']}'";
                if (mysqli_query($conn,$sql)) {
                    echo "Inserted";
                } else {
                    echo "Not". mysqli_error($conn);
                }
            }else {
                echo "not match";
            }
        }elseif (isset($_REQUEST['add-password-tab-form-submit'])) {
            $password=openssl_encrypt($_REQUEST['password'],"AES-128-ECB","kartfor3812");
            $sql="UPDATE `user` SET `user_paypassword`='{$password}' WHERE `user_email`='{$_COOKIE['emailid']}'";
            if (mysqli_query($conn,$sql)) {
                echo "Inserted";
            } else {
                echo "Not". mysqli_error($conn);
            }
        }
    }

    // // Not Logged in
    // if (empty($_COOKIE['emailid'])) {
    //     echo "<div class='order-alert' id='order-warning'>
    //         <div class='order-closing order-warning' onclick='closeoverlay()'><i class='fas fa-times-circle'></i></div>
    //         <hr>
    //         <div class='order-message order-warning'>You are Not Logged In !</div>
    //         <div class='order-type order-warning'><i class='fas fa-exclamation-triangle'></i></div>
    //     </div>";
    // }

    mysqli_close($conn);
?> 
