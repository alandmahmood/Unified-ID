<?php

require "conn.php";
          if(isset($_GET["nid"])){
            if (isset($_GET["nid"])) {
                $nid = $_GET["nid"];
                $query = "SELECT * from info where nid='$nid'";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                $row = mysqli_fetch_assoc($result);
            }

            $nid=$row["nid"];
            $hid=$row["hid"];
            $did=$row["did"];
            $aid=$row["aid"];
            $sql="DELETE FROM national_id WHERE id=$nid;
            DELETE FROM national_id WHERE id=$hid;
            DELETE FROM health_id WHERE id=$did;
            DELETE FROM addresses WHERE id=$aid;
            DELETE FROM relation WHERE id=$nid;";
            if(mysqli_multi_query($conn, $sql)){
              header("location: index.php");
            }
          
            else{
              echo mysqli_error($conn);
            }
          }
          ?>