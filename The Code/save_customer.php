<?php
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection
$collection = $db->customers;

//Extract the data that was sent to the server
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

//Convert to PHP array
$dataArray = ["name" => $name, "email" => $email, "password" => $password];

//Add the new product to the database
$insertResult = $collection->insertOne($dataArray);

//Direct user to login page
header('Location:login_customer.php');
?>