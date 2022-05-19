<?php
 //Include libraries
 require __DIR__ . '/vendor/autoload.php';
    
 //Create instance of MongoDB client
 $mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Extract the product details 
$_id = filter_input(INPUT_POST, '_id', FILTER_SANITIZE_STRING);
$image_url= filter_input(INPUT_POST, 'image_url', FILTER_SANITIZE_STRING);
$name= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$description= filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$keywords = filter_input(INPUT_POST, 'keywords', FILTER_SANITIZE_STRING);
$size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_STRING);
$price= filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
$stock_count= filter_input(INPUT_POST, 'stock_count', FILTER_SANITIZE_STRING);
$available_sizes= filter_input(INPUT_POST, 'available_sizes', FILTER_SANITIZE_STRING);

$replaceCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($_id)
];
//Construct PHP array with data
$customerData = [
    // "_id" => new MongoDB\BSON\ObjectID($_id),
    "image_url" => $image_url,
    "name" => $name,
    "description" => $description,
    "keywords" => $keywords,
    "size" => $size,
    "price" => $price,
    "stock_count" => $stock_count,
    "available_sizes" => $available_sizes,
];

//Save the product in the database - it will overwrite the data for the product with this ID
$returnVal = $db->products->replaceOne($replaceCriteria,$customerData);

//Direct user to Add page
header('Location:add.php');
?>

