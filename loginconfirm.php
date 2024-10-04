<?php
session_start(); 
// Make sure no output is sent before headers
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    $correctUsername = "admin";
    $correctPassword = "UniIDadmin";

    if ($username === $correctUsername && $password === $correctPassword) {
        $_SESSION["access"] = "admin";
        header("Location: index.php");
        exit(); // Stop the script after the redirect
    } else {
        $_SESSION["access"] = "user";
        header("Location: request.php");
        exit(); // Stop the script after the redirect
    }
}
?>
