<!DOCTYPE html>
<html>
    <head>
        <title>Results</title>
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
    </body>

<table class="table table-striped custab">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Email</th>
                            <th>Products</th>
                        </tr>
                    </thead>

<?php
//Start session management
session_start();

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Extract the data from session management
$search_string = $_SESSION['loggedInUserEmail'];

$findCriteria = [
        'customerEmail' => $search_string 
 ];

//Find all of the products that match  this criteria
$cursor = $db->orders->find($findCriteria);

//Output the results
foreach ($cursor as $document){
    $arr = $document['products'];
    $products = json_encode($arr);
    echo 
    "<tr>
      <td>" . $document['_id'] . "</td>
      <td>" . $document['customerEmail'] . "</td>
      <td>" . $products . "</td>
     </tr>";
    echo '</tbody>';
}
?>
