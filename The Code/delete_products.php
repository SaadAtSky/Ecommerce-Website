<?php
 //Include libraries
 require __DIR__ . '/vendor/autoload.php';
    
 //Create instance of MongoDB client
 $mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Extract ID from POST data
$productID = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

//Build PHP array with remove criteria 
$remCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($productID)
];

//Delete the product document
$returnVal = $db->products->deleteOne($remCriteria);
header('Location: add.php');
?>



