
<?php
/** 
 * Vehicles Model
 */

//Register new client
function insertvehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId) {
    $db = phpmotorsConnect();
    //The SQL statement
    $sql =
        'INSERT INTO
        inventory (invMake, invModel, invDescription, invImage, invThumbnail, invPrice, invStock, invColor, classificationId)
    VALUES (:invMake, :invModel, :invDescription, :invImage, :invThumbnail, :invPrice, :invStock, :invColor, :classificationId)';
    //create the prepared statement using the PHP Motors connection
    $stmt = $db->prepare($sql);
    //Replace the placeholder & give data type
    $stmt->bindValue(':invMake', $invMake, PDO::PARAM_STR);
    $stmt->bindValue(':invModel', $invModel, PDO::PARAM_STR);
    $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
    $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
    $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
    $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
    $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
    $stmt->bindValue(':invColor', $invColor, PDO::PARAM_STR);
    $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_INT);
    //Insert the data
    $stmt->execute();
    //Ask how many rows changed due to the insert
    $rowsChanged = $stmt->rowCount();
    //Close the database interaction
    $stmt->closeCursor();
    //Return the indication of success
    return $rowsChanged;
}

//Contain a function for inserting a new classification to the carclassifications table.
function insertclassification($classificationName) {
    $db = phpmotorsConnect();
    $sql = 'INSERT INTO carclassification (classificationName) VALUES (:classificationName)';
    //create the prepared statement using the PHP Motors connection
    $stmt = $db->prepare($sql);
    //Replace the placeholder & give data type
    $stmt->bindValue(':classificationName', $classificationName, PDO::PARAM_STR);
    //Insert the data
    $stmt->execute();
    //Ask how many rows changed due to the insert
    $rowsChanged = $stmt->rowCount();
    //Close the database interaction
    $stmt->closeCursor();
    //Return the indication of success
    return $rowsChanged;
}

//Get vehicle information by invId
function getInvItemInfo($invId) {
    $db = phpmotorsConnect();
    //The SQL statement
    $sql = 'SELECT * FROM inventory JOIN images ON inventory.invId = images.invId WHERE inventory.invId = :invId AND imgPrimary = "1"';
    //create the prepared statement using the PHP Motors connection
    $stmt = $db->prepare($sql);
    //Replace the placeholder & give data type
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    //Execute the sql
    $stmt->execute();
    //Fetch the data as an associative array
    $invInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //Close the database interaction
    $stmt->closeCursor();
    //Return the indication of success
    return $invInfo;
}


?>