<!DOCTYPE html>
<html>
    <head><meta charset="utf-8">
        <title>Basket Demo</title>
        
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
session_start();

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Extract the data that was sent to the server
$search_string = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
$email_address = filter_input(INPUT_POST, 'email_address', FILTER_SANITIZE_STRING);

if ($email_address != $_SESSION['loggedInUserEmail'])
{
    echo '<h1>Please enter correct login details before continuing</h1>';
    return;
}

//Create a PHP array with our search criteria
$findCriteria = ['$text' => ['$search' => $search_string]];

//Find all of the customers that match  this criteria
$cursor = $db
    ->customers
    ->find($findCriteria);

//Output the results as forms
echo "<h1>Customers</h1>";
foreach ($cursor as $cust)
{
    echo '<form action="replace_customer.php" method="post">';
    echo 'Name: <input type="text" name="name" value="' . $cust['name'] . '" required><br>';
    echo 'Email: <input type="email" name="email" value="' . $cust['email'] . '" required><br>';
    echo 'Password: <input type="password" name="password" value="' . $cust['password'] . '" required><br>';
    echo '<input type="hidden" name="id" value="' . $cust['_id'] . '" required>';
    echo '<input type="submit" onclick="confirmation()">';
    echo '</form><br>';
}
?>
</body>
</html>
