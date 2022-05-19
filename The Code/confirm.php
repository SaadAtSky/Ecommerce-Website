<!DOCTYPE html>
<html>
    <head><meta charset="utf-8">
        <title>Confirmation</title>
        
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="basket.js"></script>
    <script type="text/javascript">var cmpIsOn = true;</script></head>
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
                    <form class="navbar-form navbar-right" action="find_product.php" method="get">
                        <div class="form-group input-group">
                            <input type="text" name="name" class="form-control" placeholder="Search Nike, Adidas, Jordan, Yeezy etc." style="width: 700px;">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>        
                        </div>
                    </form>
                    
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
//Starts session management
session_start();

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Extract the product IDs that were sent to the server
$prodIDs = $_POST['prodIDs'];

//Extract the Shipping Address that was sent to the server
$shippingAddress = filter_input(INPUT_POST, 'shipping_address', FILTER_SANITIZE_STRING);

//Convert JSON string to PHP array
$productArray = json_decode($prodIDs, true);

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection
$collection = $db->orders;

//Convert to PHP array
$orderDataArray = ["customerID" => $_SESSION['customerID'], "customerEmail" => $_SESSION['loggedInUserEmail'], "shippingAddress" => $shippingAddress, "products" => $productArray];

//Add the new product to the database
$insertResult = $collection->insertOne($orderDataArray);

//Confirmation message upon successfull placement of order
echo '<h1>Order Confirmed</h>';
?>
</body>
</html>

