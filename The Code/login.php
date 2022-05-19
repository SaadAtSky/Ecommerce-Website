<?php
//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Start session management
session_start();

//Get name and address strings - need to filter input to reduce chances of SQL injection etc.
$email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING); 

//Select a database
$db = $mongoClient->ecommerce;

//Create a PHP array with our search criteria
$findCriteria = [
"email" => $email, 
];

//Find all of the admins that match this criteria
$cursor = $db->admin->find($findCriteria);

//Get admin
foreach ($cursor as $admin){

//Check password
if($admin['password'] != $password){
echo 'Password incorrect.';
break;
}
if($admin['email'] != $email){
    echo 'Email incorrect.';
    break;
    }
//Start session for this user
$_SESSION['loggedInUserEmailAdmin'] = $email;

//Inform web page that login is successful
echo 'ok'; 

//Direct user to Add page
header('Location: add.php');
}
?>
