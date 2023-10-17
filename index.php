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
    <link rel="stylesheet" href="css/index.css">
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

<body>

    <?php 
        require_once 'header.php'; 
    ?>

    <!-- Content Area -->
    <section>
        <div class="content-area">
            <div class="content-item" id="content-item1">
                <div class="slide-content">
                    <img class="image-slides" src="./assets/banners/flash-sale-1.jpg" alt="sale-banner1">
                    <img class="image-slides" src="./assets/banners/flash-sale-2.jpeg" alt="sale-banner2">
                    <img class="image-slides" src="./assets/banners/flash-sale-1.jpg" alt="sale-banner3">
                </div>
            </div>
            <div class="content-item" id="content-item2">
                <div class="content-item-title">Top Brands</div>
                <div class="content-item-img">
                    <img src="./assets/banners/CL-Banner.jpg"  alt="banner1" width="100%" height="100%">
                </div>
            </div>
            <div class="content-item" id="content-item3">
                <div class="content-item-list">
                    <div class="content-item-list-title">
                        New Launch's Mobiles
                    </div>
                    <div class="content-item-list-area">
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/mobiles/Mobile1.jpeg" onload="loadimage(this)"
                                alt="mobile">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/mobiles/Mobile2.jpeg" onload="loadimage(this)"
                                alt="mobile">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/mobiles/Mobile3.jpeg" onload="loadimage(this)"
                                alt="mobile">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/mobiles/Mobile4.jpeg" onload="loadimage(this)"
                                alt="mobile">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/mobiles/Mobile5.jpeg" onload="loadimage(this)"
                                alt="mobile">
                        </div>
                    </div>
                </div>
                <div class="content-item-list">
                    <div class="content-item-list-title">
                        New Fashion Trend
                    </div>
                    <div class="content-item-list-area">
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/fashion/mensWear/Mens1.jpeg"
                                onload="loadImageSize(this,parentElement)" alt="fashion">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/fashion/womensWear/Womens1.jpeg"
                                onload="loadImageSize(this,parentElement)" alt="fashion">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/fashion/kidsWear/Kids1.jpeg"
                                onload="loadImageSize(this,parentElement)" alt="fashion">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/fashion/watches/Watch1.jpg"
                                onload="loadImageSize(this,parentElement)" alt="fashion">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/fashion/shoe/Shoe2.jpeg"
                                onload="loadImageSize(this,parentElement)" alt="fashion">
                        </div>
                    </div>
                </div>
                <div class="content-item-list">
                    <div class="content-item-list-title">
                        Best Appliances
                    </div>
                    <div class="content-item-list-area">
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/appliances/ac/Electronics7.jpeg"
                                onload="loadImageSize(this,parentElement)" alt="appliances">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/appliances/accesories/Electronics8.jpeg"
                                onload="loadImageSize(this,parentElement)" alt="appliances">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/appliances/tv/Electronics1.jpeg"
                                onload="loadImageSize(this,parentElement)" alt="appliances">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/appliances/washingMachine/Electronics5.jpeg"
                                onload="loadImageSize(this,parentElement)" alt="appliances">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/appliances/tv/Electronics3.jpeg"
                                onload="loadImageSize(this,parentElement)" alt="appliances">
                        </div>
                    </div>
                </div>
                <div class="content-item-list">
                    <div class="content-item-list-title">
                        Beast Laptops
                    </div>
                    <div class="content-item-list-area">
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/Laptop/Laptop1.jpeg" onload="loadImageSize(this,parentElement)"
                                alt="laptops">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/Laptop/Laptop2.jpeg" onload="loadImageSize(this,parentElement)"
                                alt="laptops">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/Laptop/Laptop3.jpeg" onload="loadImageSize(this,parentElement)"
                                alt="laptops">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/Laptop/Laptop4.jpeg" onload="loadImageSize(this,parentElement)"
                                alt="laptops">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/Laptop/Laptop5.jpeg" onload="loadImageSize(this,parentElement)"
                                alt="laptops">
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-item" id="content-item4">
                <div class="content-item-title">Get Fashioned on Your Price </div>
                <div class="content-item-img">
                    <img class="image-slides" src="./assets/banners/fashion-sale-1.jpg" alt="sale-banner1">
                    <img class="image-slides" src="./assets/banners/fashion-sale-2.jpg" alt="sale-banner2">
                    <img class="image-slides" src="./assets/banners/fashion-sale-3.jpg" alt="sale-banner3">
                </div>
            </div>
            <div class="content-item" id="content-item5">
                <div class="content-item-list">
                    <div class="content-item-list-title">
                        Shop by Category
                    </div>
                    <div class="content-item-list-area">
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/category/appliances.jpg"
                                onload="loadImageSize(this,parentElement)" alt="appliances">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/category/electronics.jpg"
                                onload="loadImageSize(this,parentElement)" alt="electronics">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/category/mobiles.jpg" onload="loadImageSize(this,parentElement)"
                                alt="mobile">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/category/fashion.jpg" onload="loadImageSize(this,parentElement)"
                                alt="fashion">
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-item" id="content-item6">
                <div class="content-item-list">
                    <div class="content-item-list-title">
                        Recommended
                    </div>
                    <div class="content-item-list-area">
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/mobiles/Mobile5.jpeg" onload="loadImageSize(this,parentElement)"
                                alt="mobile">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/Laptop/Laptop5.jpeg" onload="loadImageSize(this,parentElement)"
                                alt="laptops">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/fashion/womensWear/Womens3.jpeg"
                                onload="loadImageSize(this,parentElement)" alt="fashion">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/fashion/shoe/Shoe1.jpeg"
                                onload="loadImageSize(this,parentElement)" alt="shoe">
                        </div>
                        <div class="content-item-list-area-imgs">
                            <img class="img" src="image/fashion/mensWear/Mens1.jpeg"
                                onload="loadImageSize(this,parentElement)" alt="shoe">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    
        <!-- JavaScripts -->
        <script src="js\index.js"></script>
        <script src='js\form.js'></script>
        <script src="js\const.js"></script>

    <?php 
        require_once 'footer.php';
    ?>

</body>

</html>