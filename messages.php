<?php
    session_start();
    include_once(__DIR__ . "/Classes/Chat.php");
    include_once(__DIR__ . "/Classes/User.php");

    $user1 = $_SESSION['userId'];
    $user2 = $_GET['chat'];

    $messages = Chat::fetchMessages($user1, $user2);
    $user2name = User::fetchUser($_GET['chat']);
    
    $chatId = $messages[0]['id'];

    if($_POST){
        try {
            $chat = new Chat;
            $chat->setUser1($user1);
            $chat->setChatId($chatId);
            $chat->setContent($_POST['msgContent']);

            $result = $chat->createMessage();
            return $result;
        } catch (\Exception $e) {
            $error->getMessage();
        }
    }
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
            <a id="backLink" href="chat.php"><img src="images/back_white.png" id="back" alt="back"></a>
            <h1 id="title"><?php echo(htmlspecialchars($user2name['firstname'] . " " . $user2name['lastname'])); ?></h1>
        </div>
    </header>
    <main>
        <?php foreach($messages as $message) : ?>
            <div class=" 
                <?php 
                    if($message['user_id'] == $user1) { 
                        echo("message messageUser1"); }

                    else {
                        echo("message messageUser2");  
                    }
                ?> ">
                <p><?php echo(htmlspecialchars($message['content'])); ?></p>
            </div>
        <?php endforeach ?>
    </main>
    <footer>
        <div id="msgCreate">
            <form id="msgForm" action="" method="post">
                <label for="msgContent"></label>
                <input type="text" name="msgContent" id="msgContent" placeholder="Enter your message...">
            </form>

            <div id="msgSend"></div>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/messages.js"></script>
</body>
</html>