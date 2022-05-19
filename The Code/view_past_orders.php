<?php
   //Connect to MongoDB and select database
   require __DIR__ . '/vendor/autoload.php';
   $mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Extract the data that was sent to the server
$search_string = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);

//Create a PHP array with our search criteria
$findCriteria = [
    'customer_email' => $search_string
 ];

//Find all of the orders that match this criteria
$cursor = $db->orders->find($findCriteria);

//Output the results as forms
echo "<h1>Past Orders</h1>";   
foreach ($cursor as $ord){
    echo '<input type="hidden" name="_id" value="' . $ord['_id'] . '" required>'; 
    echo 'Customer Email: <input type="text" name="firstname" value="' . $ord['customer_email'] . '" required><br>';
    echo 'Products: <input type="text" name="lastname" value="' . $ord['products'] . '" required><br>';

}
?>