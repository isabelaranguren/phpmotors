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
        <section>
        <h1 class="center">Sign in</h1>
        <?php 
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
           ?>
        <form class="formContainer" id="forms" method="post" action="/phpmotors/accounts/">
          <label for="address">Email Address:</label><br>
          <input type="email" id="address" name="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?> required>
          <label for="password">Password:</label>
          <input type="password" id="password" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
          <input type="submit" id="register-submit" value="Sign-in">
          <input type="hidden" name="action" value="Login">
        </form>
      <a href="/phpmotors/accounts/index.php?action=newClient" id="needReg">Not a member yet?</a>
      <hr id="break">
    </section>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>
    </main>
    </div>
    <script src="/phpmotors/js/main.js"></script>

</body>
</html>
