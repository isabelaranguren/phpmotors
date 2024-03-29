<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Isabel Aranguren">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen" href="css/main.css">
    <link rel="stylesheet" media="screen" href="css/large.css">
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <title>PHP Motors Homepage</title>
</head>
<body>
    <div id="wrapper"> 
    <header>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/header.php'; ?>
    </header>
    <nav>
    <?php echo $navList; ?>
    </nav>
    <main>
        <section>
            <h1>Welcome to PHP Motors!</h1>
            <div id="about">
            <h2>DMC Delorean</h2>
                <p>3 Cup holders</p>
                <p>Superman doors</p>  
                <p>Fuzzy dice!</p>
                <img src="/phpmotors/images/delorean.jpg"  alt="Delorean">
                <button type="button">Own Today</button>
            </div>
        </section>
        <div id="base">
        <div id="col1">
                <h2>DMC Delorean Reviews</h2>
                <ul>
                    <li>"So fast it's almost like traveling in time." (4/5)</li>
                    <li>"Coolest ride on the road." (4/5)</li>
                    <li>"I'm feeling Marty McFly!" (5/5)</li>
                    <li>"The most futuristic ride of our day." (4.5/5)</li>
                    <li>"80s livin and I love it!" (5/5)</li>
                </ul>
            </div>
            <div id="col2">
                <h2>Delorean Upgrades</h2>
                    <div id="grid">
                    <div class="upgrades">
                        <img src="/phpmotors/images/upgrades/flux-cap.png" alt="Flux capacitor">
                        <a href="#">Flux Capacitor</a>
                    </div>
                    <div class="upgrades">
                        <img src="/phpmotors/images/upgrades/flame.jpg" alt="Flames">
                        <a href="#">Flame Decals</a>

                    </div>
                    <div class="upgrades">
                        <img src="/phpmotors/images/upgrades/bumper_sticker.jpg" alt="Bumper sticker">
                        <a href="#">Bumper Sticker</a>

                    </div>
                    <div class="upgrades">
                        <img src="/phpmotors/images/upgrades/hub-cap.jpg" alt="Hub Cap">
                        <a href="#">Hub Caps</a>

                    </div>
                    </div>
            </div>
        </div>
    </main>
    <hr>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/footer.php'; ?>
    </footer>
    </div>
    <script src="js/main.js"></script>
</body>
</html>
