<?php
    session_start();
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
    <link rel="stylesheet" href="css/messages.css">
    <title>Messages</title>
</head>
<body>
    <header>
        <div id="head">
            <a id="backLink" href="platform.php"><img src="images/back_white.png" id="back" alt="back"></a>
            <h1 id="title">Sasha Ho</h1>
        </div>
    </header>
    <main>

    </main>
    <footer>
        <form action="#" method="post">
            <label for="msgContent"></label>
            <input type="text" name="msgContent" id="msgContent" placeholder="Enter your message...">
        </form>

        <a href=""><img src="" alt=""></a>
    </footer>
</body>
</html>