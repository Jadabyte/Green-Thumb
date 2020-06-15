<?php
    include_once(__DIR__ . "/nav.inc.php");
    include_once(__DIR__ . "/Classes/Plants.php");

    $userId = $_SESSION['userId'];
    $plants = Plants::fetchAllUserPlants($userId);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://use.typekit.net/ayy1bcm.css">
    <link rel="stylesheet" href="css/index.css">
    <title>My Plants</title>
</head>
<body>
    <header>
        <h1 id="title">My <strong class="accent title">Plants.</strong></h1>
    </header>

    <main>
        <?php foreach($plants as $plant) :?>
            <a class="plantLink" href="plantdetails.php?plant=<?php echo(strtolower($plant['name'])); ?>">
                <article style="background-image:url(<?php echo($plant['img']); ?>)" class="plant" id="<?php echo($plant['name']); ?>">
                    <h2 class="plantName"><?php echo($plant['name']); ?></h2>
                </article>
            </a>
        <?php endforeach ?>
        <a class="plantLink" href="addPlants.php">
            <article class="plant" id="addPlant">
                <h2 class="plantName">Add Plant</h2>
            </article>
        </a>
    </main>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/index.js"></script>
</body>
</html>