<?php
    include_once(__DIR__ . "/nav.inc.php");
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <article class="plant" id="montsera" data-name="monstera">
            <h2 class="plantName">Monstera</h2>
        </article>

        <article class="plant" data-name="tomato">
            <h2>Tomato</h2>
        </article>

        <article class="plant" data-name="basil">
            <h2>Basil</h2>
        </article>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/index.js"></script>
</body>
</html>