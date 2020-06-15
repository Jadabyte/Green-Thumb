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
    <link rel="stylesheet" href="css/plantGuide.css">
    <title>Plant Guide</title>
</head>
<body>
    <header>
        <h1 id="title">Plant <strong class="accent title">guide.</strong></h1>
    </header>

    <main>
        <div id="divider"></div>
        <h2 id="season">In Season</h2>
        <?php foreach ($plants as $plant) : ?>
            <a href="plantInfo.php?plant=<?php echo($plant['name']); ?>" class="plantLink">
            <div class="plantCard">
                <article class="plant">
                    <div style="background-image: url(<?php echo(htmlspecialchars($plant['img'])); ?>);" class="plantPhoto"></div>
                    <div class="plantInfo">
                        <h2><?php echo($plant['name']); ?></h2>
                        <p>Care level: <?php echo($plant['care']); ?></p>
                    </div>
                    <img class="linkArrow" src="images/nav-arrow" alt="">
                </article>
            </div>
            </a>
        <?php endforeach ?>
    </main>
</body>
</html>