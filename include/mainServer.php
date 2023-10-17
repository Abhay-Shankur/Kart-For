<?php
    require 'dbconfig.php';
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // To get the id for Categories
    if (isset($_REQUEST['category'])) {
        $categoryName=getCategoryName($_REQUEST['category']);
        $sqlretrive =" SELECT `category_id` FROM `category` WHERE `category_name`='$categoryName';";
        $res=mysqli_query($conn, $sqlretrive);
        $row = mysqli_fetch_assoc($res);
        $id=$row["category_id"];
        echo $id; 
    }

    //To get the Name on Side Menu
    if (isset($_REQUEST['email'])) {
        $name = "";
        $sqlretrive =" SELECT `user_name` FROM `user` WHERE `user_email`='{$_REQUEST['email']}';";
        $res=mysqli_query($conn, $sqlretrive);
        if (mysqli_num_rows($res)>0) {
            $row = mysqli_fetch_assoc($res);
            $name = $row["user_name"];
        }
        $name = strtok($name, " ");
        $text='<i class="material-icons" style="margin: auto 1.5vw;">&#xe853;</i>Hello '. $name ;
        echo $text;
    }
    
    // SQL Closing
    mysqli_close($conn);

    // Funtion to get Category Name.
    function getCategoryName($var) {
        $category=explode("-",$var,2);
        return $category[1];
    }
?>