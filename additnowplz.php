<?php require "conn.php" ?>
<?php
$firstname = $_GET["first_name"];
$lastname = $_GET["last_name"];
$phone = $_GET["phone_number"];
$gender = $_GET["gender"];
$dob = $_GET["date_of_birth"];
$city = $_GET["city"];
$address = $_GET["address"];
$blood = $_GET["blood_type"];
$license_type = $_GET["license_type"];
$issdate = $_GET["issue_date"];
$hissdate = $_GET["issue_date_health"];
$dissdate = $_GET["issue_date_license"];

$nid = "N" . strtoupper(substr($firstname, 0, 1)) . strtoupper(substr($lastname, 0, 1)) . date('Y', strtotime($dob)) . date('Y', strtotime($issdate));
$hid = "H" . strtoupper(substr($firstname, 0, 1)) . strtoupper(substr($lastname, 0, 1)) . date('Y', strtotime($dob)) . date('Y', strtotime($hissdate));
$did = "D" . strtoupper(substr($firstname, 0, 1)) . strtoupper(substr($lastname, 0, 1)) . date('Y', strtotime($dob)) . date('Y', strtotime($dissdate));
$aid = "A" . strtoupper(substr($firstname, 0, 1)) . strtoupper(substr($lastname, 0, 1)) . date('Y', strtotime($dob)) . date('Y');

// $filename = $_FILES["file"]['name'];
// $extension = pathinfo($filename, PATHINFO_EXTENSION);
$generatedFileName = "no image";
// basename($_FILES["file"]["name"]);

// $destination = 'images/' . $generatedFileName;
// $file = $_FILES['file']['tmp_name'];


$sql = "INSERT INTO national_id(nid, fname,lname,phone,gender,nissue_date,dob, image_name) VALUES
          ('$nid','$firstname','$lastname', '$phone', '$gender', '$issdate', '$dob', '$generatedFileName');
          INSERT INTO health_id(hid, hissue_date, blood_type) VALUES ('$hid','$hissdate', '$blood');
          INSERT INTO driving_license(did, dissue_date, li_type) VALUES ('$did','$dissdate','$license_type');
          INSERT INTO addresses(aid, cid, `address`) VALUES ('$aid', '$city', '$address');
          ";
$sql2 = "INSERT INTO relation VALUES ('$nid','$hid','$did','$aid');";
mysqli_query($conn, $sql2);

// if (move_uploaded_file($file, $destination)){

if (mysqli_multi_query($conn, $sql)) {
    echo "success";
    header("location: index.php");
} else {
    echo mysqli_error($conn);
}
// }
// else echo "fucking kill me now";
?>