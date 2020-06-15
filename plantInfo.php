<?php
    include_once(__DIR__ . "/nav.inc.php");
    include_once(__DIR__ . "/Classes/Plants.php");

    $plant = Plants::fetchPlant($_GET['plant']);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://use.typekit.net/ayy1bcm.css">
    <link rel="stylesheet" href="css/plantInfo.css">
    <title>Tomato Info</title>
</head>
<body>
    <header style="background-image: url(<?php echo($plant['img']); ?>);" class="plant" id="montsera" data-name="monstera">
        <a href="plantGuide.php"><img id="back" src="images/back.png" alt="back"></a>
        <h2 class="plantName"><?php echo($plant['name']); ?></h2>
    </header>
    <main>
        <p id="careLvl">Care level: <?php echo($plant['care']); ?></p>
        <div class="guideBox">
            <div id="planting" class="plantCard">
                <h2 id="plantingTitle" class="cardTitle">Planting</h2>
                <p class="cardContent"><?php echo($plant['planting']); ?></p>
            </div>
        </div>
        
        <div id="careCards">
            <?php if($plant['watering']) : ?>
            <div class="infoCard">
                <h2 class="cardTitle">Care</h2>
                <h3 class="subTitle">Watering</h3>
                <p class="cardContent"><?php echo($plant['watering']); ?></p>
            </div>
            <?php endif ?>
            
            <?php if($plant['fertilizing']) : ?>
            <div class="guideBox">
                <div class="infoCard">
                    <h3 class="subTitle">Fertilizing</h3>
                    <p class="cardContent"><?php echo($plant['fertilizing']); ?></p>
                </div>
            </div>
            <?php endif ?>
        </div>
    </main>
</body>
</html>