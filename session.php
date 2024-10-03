<?php
if ($_SESSION["access"]=="admin"){
    exit;
}

else{
    header("location: request.php");
}

?>