<?php
    include_once(__DIR__ . "/nav.inc.php");
    include_once(__DIR__ . "/Classes/Plants.php");

    $plants = Plants::fetchAllPlants();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://use.typekit.net/ayy1bcm.css">
    <link rel="stylesheet" href="css/addPlants.css">
    <title>My Plants</title>
</head>
<body>
    <header>
        <h1 id="title">Add <strong class="accent title">Plants.</strong></h1>
    </header>

    <main>
        <?php foreach($plants as $plant) :?>
            <article style="background-image:url(<?php echo($plant['img']); ?>)" class="plant" id="<?php echo($plant['name']); ?>" data-id="<?php echo($plant['id']); ?>" data-clicked="0">
                <h2 class="plantName"><?php echo($plant['name']); ?></h2>
            </article>
        <?php endforeach ?>
        
        <form id="addPlantsForm" action="" method="post">
            <?php foreach($plants as $plant) :?>
                <label class="plantCheckboxesLabel" for="plant<?php echo($plant['name']); ?>"></label>
                <input class="plantCheckboxes" type="checkbox" name="plantGroup" value="<?php echo($plant['id']) ?>" id="plant<?php echo($plant['name']); ?>">
            <?php endforeach ?>
        </form>
    </main>

    <div id="submitContain">
        <input id="submit" type="submit" value="Add Plants">
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/addPlants.js"></script>
</body>
</html>