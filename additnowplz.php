
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


$sql = "INSERT INTO national_id(nid, fname,lname,phone,gender,nissue_date,dob, image_name) VALUES
          ('$nid','$firstname','$lastname', '$phone', '$gender', '$issdate', '$dob', 'noimage');
          INSERT INTO health_id(hid, hissue_date, blood_type) VALUES ('$hid','$hissdate', '$blood');
          INSERT INTO driving_license(did, dissue_date, li_type) VALUES ('$did','$dissdate','$license_type');
          INSERT INTO addresses(aid, cid, `address`) VALUES ('$aid', '$city', '$address');
          INSERT INTO relation(nid,hid,did,aid) VALUES ('$nid','$hid','$did','$aid');";

if (mysqli_multi_query($conn, $sql)) {
  sleep(1);
  if ($_SESSION["access"] == "admin") {
    header("location: index.php");
  } else {
    header("location: NationalID.php?nid=$nid");
  }
} else {
  echo mysqli_error($conn);
}


?>