<?php

require "conn.php";
          if(isset($_GET["nid"])){
            
                $nid = $_GET["nid"];
                $query = "SELECT * from info where nid='$nid'";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                $row = mysqli_fetch_assoc($result);
                $hid = $row["hid"];
                $did = $row["did"];
                $aid = $row["aid"];
            

            $nid=$row["nid"];
            $hid=$row["hid"];
            $did=$row["did"];
            $aid=$row["aid"];
            $sql="DELETE FROM national_id WHERE nid=$nid;
            DELETE FROM health_id WHERE hid=$hid;
            DELETE FROM driving_license WHERE did=$did;
            DELETE FROM addresses WHERE aid=$aid;
            DELETE FROM relation WHERE nid=$nid;";
            if(mysqli_multi_query($conn, $sql)){
              header("location: index.php");
            }
          
            else{
              echo mysqli_error($conn);
            }
          }
          ?>