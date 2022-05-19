<?php
//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Extract the data that was sent to the server
$search_string = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);

//Create a PHP array with our search criteria
$findCriteria = [
    'customer_email' => $search_string
 ];

//Find all of the orders that match  this criteria
$cursor = $db->orders->find($findCriteria);

//Output the results as forms
foreach ($cursor as $ord){
    echo '<form action="save_order.php" method="post">';
    echo '<div class="form-group">
            <div class="col-md-7">
                <input type="hidden" name="_id" value="' . $ord['_id'] . '" required> 
            </div>';
     echo '<div class="form-group">
            <label class="col-md-4 control-label">Customer Email:</label>
            <div class="col-md-7">
                <input type="text" name="customer_id" value="' . $ord['customer_email'] . '" required>
            </div>';
     echo '<div class="form-group">
            <label class="col-md-4 control-label">Products</label>
            <div class="col-md-7">
                <input type="text" name="shipping_address" value="' . $ord['products'] . '" required>
            </div>';

    echo '<input type="submit">';
    echo '</form><br>';
}
?>

 