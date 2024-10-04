
<?php require "conn.php" ?>
<?php

$firstname = $_POST["first_name"];
$lastname = $_POST["last_name"];
$phone = $_POST["phone_number"];
$gender = $_POST["gender"];
$dob = $_POST["date_of_birth"];
$city = $_POST["city"];
$address = $_POST["address"];
$blood = $_POST["blood_type"];
$license_type = $_POST["license_type"];
$issdate = $_POST["issue_date"];
$hissdate = $_POST["issue_date_health"];
$dissdate = $_POST["issue_date_license"];

$randNum = rand(100, 999);
$nid = "N" . strtoupper(substr($firstname, 0, 1)) . strtoupper(substr($lastname, 0, 1)) . date('Y', strtotime($dob)) . date('Y', strtotime($issdate)) . $randNum;
$hid = "H" . strtoupper(substr($firstname, 0, 1)) . strtoupper(substr($lastname, 0, 1)) . date('Y', strtotime($dob)) . date('Y', strtotime($hissdate)) . $randNum;
$did = "D" . strtoupper(substr($firstname, 0, 1)) . strtoupper(substr($lastname, 0, 1)) . date('Y', strtotime($dob)) . date('Y', strtotime($dissdate)) . $randNum;
$aid = "A" . strtoupper(substr($firstname, 0, 1)) . strtoupper(substr($lastname, 0, 1)) . date('Y', strtotime($dob)) . date('Y') . $randNum;

$sql1 = "INSERT INTO national_id(nid, fname, lname, phone, gender, nissue_date, dob, image_name) 
         VALUES ('$nid','$firstname','$lastname', '$phone', '$gender', '$issdate', '$dob', 'noimage');";

$sql2 = "INSERT INTO health_id(hid, hissue_date, blood_type) 
         VALUES ('$hid', '$hissdate', '$blood');";

$sql3 = "INSERT INTO driving_license(did, dissue_date, li_type) 
         VALUES ('$did', '$dissdate', '$license_type');";

$sql4 = "INSERT INTO addresses(aid, cid, `address`) 
         VALUES ('$aid', '$city', '$address');";

$sql5 = "INSERT INTO relation(nid, hid, did, aid) 
         VALUES ('$nid', '$hid', '$did', '$aid');";

// Execute each query
if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4)) {
    // If all inserts are successful, insert into the relation table
    if (mysqli_query($conn, $sql5)) {
        // Redirect based on user access
        if ($_SESSION["access"] == "admin") {
            header("Location: index.php");
        } else {
            header("Location: NationalID.php?nid=$nid");
        }
        exit(); // Stop further script execution
    } else {
        echo "Error inserting into relation table: " . mysqli_error($conn);
    }
} else {
    echo "Error inserting data: " . mysqli_error($conn);
}

// $sql = "INSERT INTO national_id(nid, fname,lname,phone,gender,nissue_date,dob, image_name) VALUES
//           ('$nid','$firstname','$lastname', '$phone', '$gender', '$issdate', '$dob', 'noimage');
//           INSERT INTO health_id(hid, hissue_date, blood_type) VALUES ('$hid','$hissdate', '$blood');
//           INSERT INTO driving_license(did, dissue_date, li_type) VALUES ('$did','$dissdate','$license_type');
//           INSERT INTO addresses(aid, cid, `address`) VALUES ('$aid', '$city', '$address');";

// $sql2 = "INSERT INTO relation(nid,hid,did,aid) VALUES ('$nid','$hid','$did','$aid');";



// if (mysqli_multi_query($conn, $sql)) {
//   mysqli_query($conn, $sql2);
//   sleep(1);
//   if ($_SESSION["access"] == "admin") {
//     header("location: index.php");
//   } else {
//     header("location: NationalID.php?nid=$nid");
//   }
// } else {
//   echo mysqli_error($conn);
// }


?>