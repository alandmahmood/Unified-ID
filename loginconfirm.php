<?php
// Check if the login form has been submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded credentials
    $correctUsername = "admin11111";
    $correctPassword = "admin11111";

    session_start();
    // Check if the entered credentials are correct
    if ($username == $correctUsername && $password == $correctPassword) {
        // Successful login
        
        $_SESSION["access"]="admin";
        header("location: request.php");
    } else {
        // Incorrect login
        
        
        $_SESSION["access"]="user";
        header("location: request.php");
    }
}
?>