<?php
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection
$collection = $db->products;

//Extract the data that was sent to the server
$image_url = filter_input(INPUT_POST, 'image_url', FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$keywords = filter_input(INPUT_POST, 'keywords', FILTER_SANITIZE_STRING);
$size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
$stock_count = filter_input(INPUT_POST, 'stock_count', FILTER_SANITIZE_STRING);
$available_sizes = filter_input(INPUT_POST, 'available_sizes', FILTER_SANITIZE_STRING);

//Convert to PHP array
$dataArray = ["image_url" => $image_url, "name" => $name, "description" => $description, "keywords" => $keywords, "size" => $size, "price" => $price, "stock_count" => $stock_count, "available_sizes" => $available_sizes];

//Add the new product to the database
$returnVal = $collection->insertOne($dataArray);
header('Location:add.php');
?>