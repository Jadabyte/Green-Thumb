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
    <link rel="stylesheet" href="css/profile.css">
    <title>Profile</title>
</head>
<body>
    <header>
        <h1 id="title">My <strong class="accent title">Profile.</strong></h1>
    </header>
    <main>
        <div id="profMain">
            <div id="profHead">
                <div id="profPic"></div>
                <h2>Thomas Anderson</h2>
            </div>
            <article id="profileLink">
                <p>See my profile</p>
                <img src="images/nav-arrow" alt="See Profile">
            </article>
        </div>

        <div id="profNav">
            <div  id="article-01">
                <article class="profBtn">
                    <img class="navIcon" src="images/prof-nav-01" alt="Plant Guide">
                    <p>Plant Guide</p>
                    <img class="linkArrow" src="images/nav-arrow" alt="Plant Guide">
                </article>
            </div>
            <div id="article-02">
                <article class="profBtn">
                    <img class="navIcon" src="images/prof-nav-02" alt="My Favourites">
                    <p>My Favourites</p>
                    <img class="linkArrow" src="images/nav-arrow" alt="My Favourites">
                </article>
            </div>
            <div id="article-03">
                <article class="profBtn">
                    <img class="navIcon" src="images/prof-nav-03" alt="Settings">
                    <p>Settings</p>
                    <img class="linkArrow" src="images/nav-arrow" alt="Settings">
                </article>
            </div>
        </div>
    </main>
    
</body>
</html>