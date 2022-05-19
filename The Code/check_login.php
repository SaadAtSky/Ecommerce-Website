<?php
//Start session management
session_start();

//Get email and password strings - need to filter input to reduce chances of SQL injection etc.
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);
$db = $mongoClient->ecommerce;

//Create a PHP array with our search criteria
$findCriteria = ["email" => $email, ];

//Find all of the customers that match  this criteria
$cursor = $db
    ->customers
    ->find($findCriteria);

// //Get customer
foreach ($cursor as $customer)
{

    //Check password
    if ($customer['password'] != $password)
    {
        echo 'Password incorrect.';
    }
    else
    {
        //Start session for this user
        $_SESSION['loggedInUserEmail'] = $email;
        $_SESSION['customerID'] = $customer['_id'];

        //Inform web page that login is successful
        echo 'You have successfully logged in as: ' . $email;

        //Direct user to Home page
        header('Location: index.php');
    }
}
?>