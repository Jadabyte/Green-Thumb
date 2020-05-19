<?php

include_once(__DIR__ . "/Classes/User.php");
if(!empty($_POST)){
    try {
        $user = new User;
        $user->setFirstname($_POST['firstname']);
        $user->setLastname($_POST['lastname']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);

        var_dump($_POST['firstname']);
    } catch (\Exception $e) {
        $error = $e->getMessage();
    }
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://use.typekit.net/ayy1bcm.css">
    <link rel="stylesheet" href="css/register.css">
    <title>Green Thumb Registration</title>
</head>
<body>
    <header data-state="0">
        <h1 id="title">Welcome <strong class="accent title">back.</strong></h1>
        <p id="subHead">Sign in to continue</p>
    </header>
    <main id="registerForm">
        <form action="" method="post">
            <div class="firstname hidden">
                <label for="Firstname"></label>
                <input type="text" id="Firstname" name="firstname" placeholder="Firstname">
            </div>

            <div class="lastname hidden">
                <label for="Lastname"></label>
                <input type="text" id="Lastname" name="lastname" placeholder="Lastname">
            </div>

            <div class="email">
                <label for="Email"></label>
                <input type="text" id="Email" name="email" placeholder="Email">
            </div>

            <div class="password">
                <label for="Password"></label>
                <input type="password" id="Password" name="password" placeholder="Password">
                <p id="forgot">Forgot your password?</p>
            </div>

            <div class="hidden confirm">
                <label for="PasswordConfirm"></label>
                <input type="password" id="PasswordConfirm" name="passwordConfirm" placeholder="Confirm Password">
            </div>

            <div>
                <input type="submit" id="submit" value="Continue">
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
        <p id="switchText">If you don't have an account yet, <a id="register" href="#">sign up here.</a></p>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/register.js"></script>
</body>
</html>