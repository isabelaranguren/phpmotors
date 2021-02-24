<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Isabel Aranguren">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen" href="/phpmotors/css/main.css">
    <link rel="stylesheet" media="screen" href="/phpmotors/css/large.css">
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
    <h1>Add A Vehicle</h1><br>
    <?php
        if (isset($message)) {
        echo $message;
                }
    ?>
      <form method = "post" action="/phpmotors/vehicles/index.php">
      <label>Select classification</label><br><br>
        <?php echo $classificationList; ?><br><br>
        <label>Enter a Make</label><br>
        <input name="invMake" id="invMake" type="text" <?php if(isset($invMake)){echo "value='$invMake'";} ?> required placeholder = "Ex. Dodge, Ford, Hyundai..."><br>
            <label>Enter a Model</label><br>
            <input name="invModel" id="invModel" type="text" <?php if(isset($invModel)){echo "value='$invModel'";} ?> required placeholder = "Ex. Charger, F-150, Sonata..."><br>
            <label>Enter Description</label><br>
            <textarea name="invDescription" id="invDesc" type="text"required><?php if(isset($invDescription)){echo "value='$invDescription'";} ?> </textarea><br>
            <input required type="text" name="invImage" value="C:\xampp\htdocs\phpmotors\images\no-image.png" id="invImage" <?php if(isset($invImage)){echo "value='$invImage'";}  ?> ><br>
            <label>Thumbnail Path</label><br>
            <input required type="text" name="invThumbnail" value="C:\xampp\htdocs\phpmotors\images\no-image.png" id="invThumbnail" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}  ?> >
            <label>Enter a price</label><br>
            <input name="invPrice" id="invPrice" type="text" <?php if(isset($invPrice)){echo "value='$invPrice'";} ?> required placeholder = "Ex. 30500.43"><br>
            <label>Enter number in stock</label><br><br>
            <input name="invStock" id="invStock" type="number" <?php if(isset($invStock)){echo "value='$invStock'";} ?> required placeholder="0"><br><br>
            <label>Enter a color</label><br>
            <input name="invColor" id="invColor" type="text" <?php if(isset($invColor)){echo "value='$invColor'";} ?> required placeholder = "Ex. Black, Navy, Silver..."><br>
            <input type = "submit" name = "submit" value = "Add Vehicle"><br>
            <input type="hidden" name="action" value="insertvehicle">
            <a href="/phpmotors/vehicles/">Go back to management</a>
        </form>
    </main>
    <hr>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/footer.php'; ?>
    </footer>
    </div>
    <script src="js/main.js"></script>
</body>
</html>
