<?php
require "conn.php";
          
            $sql="TRUNCATE TABLE national_id;
            TRUNCATE TABLE health_id;
            TRUNCATE TABLE driving_license;
            TRUNCATE TABLE addresses;
            TRUNCATE TABLE relations;
            ";
            if(mysqli_multi_query($conn, $sql)){
              header("location: index.php");
            }
          
            else{
              echo mysqli_error($conn);
            }
          
          ?>