<!DOCTYPE html>
<html>
    <head>
        <title>Basket Demo</title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="basket.js"></script>
    </head>
    <body>
            <!--Navigation bar-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <div class="theName">
                <a href="index.php">SneakerZ-4U</a>
            </div>
            <li class="nav-item">
                <div class="wrap">
                    <!--search bar-->
                    <form class="example" action="find_product.php" method="get">
                        <input type="text" placeholder="Search Nike and Adidas" name="name" method="get">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </li>
            <!--Navigation bar headings-->
            <div class="headings">
                <li class="nav-item">
                    <a class="nav-link" href=" register.html">My Account</a>
                </li>
            </div>
            <li class="nav-item">
                <a class="nav-link" href="update-customer.html">Edit Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=" logout_customer.php">logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=" orders.php">Orders</a>
            </li>
        </ul>
    </nav>
<?php
//Start session management
session_start();

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Extract the customer details 
$name= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

//Criteria for finding document to replace
$replaceCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($id)
];

//Data to replace
$customerData = [
    "name" => $name,
    "email" => $email,
    "password" => $password
];

//Replace customer data for this ID
$updateRes = $db->customers->replaceOne($replaceCriteria, $customerData);
    
//Echo result back to user
if($updateRes->getModifiedCount() == 1)
    echo '<h1>Your account details have been successfully updated</h1>';
else
    echo '<h1>Customer replacement error</h1>';

?>
</body>
</html>



