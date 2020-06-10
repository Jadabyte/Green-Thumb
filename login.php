<?php

include_once(__DIR__ . "/Classes/User.php");

if(isset($_POST['reg_firstname'])){
    try {
        echo("set");
        $user = new User;
        $user->setFirstname($_POST['reg_firstname']);
        $user->setLastname($_POST['reg_lastname']);
        $user->setEmail($_POST['reg_email']);
        $user->setPassword($_POST['reg_password']);

        $user->createUser();
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
    <link rel="stylesheet" href="css/register.css">
    <title>Green Thumb Login</title>
</head>
<body>
    <header data-state="0">
        <h1 id="title">Welcome <strong class="accent title">back.</strong></h1>
        <p id="subHead">Sign in to continue</p>
    </header>
    <main id="registerForm">
        <form id="form" action="landing.php" method="post">
            <div class="email">
                <label for="Email"></label>
                <input type="text" id="Email" name="reg_email" placeholder="Email">
            </div>

            <div class="password">
                <label for="Password"></label>
                <input type="password" id="Password" name="reg_password" placeholder="Password">
                <p id="forgot">Forgot your password?</p>
            </div>

            <div>
                <input id="submit" type="submit" value="Continue">
            </div>
        </form>
    </main>
    
    <div id="divide">
        <h2 id="separator"><span>Or</span></h2>
    </div>

    <footer id="registerAlt">
        <div id="facebook">
            <img class="img" src="images/logo-facebook.png" alt="Continue with Facebook">
            <p>Continue with Facebook</p>
        </div>

        <div id="google">
            <img class="img" src="images/logo-google.png" alt="Continue with Google">
            <p>Continue with Google</p>
        </div>
    </footer>

    <div id="switch">
        <p id="switchText">If you don't have an account yet, <a id="register" href="register.php">sign up here.</a></p>
    </div>

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/register.js"></script>-->
</body>
</html>