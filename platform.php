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
        <a id="messages" href="chat.php"><img src="images/message.png" alt="Messages"></a>
    </header>
    <main>
        <?php foreach($posts as $post) : ?>
            <div class="post">
                <div class="postHead">
                    <div class="userImg" style="background-image:url(<?php echo(htmlspecialchars($post['userImg'])); ?>)"></div>
                    <h3><?php echo($post['firstname'] . " " . $post['lastname']); ?></h3>
                </div>
                <?php if($post['postImg']) : ?>
                    <div class="postImg" style="background-image: url(<?php echo(htmlspecialchars($post['postImg'])); ?>);"></div>
                <?php endif ?>
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
    <a class="createPost" href="createPost"><img src="images/write-post.png" alt="Create a new post"></a>
</body>
</html>