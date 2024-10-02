
<?php require "conn.php" ?>
<?php
        $firstname=$_GET["first_name"];
        $lastname=$_GET["last_name"];
        $phone=$_GET["phone_number"];
        $gender=$_GET["gender"];
        $dob=$_GET["date_of_birth"];
        $city=$_GET["city"];
        $address=$_GET["address"];
        $blood=$_GET["blood_type"];
        $license_type=$_GET["license_type"];
        $issdate=$_GET["issue_date"];
        $hissdate=$_GET["issue_date_health"];
        $dissdate=$_GET["issue_date_license"];
        
        $nid="N".strtoupper(substr($firstname, 0, 1)).strtoupper(substr($lastname, 0, 1)).date('Y', strtotime($dob)).date('Y', strtotime($issdate));
        $hid="H".strtoupper(substr($firstname, 0, 1)).strtoupper(substr($lastname, 0, 1)).date('Y', strtotime($dob)).date('Y', strtotime($hissdate));
        $did="D".strtoupper(substr($firstname, 0, 1)).strtoupper(substr($lastname, 0, 1)).date('Y', strtotime($dob)).date('Y', strtotime($dissdate));
        $aid="A".strtoupper(substr($firstname, 0, 1)).strtoupper(substr($lastname, 0, 1)).date('Y', strtotime($dob)).date('Y');
        

        $sql= "INSERT INTO national_id(nid, fname,lname,phone,gender,nissue_date,dob, image_name) VALUES
          ('$nid','$firstname','$lastname', '$phone', '$gender', '$issdate', '$dob', 'noimage');
          INSERT INTO health_id(hid, hissue_date, blood_type) VALUES ('$hid','$hissdate', '$blood');
          INSERT INTO driving_license(did, dissue_date, li_type) VALUES ('$did','$dissdate','$license_type');
          INSERT INTO addresses(aid, cid, `address`) VALUES ('$aid', '$city', '$address');
          INSERT INTO relation(nid,hid,did,aid) VALUES ('$nid','$hid','$did','$aid');";
            
        
        
        if (mysqli_multi_query($conn,$sql)){
            sleep(1);
            header("location: index.php");
        }
        else {
            echo mysqli_error($conn);
        }
    
?>