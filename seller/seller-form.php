<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Web Icon -->
    <link rel="shortcut icon" href="../image/logo/eKartIcon.jpg" type="image/x-icon">
    <!-- For Font Awesome logo icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- For Material icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- For google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    
    <!-- For Web Style  -->
    <link rel="stylesheet" href="css/seller-form.css">

    <title>Kart for (SELLER)</title>

    <!-- JavaScript -->
    <script src="./js/seller-form-prefun.js"></script>
</head>
<body>
    <section>
        <div id="content-area">
            <div id="main-panel" class="panels">
                <div id="top-panel">
                    <div id="login-signup">Log In</div>
                <!-- Top Panel Closing -->
                </div>
                <div id="left-panel">
                    <img src="./assets/background/ecomm-bg.png" alt="" onload="loadImage(this)">
                <!-- Left Panel Closing -->
                </div>
                <div id="right-panel">
                    <form class="form active-form" id="signup-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="content">
                            <span id="content-head-text">Create Seller Account</span>
                        </div>    
                        <div class="content">
                            <span class="content-title-text">Your Name</span>
                            <i class="fas fa-user icon-area">
                                <input type="text" name="seller-fname" placeholder="ex: John Markus" pattern="[A-z\sA-z]{1,}" required>
                            </i>
                        </div>
                        <div class="content">
                            <span class="content-title-text">Your Personal Email</span>
                            <i class="fas fa-envelope icon-area">
                                <input type="email" name="seller-personal-email" placeholder="ex: johnmarkus21@gmail.com" pattern="[A-z]+@(gmail.com)+\.(com)$" required>
                            </i>
                        </div>
                        <div class="content">
                            <span class="content-title-text">Your Work Email</span>
                            <i class="fas fa-at icon-area">
                                <input type="email" name="seller-work-email" placeholder="ex: johnswork@gmail.com" pattern="[A-z]+@(gmail.com)+\.(com)$" required>
                            </i>
                        </div>
                        <div class="content">
                            <span class="content-title-text">Your Contact Info</span>
                            <i class="fas fa-phone-square-alt icon-area">
                                <select name="seller-countrycode" id="select-phonecode">
                                    <option value="+91" class="code-values"><i></i>IND</option>
                                </select>
                                <input type="text" name="seller-contactno" placeholder="Your Contact No" pattern="[0-9]{10}" required>
                            </i>
                        </div>
                        <div class="content">
                            <span class="content-title-text">Create Password</span>
                            <i class="fas fa-unlock icon-area">
                                <input type="password" name="seller-password" placeholder="Create Your Seller Id Password" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,16}" required>
                                <i class="fas fa-eye" style="cursor:pointer;" onclick="showPassword(this)"></i>
                            </i>
                            <i class="fas fa-unlock icon-area">
                                <input type="password" name="seller-repassword" placeholder="Re-Enter Your Password" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,16}" required>
                                <i class="fas fa-eye" style="cursor:pointer;" onclick="showPassword(this)"></i>
                            </i>
                            <span id="content-desc-text">Password must be longer than 8 Character.</span>
                        </div>
                        <div class="content">
                            <input type="submit" name="signup-submit" value="Continue">
                        </div>
                    <!-- SignUp form Closing -->
                    </form>

                    <form class="form" id="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="content">
                            <span id="content-head-text">Log In to Seller Account</span>
                        </div>    
                        <div class="content">
                            <span class="content-title-text">Your Work Email</span>
                            <i class="fas fa-at icon-area">
                                <input type="email" name="seller-work-email" placeholder="ex: johnswork@gmail.com" pattern="[A-z0-9]+@(gmail.com)+\.(com)$" required>
                            </i>
                        </div>
                        <div class="content">
                            <span class="content-title-text">Your Password</span>
                            <i class="fas fa-unlock icon-area">
                                <input type="password" name="seller-password" placeholder="Enter Your Seller Id Password" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,16}" required>
                                <i class="fas fa-eye" style="cursor:pointer;" onclick="showPassword(this)"></i>
                            </i>
                            <span id="content-desc-text">Password must be longer than 8 Character.</span>
                        </div>
                        <div class="content">
                            <input type="submit" name="login-submit" value="Continue">
                        </div>
                    </form>
                <!-- Right Panel Closing -->
                </div>
            <!-- Panel Closing -->
            </div>
        <!-- Content Area Closing -->
        </div>
    </section>

    
    <!-- JavaScript -->
    <script src="./js/seller-form.js"></script>

</body>
</html>

<?php
    require '../include/dbconfig.php';

    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }



    mysqli_close($conn);
?>