<link rel="stylesheet" href="css/nav.css">
<nav>
    <div id="plants">
        <a href="index.php"><img class="navImg" src="images/nav-01.png" alt="My Plants"></a>
        <?php if(basename($_SERVER['PHP_SELF']) == "index.php" || basename($_SERVER['PHP_SELF']) == "plantdetails.php") : ?>
            <p>My Plants</p>
        <?php endif; ?>
    </div>

    <div id="platform">
        <a href="platform.php"><img class="navImg" src="images/nav-02.png" alt="Platform"></a>
        <?php if(basename($_SERVER['PHP_SELF']) == "platform.php") : ?>
            <p>Platform</p>
        <?php endif; ?>
    </div>

    <div id="profile">
        <a href="profile.php"><img class="navImg" src="images/nav-03.png" alt="Profile"></a>
        <?php if(basename($_SERVER['PHP_SELF']) == "profile.php") : ?>
            <p>Profile</p>
        <?php endif; ?>
    </div>
</nav>