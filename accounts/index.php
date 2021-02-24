<?php

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the functions library
require_once '../library/functions.php';
// Get the vehicle model for use as needed
require_once '../model/vehicles-model.php';

// Create or access a Session
session_start();


// Get the array of classifications
$classifications = getClassifications();

$navList = buildNavList($classifications);
 
$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

switch ($action) {
  // Code to deliver the views will be here
  case 'register':

    $clientFirstName = filter_input(INPUT_POST, 'clientFirstName', FILTER_SANITIZE_STRING);
    $clientLastName = filter_input(INPUT_POST, 'clientLastName', FILTER_SANITIZE_STRING);
    $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
    $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);

    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);

    // Check for missing data
    if (empty($clientFirstName) || empty($clientLastName) || empty($clientEmail) || empty($checkPassword)) {
      $message = '<p class="errorMessage">Please provide information for all empty form fields.</p>';
      break;
    }

    // Hash the checked password
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

    // Send the data to the model
    $regOutcome = regClient($clientFirstName, $clientLastName, $clientEmail, $hashedPassword);

    // Check and report the result
    if ($regOutcome === 1) {
      setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
      $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
      header('Location: /phpmotors/accounts/?action=login');
      exit;

    } else {
      $message = "<p>Sorry $clientFirstName, but the registration failed. Please try again.</p>";
    }

    break;
  case 'Login':
    $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
    $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);
    $existingEmail = checkExistingEmail($clientEmail);

    // Run basic checks, return if errors
    if (empty($clientEmail) || empty($passwordCheck) || !$existingEmail) {
        $_SESSION['message'] = '<p class="notice">Please provide a valid email address and password.</p>';
        include '../view/login.php';
        exit;
    }
      // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if(!$hashCheck) {
          $_SESSION['message'] = '<p class="notice">Please check your password and try again.</p>';
          include '../view/login.php';
          exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view
  
    include '../view/admin.php';
    break;
  case 'logout':
    session_destroy();
    setcookie("firstName", "", time()-3600, '/');
    header('Location: /phpmotors/');
    break;
case 'newClient':
  include '../view/registration.php';
  break;
case 'login':
  include '../view/login.php';
  break;
default:
 include '../view/home.php';
 break;
}

?>