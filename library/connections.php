<?php
    function phpmotorsConnect(){
        $server = 'localhost';
        $dbname= 'phpmotors';
        $username = 'iClient';
        $password = 'UUHl8dpy55WvprJf';
        $dsn = "mysql:host=$server;dbname=$dbname";
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        // Create the actual connection object and assign it to a variable
        try {
            $link = new PDO($dsn, $username, $password, $options);
             //if (is_object($link)) {
             //   echo 'It Worked!';
             // }
            return $link;
        } catch(PDOException $e) {
            // echo 'It didnt work, error: ' . $e->getMessage();
            header('Location: /phpmotors/view/500.php');
            exit;
        }
}
// phpmotorsConnect();
?>