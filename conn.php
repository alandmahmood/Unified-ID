<?php
$conn = mysqli_connect("localhost","root","","universal_id");

if (!$conn){
    die("connection failed".mysqli_connect_error());
}
?>