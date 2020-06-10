<?php
    include_once(__DIR__ . "/nav.inc.php");
    include_once(__DIR__ . "/Classes/User.php");

    $posts = User::fetchPosts();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://use.typekit.net/ayy1bcm.css">
    <link rel="stylesheet" href="css/platform.css">
    <title>Platform</title>
</head>
<body>
    <header>
        <h1 id="title">Share <strong class="accent title">your goods.</strong></h1>
        <img id="messages" src="images/message.png" alt="Messages">
    </header>
    <main>
        <?php foreach($posts as $post) : ?>
            <div class="post">
                <div class="postHead">
                    <img class="userImg" src="https://randomuser.me/api/portraits/women/95.jpg" alt="User Photo">
                    <h3><?php echo($post['firstname'] . " " . $post['lastname']); ?></h3>
                </div>
                <img class="postImg" src="https://images.pexels.com/photos/143133/pexels-photo-143133.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Item">
                <p>
                    <?php echo($post['content']); ?>
                </p>
                <div class="buttons">
                    <a class="btn message" href="">Message</a>
                    <a class="btn claim" href="">Claim</a>
                </div>
            </div>
        <?php endforeach ?>
    </main>
    <a class="createPost" href=""><img src="images/write-post.png" alt="Create a new post"></a>
</body>
</html>