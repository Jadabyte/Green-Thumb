<?php
    include_once(__DIR__ . "/nav.inc.php");
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
    <header class="plant" id="montsera" data-name="monstera">
        <a href="plantGuide.php"><img id="back" src="images/back.png" alt="back"></a>
        <h2 class="plantName">Tomato</h2>
    </header>
    <main>
        <p id="careLvl">Care level: intermediate</p>
        <div class="guideBox">
            <div id="planting" class="plantCard">
                <h2 id="plantingTitle" class="cardTitle">Planting</h2>
                <p class="cardContent">Use a large pot or container with drainage holes in the bottom. Use loose, well-draining soil. Mix organic matter with a good potting mix. Only plant 1 tomato plant per pot. Keep the soil moist. Place the pot in a sunny spot with 6 to 8 hours of full sun a day.</p>
            </div>
        </div>
        
        <div id="careCards">
            <div class="infoCard">
                <h2 class="cardTitle">Care</h2>
                <h3 class="subTitle">Watering</h3>
                <p class="cardContent">Water generously the first few days thatthe tomato plant is in the ground.Water well throughout growing season.Give water in the early morning.Add mulch after 5 weeks to retain moistureand to control weeds.</p>
            </div>
            <div class="guideBox">
                <div class="infoCard">
                    <h3 class="subTitle">Fertilizing</h3>
                    <p class="cardContent">Water in with a starter fertilizer solution.Side dress the plants with ferilizer or compostevery 2 weeks when tomato fruits areabout 3 cm in diameter.If staking, use soft string to securetomato stem to the stake.</p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>