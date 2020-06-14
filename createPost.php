<?php
    include_once(__DIR__ . "/nav.inc.php");
    include_once(__DIR__ . "/Classes/Post.php");
    include_once(__DIR__ . "/Classes/User.php");

    $id = $_SESSION['userId'];
    $user = User::fetchUser($id);

    if($_POST){
        try {
            $post = new Post;
            $post->setContent($_POST['postContent']);
            $post->setUserId($_SESSION['userId']);

            $result = $post->createPost();
            
            header("location: platform.php");
        } catch (\Exception $e) {
            $error = $e->getMessage();
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
    <link rel="stylesheet" href="css/createPost.css">
    <title>Write a Post</title>
</head>
<body>
    <header>
        <a href="platform.php"><img src="images/back.png" id="back" alt="back"></a>
        <h1 id="title">Write <strong class="accent title">a post.</strong></h1>
        <a id="post" href="">Post</a>
    </header>
    <main>
        <form id="textForm" action="#" method="post">
            <div style="background-image: url(<?php echo(htmlspecialchars($user['userImg'])); ?>);" id="profilePhoto"></div>
            <label for="postContent"></label>
            <textarea name="postContent" id="postContent" placeholder="Start writing..."></textarea>
        </form>
    </main>
</body>
<script>
    document.querySelector("#post").addEventListener("click", function(e){
        console.log("submitted");
        document.querySelector("#textForm").submit();
        e.preventDefault();
    });
</script>
</html>