<?php
    include_once(__DIR__ . "/nav.inc.php");
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <title>Profile</title>
</head>
<body>
    <header>
        <h1 id="title">My <strong class="accent title">Profile.</strong></h1>
    </header>
    <main>
        <div id="profHead">
            <div id="profPic"></div>
            <h2>Thomas Anderson</h2>
            <article>
                <p>See my profile</p>
                <img src="" alt="See Profile">
            </article>
        </div>

        <div id="profNav">
            <div>
                <article id="article-01" class="profBtn">
                    <img class="navIcon" src="images/prof-nav-01" alt="Plant Guide">
                    <p>Plant Guide</p>
                    <img class="linkArrow" src="images/nav-arrow" alt="Plant Guide">
                </article>
            </div>
            <div>
                <article id="article-02" class="profBtn">
                    <img class="navIcon" src="images/prof-nav-02" alt="My Favourites">
                    <p>My Favourites</p>
                    <img class="linkArrow" src="images/nav-arrow" alt="My Favourites">
                </article>
            </div>
            <div>
                <article id="article-03" class="profBtn">
                    <img class="navIcon" src="images/prof-nav-03" alt="Settings">
                    <p>Settings</p>
                    <img class="linkArrow" src="images/nav-arrow" alt="Settings">
                </article>
            </div>
        </div>
    </main>
    
</body>
</html>