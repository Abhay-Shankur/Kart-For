<?php
    require '../include/dbconfig.php';

    if(!$conn) {
        die("Connection Failed : " . mysqli_connect_error());
    }
    
    $sqlretrieve="SELECT * FROM `review` ORDER BY `reviewer_rating` DESC";
    // echo mysqli_num_rows(mysqli_query($conn,$sqlretrieve));
    $res=mysqli_query($conn,$sqlretrieve);
    if(mysqli_num_rows($res)) {
        $count=0;
        while($row=mysqli_fetch_assoc($res)) {
            $rate=$row['reviewer_rating'];
            echo    "<div class='review-box'>
                        <div class='review-title'>
                            <div class='reviewer-name'>".$row['reviewer_name']."</div>
                            <div class='reviewer-rating'><div class='stars'>";
                            for ($i=0;$i<5;$i++){
                                
                                if ($i<$rate){
                                    echo    "<i class='material-icons' style='color:darkgoldenrod'>star</i>";
                                }else {
                                    echo    "<i class='material-icons' style='color:darkgoldenrod'>star_border</i>";
                                }
                            }                              
                        echo "</div></div>
                        </div>
                        <div class='review-body'>
                            <div class='reviewer-review'>".$row['reviewer_review']."</div>
                        </div>
                    </div>";
            $count++;
            if (isset($_REQUEST['Reviews'])) {

            }else {
                if($count>=4){ 
                    echo "<div id='review-more'>
                            <span>Wanna See more Reviws !</span>
                            <!-- <span><a href='reviews.php'><i class='material-icons'>arrow_forward</i></a></span> -->
                            <span><i class='material-icons' onclick='overlayReviews()'>arrow_forward</i></span>
                        </div>";
                    break;
                }
            }
        }
    }

    // MYSQL Closing
    mysqli_close($conn);
?>