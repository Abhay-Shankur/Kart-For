<?php
    require 'dbconfig.php';

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $file=file_get_contents('eg.json');

    $arr_file=json_decode($file,true);

    //     // For Inserting Data into Database.
    // foreach($arr_file as $productId=>$productInfo) {
    //     $modelId=(int) $productId;
    //     $prdID=$productInfo;

    //     $prd_desc=$prdID['Desc'];
    //     $prd_detail=$prdID['Detail'];
    //     $prd_img=$prdID['Images'];
    //     $prd_rating=$prdID['Popularity'];
    //     $prd_seller=$prdID['Seller'];
    
    //     $brandID=001;
    //     $brandName= $prdID['Detail']['General']['Brand'];
    //     $modelName= $prdID['Detail']['General']['Model'];
    //     $str_desc= json_encode($prd_desc,true);
    //     $str_details= json_encode($prd_detail,true);
    //     $str_img= json_encode($prd_img,true);
    //     $str_rating= json_encode($prd_rating,true);
    //     $str_seller= json_encode($prd_seller,true);
    //     $price= (int)str_ireplace(",","",str_ireplace("₹","", $prdID['Detail']['General']['Price in India']));

    //     // $img_arr= array();
    //     // $dir="../image/mobiles/iphone/iPhone 12 Pro/";
    //     // $imgs= scandir($dir);
    //     // if(!empty($imgs)) {
    //     //     foreach($imgs as $img) {
    //     //         if(!is_dir($dir.$img) && $img!=".." && $img!=".") {
    //     //             array_push($img_arr,base64_encode(file_get_contents($dir.$img)));
    //     //         }
    //     //     }
    //     // }
    //     // $str_img_arr=implode(",",$img_arr);
        
    //     // $imgarr=array();
    //     // $dir="../image/mobiles/iphone/iPhone 12 Pro/";
    //     // $imgs= scandir($dir);
    //     // if(!empty($imgs)) {
    //     //     $n=1;
    //     //     foreach($imgs as $img) {
    //     //         if(!is_dir($dir.$img) && $img!=".." && $img!=".") {
    //     //             $imgname=explode(".",explode("-",$img)[1])[0];
    //     //             $imgarr[$imgname]=file_get_contents($dir.$img);
    //     //             $n++;
    //     //         }
    //     //     }
    //     //     // var_dump($imgarr);
    //     //     // To Convert Array into String
    //     //     $imgArrStr=implode("(endOfImage)",$imgarr);
    //     //     // $imgArrStr=http_build_query($imgarr,'','(endOfImage)');
    //     //     // var_dump($imgArrStr);
    //     // }

    //     $sqlInsertData= "INSERT INTO `mobiles`(`brand_id`, `brand_name`, `model_id`, `model_name`, `model_description`, `model_details`, `model_rating`, `model_price`, `model_img`, `seller_info`) VALUES ('$brandID', '$brandName', '$modelId', '$modelName',  '$str_desc', '$str_details', '$str_rating', '$price', '$str_img', '$str_seller')";
    //     // $sqlInsertData="UPDATE `model_details`='$str_details' WHERE `model_id`=$modelId";
    //     if (mysqli_query($conn, $sqlInsertData)) {
    //     echo "Record updated successfully <br/>";
    //     } else {
    //     echo "Error updating record: " . mysqli_error($conn);
    //     }
    // }
    
    //     // For Updating Data 
    // $imgarr=array();
    // $dir="../image/mobiles/iphone/iPhone 12 Pro/";
    // $imgs= scandir($dir);
    // if(!empty($imgs)) {
    //     $n=1;
    //     foreach($imgs as $img) {
    //         if(!is_dir($dir.$img) && $img!=".." && $img!=".") {
    //             $imgname=explode(".",explode("-",$img)[1])[0];
    //             $imgarr[$imgname]=file_get_contents($dir.$img);
    //             $n++;
    //         }
    //     }
    //     // var_dump($imgarr);
    //     // To Convert Array into String
    //     $imgArrStr=implode("(endOfImage)",$imgarr);
    //     // $imgArrStr=http_build_query($imgarr,'','(endOfImage)');
    //     // var_dump($imgArrStr);
    // }
    // $sql = "UPDATE `mobiles` SET `model_imgs`='".base64_encode($imgArrStr)."' WHERE `model_name`='iPhone 12 Pro'";
    // if (mysqli_query($conn, $sql)) {
    // echo "Record updated successfully";
    // } else {
    // echo "Error updating record: " . mysqli_error($conn);
    // }
    

    //     // For Selecting Data
    // $sqlRetriveData ="SELECT `model_imgs` FROM `mobiles` WHERE `model_name`='iPhone 12 Pro'";
    // $results=mysqli_query($conn,$sqlRetriveData);
    // if(mysqli_num_rows($results)) {
    //     while($row=mysqli_fetch_assoc($results)) {    
    //         $imgStrArr=explode("(endOfImage)",base64_decode($row["model_imgs"]));
    //         var_dump($imgStrArr);
    //         // array_keys($imgStrArr);
    //         // foreach($imgStrArr as $img) {
    //         //     // echo $img;
    //         //     echo "<img class='brand-img' src='data:image/jpg;charset=utf8;base64,".base64_encode($img)."' />";
    //         // }
    //     }
    // }

    // $password="Abhay1234";
    // $enpass=openssl_encrypt($password,"AES-128-ECB","kartfor3812");
    // // $sql = "UPDATE `user` SET `user_paypassword`='{$enpass}' WHERE `user_email`='abhayshankur@gmail.com'";
    // $sql = "UPDATE `user` SET `user_password`='{$enpass}' WHERE `user_email`='abhayshankur@gmail.com'";
    // if (mysqli_query($conn, $sql)) {
    // echo "Record updated successfully";
    // } else {
    // echo "Error updating record: " . mysqli_error($conn);
    // }

    // $sql="SELECT `user_paypassword` FROM `user` WHERE `user_email`='abhayshankur@gmail.com'";
    // $res=mysqli_query($conn,$sql);
    // $row=mysqli_fetch_assoc($res);
    // $pass=$row["user_paypassword"];
    // $depass=openssl_decrypt($pass,"AES-128-ECB","kartfor3812");
    // echo $depass;

    // SQL Closing
    mysqli_close($conn);
?>
