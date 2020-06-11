<?php
session_start();
include_once(__DIR__ . "/Classes/User.php");

if($_POST){
    try {
        if($_POST['reg_password'] == $_POST['passwordConfirm']){
            $user = new User;
            $user->setFirstname($_POST['reg_firstname']);
            $user->setLastname($_POST['reg_lastname']);
            $user->setEmail($_POST['reg_email']);
            $user->setPassword($_POST['reg_password']);

            $user->checkDuplicate();
            $user->createUser();

            $result = User::fetchId($_POST['reg_email']);
            $_SESSION['userId'] = $result['id'];
            
            header("location: index.php");
        }
        else{
            $error = "Your passwords do not match";
        }
    } catch (\Exception $e) {
        $error = $e->getMessage();
        //var_dump($error);
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
    <title>Green Thumb Registration</title>
</head>
<body>
    <header data-state="0" <?php if(isset($error)) : ?> style="margin-bottom: 40px" <?php endif ?>>
        <h1 id="title">Create <strong class="accent title">an account.</strong></h1>
    </header>
    <main id="registerForm">
        <form id="form" action="#" method="post">
            <?php if(isset($error)) : ?>
                <p style="color: red; margin-top: 0"><?php echo $error ?></p>
            <?php endif ?>
            
            <div class="firstname">
                <label for="Firstname"></label>
                <input type="text" id="Firstname" name="reg_firstname" placeholder="Firstname" value="<?php if(!empty($_POST['reg_firstname'])){ echo($_POST['reg_firstname']); } ?>">
            </div>

            <div class="lastname">
                <label for="Lastname"></label>
                <input type="text" id="Lastname" name="reg_lastname" placeholder="Lastname" value="<?php if(!empty($_POST['reg_lastname'])){ echo($_POST['reg_lastname']); } ?>">
            </div>

            <div class="email">
                <label for="Email"></label>
                <input type="text" id="Email" name="reg_email" placeholder="Email" value="<?php if(!empty($_POST['reg_email'])){ echo($_POST['reg_email']); } ?>">
            </div>

            <div class="password">
                <label for="Password"></label>
                <input type="password" class="visClass" id="Password" name="reg_password" placeholder="Password">
                <input type="checkbox" class="toggleVis">
            </div>

            <div class="confirm">
                <label for="PasswordConfirm"></label>
                <input type="password" class="visClass" id="PasswordConfirm" name="passwordConfirm" placeholder="Confirm Password">
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
        <p id="switchText">If you already have an account, <a id="register" href="login.php">log in here.</a></p>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/register.js"></script>
</body>
</html>