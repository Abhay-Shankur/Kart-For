<?php 
    require 'dbconfig.php';

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // To get the List for Products
    if (isset($_REQUEST['categoryIdForProducts'])) {
        $categoryId=$_REQUEST['categoryIdForProducts'];
        $sqlretrive =" SELECT `table_name` FROM `category` WHERE `category_id`=$categoryId;";
        $result = mysqli_query($conn, $sqlretrive);
        $row = mysqli_fetch_assoc($result);
        $tableName=$row["table_name"];
        $sqlretrive =" SELECT * FROM `".$tableName."`";
        $result = mysqli_query($conn, $sqlretrive);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            // echo "<script src='./js/productlist.js'></script>";
            while($row = mysqli_fetch_assoc($result)) {
                $designimage=json_decode($row["model_img"],true)["Design"];
                $jsondata=json_decode($row["model_description"],true);
                $jsondatarating=json_decode($row["model_rating"],true);
                // $val=array_values($jsondata);
                echo "<div class='panel-content-list' data-id='".$row["model_id"]."'  onclick='showProduct(this)'>
                <div class='panel-content-item'> 
                    <div class='content-item-section1'>
                        <div class='content-item-img'>
                            <img class='product-img' onload='loadimage(this)' src='".$designimage."' alt='Design'>
                        </div>
                        
                    </div>
                    <div class='content-item-section2'>
                        <span class='content-item-title'>
                            ".$row["brand_name"]." ".$row["model_name"]."
                        </span>
                        <div class='content-item-rating'>
                            <i class='fas fa-star'>".$jsondatarating["Rating"]."</i>
                        </div>
                        <div class='content-item-description'>
                            <ul>";
                            foreach ($jsondata as $key => $value) {
                                echo "<div class='content-item-description-list'>
                                    <div class='content-item-description-list-icon'><i onload='specIcon(this)' data-key='$key' class='fas icon-area' id='icon-area'></i></div>
                                    <div class='content-item-description-list-text'>$value</div>
                                </div>";
                            }
                            echo"
                            </ul>
                        </div>
                    </div>
                    <div class='content-item-section3'>
                        <div class='content-item-price'>
                            ₹".$row["model_price"]."
                        </div>
                        <div class='content-item-orderplace'>
                            <input type='button' id='buy' value='Order Now'>
                            <input type='button' id='cart' value='Add To Cart'>
                        </div>
                    </div>
                </div>
            </div>";
            }
            // echo "<script src='./js/productlist.js'></script>";
        } else {
        echo "No Products Found";
        }
    } 
    
    // SQL Closing
    mysqli_close($conn);
    

?>