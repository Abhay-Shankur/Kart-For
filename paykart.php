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
    <link rel="stylesheet" href="css/paykart.css">

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
<body onload="onload()">
    <?php 
        require_once 'header.php';
    ?>
    <div id="content">
        <div id="content-side">
            <div class="content-side-item col-acc-blue"><i class="fas fa-user-circle icons" title="My Balance"></i></div>
            <div class="content-side-item col-acc-rig-blue"><i data-tab="1" onclick="switchTab(this)" class="fas fa-coins  icons active-tab" title="Add balance"></i></div>
            <div class="content-side-item"><i data-tab="2" onclick="switchTab(this)" class="far fa-credit-card icons" title="My Card"></i></div>
            <div class="content-side-item"><i data-tab="3" onclick="switchTab(this)" class="fas fa-key icons" title="Pay Password"></i></div>
        </div>
        <div id="content-area">
            <div id="content-area-head" class="col-acc-blue">
                <!-- Code  -->
            </div>
            <div id="content-area-body">
                <div id="content-area-body-content">
                    <!-- Code -->
                </div>
            </div>
        </div>
    </div>        

    

    <!-- JavaScripts -->
    <script src="js\const.js"></script>
    <script src='js\form.js'></script>
    <script src="js\paykart.js"></script>
    
    <?php 
        require_once 'footer.php';
    ?>

</body>
</html>