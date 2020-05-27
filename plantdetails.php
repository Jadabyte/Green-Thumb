<?php
include_once(__DIR__ . "/Classes/PlantData.php");
include_once(__DIR__ . "/nav.inc.php");

if(isset($_POST["data"])){
    if(!empty($_POST["data"])){	//Eigenlijk zouden hier nog andere checks moeten gebeuren
        $data = null;
        $data = explode(";", $_POST["data"]);

        /*$fp = fopen("log.txt", "a");
        fprintf($fp, "%s: Volgende data ontvangen '%s'\r\n", date("H:i:s"), $data[0]);
        fclose($fp);
        $fp = fopen("db.txt", "w");
        fwrite($fp,$data[0]."\r\n"); //enter here might be a problem
        fwrite($fp,$data[1]."\r\n");
        fwrite($fp,$data[2]."\r\n");
        fwrite($fp,$data[3]."\r\n");*/

        $plantData = new PlantData();
        $plantData->setCelcius($data[0]);
        $plantData->setFahrenheit($data[1]);
        $plantData->setLight($data[2]);
        $plantData->setMoisture($data[3]);

        $return = $plantData->addData();

        /*fclose($fp);
        echo("Data written to file ");
        echo $data[0] . " " . $data[1] . " " . $data[2] . " " . $data[3] . "\r\n";
        exit;*/
    }
}
$result = PlantData::retrieveData();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://use.typekit.net/ayy1bcm.css">
    <link rel="stylesheet" href="css/details.css">
    <title><?php ?> Details</title>
</head>
<body>
    <header class="plant" id="montsera" data-name="monstera">
        <img id="back" src="images/back.png" alt="back">
        <h2 class="plantName">Monstera</h2>
    </header>
    <main>
        <article class="water">
            <h3>Water: <span class="accent">Low</span></h3>
            <div class="articleContent">
                <img class="icon" src="images/detail-icon-01.png" alt="">
                <div>
                    <p class="info">Soil is dry.</p>
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
            <h3>Temperature: <span class="accent">Good</span></h3>
            <div class="articleContent">
                <img class="icon" src="images/detail-icon-03" alt="">
                <div>
                    <p class="info">The temperature in the room is optimal!</p>
                </div>
            </div>
        </article>
    </main>
    <script src="js/details.js"></script>
</body>
</html>