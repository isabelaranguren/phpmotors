<?php
/**
 * Vehicles controller
 */
// Get the DB connection.
require_once '../library/connections.php';
// Get the function library
require_once '../library/functions.php';
// Get the main model.
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/vehicles-model.php';

$classifications = getClassifications();
$navList = buildNavList($classifications);

// Build select list
$classificationList = '<select name="classificationId" id="classificationList">'; 
$classificationList .= "<option>Choose a Classification</option>"; 
foreach ($classifications as $classification) { 
 $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
} 
$classificationList .= '</select>'; 

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

switch ($action){
    case 'addvehicle':
        include '../view/add-vehicle.php';
        break;
    case 'add-classification':
        include '../view/add-classification.php';
        break;
    case 'insertvehicle':
            //Filter & store the data
            $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
            $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
            $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
            $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
            $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
            $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
            $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
            $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
                
            //Check for missing data
            if(empty($invMake) || empty($invModel) || empty($classificationId) || empty($invImage) ||
            empty($invThumbnail) || empty($invPrice ) || empty($invStock )|| empty($invColor )){
              $message = '<p>Please provide information for all empty form fields.</p>';
              include '../view/add-vehicle.php';
              exit;
          }
            // Send the data to the model if no error exist
                $regOutcome = insertvehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, 
                $invStock, $invColor, $classificationId);
          
            // Check and report the result    
              //   $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword);
            if ($regOutcome === 1) {
                $message = "<p>Vehicle has been added.</p>";
                
                include '../view/add-vehicle.php';
                exit;
            } else {
                $message = "<p>Sorry, but the registration failed. Please try again.</p>";
                include '../view/add-vehicle.php';
                exit;
            }
              break;
          
    
        case 'insertclassification';
        $classificationName = filter_input(INPUT_POST, 'classificationName',  FILTER_SANITIZE_STRING);
   // echo $classificationName;
    // Check for missing data
    if(empty($classificationName)){
      $message ='<p>Please enter the classification type.</p>';
      include '../view/add-classification.php';
   exit; 
  }

  $regOutcome = insertclassification($classificationName);

  // Check and report the result
if($regOutcome === 1){
    $message = "<p>Vehicle classification has been added</p>";
    include '../view/add-classification.php';
    exit;
    } else {
    $message = "<p>Sorry, the addition failed. The classification was not entered. Please try again.</p>";
    include '../view/add-classification.php';
    exit;
    }
    break;
    // case 'vehicle':
    // include '../view/add-man.php';
    // break;
    case 'add-classification';
      include '../view/add-classification.php';
    break;
   default:
    include '../view/add-man.php';
}



?>