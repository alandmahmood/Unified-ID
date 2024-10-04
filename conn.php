<?php
$conn = mysqli_connect("localhost","UnifiedID","UnifiedID123pass","universal_id");

if (!$conn){
    die("connection failed".mysqli_connect_error());
}
?>