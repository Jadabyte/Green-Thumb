<?php
include_once(__DIR__ . "/Classes/PlantData.php");

if(isset($_POST["data"])){
    if(!empty($_POST["data"])){	//Eigenlijk zouden hier nog andere checks moeten gebeuren
        $data = null;
        $data = explode(";", $_POST["data"]);
        var_dump($data);

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
        var_dump($return);

        /*fclose($fp);
        echo("Data written to file ");
        echo $data[0] . " " . $data[1] . " " . $data[2] . " " . $data[3] . "\r\n";
        exit;*/
    }
}
$result = PlantData::retrieveData();
var_dump($result);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php ?> Details</title>
</head>
<body>
    <article class="plant" id="montsera" data-name="monstera">
        <h2 class="plantName">Monstera</h2>
        <div>
            <article class="water">
                <h3>Water: Low</h3>
                <div>
                    <img src="" alt="">
                    <div>
                        <p>Soil is dry.</p>
                        <p>Give 250 ml of water</p>
                    </div>
                </div>
            </article>
            <article class="sunlight">
                <h3>Sunlight: Good</h3>
                <div>
                    <img src="" alt="">
                    <div>
                        <p>Your plant is receiving enough sunlight!</p>
                    </div>
                </div>
            </article>
            <article class="temperature">
                <h3>Temperature: Good</h3>
                <div>
                    <img src="" alt="">
                    <div>
                        <p>The temperature in the room is optimal!</p>
                    </div>
                </div>
            </article>
        </div>
    </article>
</body>
</html>