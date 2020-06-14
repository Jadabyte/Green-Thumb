<?php
include_once(__DIR__ . "/Classes/PlantData.php"); // This class is used for adding and retrieving data

if(isset($_POST["data"])){ // Checks if $_POST['data'] exists
    if(!empty($_POST["data"])){ // Checks that something is stored in $_POST['data']
        var_dump($_POST["data"]); // Dumps the information that was received (this is displayed in the serial monitor)
        $data = null;
        $data = explode(";", $_POST["data"]); // Splits the data into usable parts

        $plantData = new PlantData(); // New instance of class PlantData
        $plantData->setCelcius($data[0]); // Assigns the data to a variable using getters
        $plantData->setFahrenheit($data[1]);
        $plantData->setLight($data[2]);
        $plantData->setMoisture($data[3]);

        $plantData->addData(); // Enters the data into the database
    }
}

$result = PlantData::retrieveData(); // Retrieves the most recent entry from the database

$celcius = $result['celcius'];
    if($celcius < 15) { 
        $tempHead = "Low";
        $tempContent = "It's too cold, find a warmer spot";
    }
    else if($celcius > 15 && $celcius < 24) { 
        $tempHead = "Good";
        $tempContent = "The temperature in the room is optimal!";
    }
    else {
        $tempHead = "High";
        $tempContent = "It's too warm, find a cooler spot";
    }
$fahrenheit = $result['fahrenheit'];

$light = $result['light'];
    if($result['light'] < 333){
        $brightnessHead = "Low";
        $brightnessContent = "Your plant isn't receiving enough sunlight";
        $brightness = "Dark";
    }
    else if($result['light'] > 333 && $result['light'] < 666){
        $brightnessHead = "Good";
        $brightnessContent = "Your plant is receiving enough sunlight!";
        $brightness = "Bright";
    }
    else if($result['light'] > 666){
        $brightnessHead = "High";
        $brightnessContent = "Your plant is receiving too much sunlight";
        $brightness = "Extremely Bright";
    }

$moisture = $result['moisture'];
    if($result['moisture'] < 50){
        $waterHead = "Low";
        $waterState = "Your plant needs to be watered";
    }
    else{
        $waterHead = "Normal";
        $waterState = "All good";
    }

/* These print the data onto the webpage */
/*echo("Celcius: " . $result['celcius'] . "<br></br>");
echo("Fahrenheit: " . $result['fahrenheit'] . "<br></br>");
echo("Brightness: " . $result['light'] . " - " . $brightness . "<br></br>");
echo("Moisture: " . $result['moisture'] . " - " . $waterState . "<br></br>");
echo("Date of Measurement: " . $result['time'] . "<br></br>");*/
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://use.typekit.net/ayy1bcm.css">
    <link rel="stylesheet" href="css/plantSensor.css">
    <title><?php ?> Details</title>
</head>
<body>
    <header class="plant" id="montsera" data-name="monstera">
        <h2 class="plantName">Plant Monitor</h2>
    </header>
    <main>
        
        <article class="water plantCard">
            <h3>Water: <span class="accent"><?php echo($waterHead); ?></span></h3>
            <div class="articleContent">
                <img class="icon" src="images/detail-icon-01.png" alt="">
                <div>
                    <p class="info">
                        <?php echo($waterState); ?>
                    </p>
                </div>
            </div>
        </article>

        <article class="sunlight plantCard">
            <h3>Sunlight: <span class="accent"><?php echo($brightnessHead); ?></span></h3>
            <div class="articleContent">
                <img class="icon" src="images/detail-icon-02" alt="">
                <div>
                    <p class="info"><?php echo($brightnessContent); ?></p>
                </div>
            </div>
        </article>

        <article class="temperature plantCard">
            <h3>Temperature: 
                <span class="accent"><?php echo($tempHead) ?></span>
            </h3>
            <div class="articleContent">
                <img class="icon" src="images/detail-icon-03" alt="">
                <div>
                    <p class="info"><?php echo($tempContent) ?></p>
                </div>
            </div>
        </article>

    </main>
    <script src="js/details.js"></script>
</body>
</html>