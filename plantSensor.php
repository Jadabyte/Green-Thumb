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

/* These print the data onto the webpage */
echo("Celcius: " . $result['celcius'] . "<br></br>");
echo("Fahrenheit: " . $result['fahrenheit'] . "<br></br>");
echo("Brightness: " . $result['light'] . "<br></br>");
echo("Moisture: " . $result['moisture'] . "<br></br>");
echo("Date of Measurement: " . $result['time'] . "<br></br>");