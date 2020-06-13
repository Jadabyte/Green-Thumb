<?php
    include_once(__DIR__ . "/nav.inc.php");
    include_once(__DIR__ . "/Classes/Chat.php");

    $chats = Chat::fetchChats($_SESSION['userId']);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://use.typekit.net/ayy1bcm.css">
    <link rel="stylesheet" href="css/chat.css">
    <title>Write a Post</title>
</head>
<body>
    <header>
        <a href="platform.php"><img src="images/back.png" id="back" alt="back"></a>
        <h1 id="title">Chat</h1>
        <a id="newChat" href=""><img id="chatImg" src="images/write-post.png" alt="New Chat"></a>
    </header>
    <main>
        <?php foreach($chats as $chat) : ?>
            <a class="msgLink" href="messages?chat=<?php echo($chat['id']); ?>">
            <article class="message">
                <div class="msgPic" style="background-image: url(<?php echo($chat['userImg']); ?>);"></div>
                <div class="msgInfo">
                    <h2 class="msgName"><?php echo(htmlspecialchars($chat['firstname'] . " " . $chat['lastname'])); ?></h2>
                    <p class="msgContent"><?php
                        if($chat['user_id'] == $_SESSION['userId']){
                            echo("You: ");
                        }
                        echo(htmlspecialchars($chat['content'])); 
                    ?></p>
                </div>
            </article>
            </a>
        <?php endforeach ?>
    </main>
</body>
</html>