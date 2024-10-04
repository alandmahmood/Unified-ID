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