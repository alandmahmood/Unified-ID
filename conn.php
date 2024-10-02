<?php
$conn = mysqli_connect("localhost","admin","RootPass","universal_id");

if (!$conn){
    die("connection failed".mysqli_connect_error());
}
?>