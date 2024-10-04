
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

echo "NID: $nid <br> HID: $hid <br> DID: $did <br> AID: $aid <br>"; // This will display the generated IDs for verification

// Prepare SQL queries
$sql1 = "INSERT INTO national_id(nid, fname, lname, phone, gender, nissue_date, dob, image_name) 
         VALUES ('$nid','$firstname','$lastname', '$phone', '$gender', '$issdate', '$dob', 'noimage');";
echo $sql1; // Debugging: Display query

$sql2 = "INSERT INTO health_id(hid, hissue_date, blood_type) 
         VALUES ('$hid', '$hissdate', '$blood');";
echo $sql2; // Debugging: Display query

$sql3 = "INSERT INTO driving_license(did, dissue_date, li_type) 
         VALUES ('$did', '$dissdate', '$license_type');";
echo $sql3; // Debugging: Display query

$sql4 = "INSERT INTO addresses(aid, cid, `address`) 
         VALUES ('$aid', '$city', '$address');";
echo $sql4; // Debugging: Display query

$sql5 = "INSERT INTO relation(nid, hid, did, aid) 
         VALUES ('$nid', '$hid', '$did', '$aid');";
echo $sql5; // Debugging: Display query

// Execute each query one by one and check for errors
if (mysqli_query($conn, $sql1)) {
    echo "national_id inserted <br>";
    if (mysqli_query($conn, $sql2)) {
        echo "health_id inserted <br>";
        if (mysqli_query($conn, $sql3)) {
            echo "driving_license inserted <br>";
            if (mysqli_query($conn, $sql4)) {
                echo "addresses inserted <br>";
                if (mysqli_query($conn, $sql5)) {
                    echo "relation inserted <br>";
                    // Redirect based on user access
                    if ($_SESSION["access"] == "admin") {
                        header("Location: index.php");
                        exit(); // Ensure script stops here
                    } else {
                        header("Location: NationalID.php?nid=$nid");
                        exit(); // Ensure script stops here
                    }
                } else {
                    echo "Error inserting into relation: " . mysqli_error($conn);
                }
            } else {
                echo "Error inserting into addresses: " . mysqli_error($conn);
            }
        } else {
            echo "Error inserting into driving_license: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting into health_id: " . mysqli_error($conn);
    }
} else {
    echo "Error inserting into national_id: " . mysqli_error($conn);
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