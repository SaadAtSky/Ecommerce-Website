<?php
    //Start session management
    session_start();

    //Remove all session variables
    session_unset(); 

    //Destroy the session 
    session_destroy(); 

    //Direct user to Login page
    header('location: indexCMS.html');
?>
    
    