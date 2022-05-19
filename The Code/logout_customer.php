<?php
    //Start session management
    session_start();

    //Remove all session variables
    session_unset(); 

    //Destroy the session 
    session_destroy(); 

    //Direct user to login page
    header('location: login_customer.php');
?>
    
    