<?php
include_once(__DIR__ . "/Classes/PlantData.php");
include_once(__DIR__ . "/nav.inc.php");
include_once(__DIR__ . "/Classes/Plants.php");

$result = PlantData::retrieveData();
$celcius = $result['celcius'];

$plant = Plants::fetchPlant($_GET['plant']);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://use.typekit.net/ayy1bcm.css">
    <link rel="stylesheet" href="css/details.css">
    <title><?php ?> Details</title>
</head>
<body>
    <header style="background-image:url(<?php echo($plant['img']); ?>)" class="plant" id="montsera" data-name="monstera">
        <img id="back" src="images/back.png" alt="back">
        <h2 class="plantName"><?php echo($plant['name']); ?></h2>
    </header>
    <main>
        
        <article class="water">
            <h3>Water: <span class="accent">Low</span></h3>
            <div class="articleContent">
                <img class="icon" src="images/detail-icon-01.png" alt="">
                <div>
                    <p class="info">
                        Soil is dry.
                    </p>
                    <p class="tip">Give 250 ml of water</p>
                </div>
            </div>
        </article>

        <article class="sunlight">
            <h3>Sunlight: <span class="accent">Good</span></h3>
            <div class="articleContent">
                <img class="icon" src="images/detail-icon-02" alt="">
                <div>
                    <p class="info">Your plant is receiving enough sunlight!</p>
                </div>
            </div>
        </article>

        <article class="temperature">
            <h3>Temperature: 
                <span class="accent">
                    <?php if($celcius > 15 && $celcius < 24) { ?>
                        Good
                    <?php }
                        elseif($celcius < 15) { ?>
                        Cold
                    <?php }
                        else { ?>
                        Warm
                    <?php } ?>
                </span>
            </h3>
            <div class="articleContent">
                <img class="icon" src="images/detail-icon-03" alt="">
                <div>
                    <p class="info">
                        <?php if($celcius > 15 && $celcius < 24) { ?>
                            The temperature in the room is optimal!
                        <?php }
                            elseif($celcius < 15) { ?>
                            It's too cold, find a warmer spot.
                        <?php }
                            else { ?>
                            It's too warm, find a cooler spot.
                        <?php } ?>
                    </p>
                </div>
            </div>
        </article>

    </main>
    <script src="js/details.js"></script>
</body>
</html>