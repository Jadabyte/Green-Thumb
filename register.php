<!DOCTYPE html>
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
    <header>
        <h1 id="title">Create <strong class="accent">an account</strong></h1>
    </header>
    <main id="registerForm">
        <form action="" method="POST">
            <div>
                <label for="Name"></label>
                <input type="text" id="Name" name="name" placeholder="Firstname">
            </div>

            <div>
                <label for="Name"></label>
                <input type="text" id="Name" name="name" placeholder="Lastname">
            </div>

            <div>
                <label for="Email"></label>
                <input type="text" id="Email" name="email" placeholder="Email">
            </div>

            <div>
                <label for="Password"></label>
                <input type="text" id="Password" name="password" placeholder="Password">
            </div>

            <div class="hidden">
                <label for="PasswordConfirm"></label>
                <input type="text" id="PasswordConfirm" name="passwordConfirm" placeholder="Confirm Password">
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
</body>
</html>