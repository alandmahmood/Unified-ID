<?php require "conn.php"; ?>

<?php
    // Get parameters from the form
    $firstname = mysqli_real_escape_string($conn, $_GET["first_name"]);
    $lastname = mysqli_real_escape_string($conn, $_GET["last_name"]);
    $phone = mysqli_real_escape_string($conn, $_GET["phone_number"]);
    $gender = mysqli_real_escape_string($conn, $_GET["gender"]);
    $dob = mysqli_real_escape_string($conn, $_GET["date_of_birth"]);
    $city = mysqli_real_escape_string($conn, $_GET["city"]);
    $address = mysqli_real_escape_string($conn, $_GET["address"]);
    $blood = mysqli_real_escape_string($conn, $_GET["blood_type"]);
    $license_type = mysqli_real_escape_string($conn, $_GET["license_type"]);
    $issdate = mysqli_real_escape_string($conn, $_GET["issue_date"]);
    $hissdate = mysqli_real_escape_string($conn, $_GET["issue_date_health"]);
    $dissdate = mysqli_real_escape_string($conn, $_GET["issue_date_license"]);

    // Generate unique IDs
    $nid = "N" . strtoupper(substr($firstname, 0, 1)) . strtoupper(substr($lastname, 0, 1)) . date('Y', strtotime($dob)) . date('Y', strtotime($issdate));
    $hid = "H" . strtoupper(substr($firstname, 0, 1)) . strtoupper(substr($lastname, 0, 1)) . date('Y', strtotime($dob)) . date('Y', strtotime($hissdate));
    $did = "D" . strtoupper(substr($firstname, 0, 1)) . strtoupper(substr($lastname, 0, 1)) . date('Y', strtotime($dob)) . date('Y', strtotime($dissdate));
    $aid = "A" . strtoupper(substr($firstname, 0, 1)) . strtoupper(substr($lastname, 0, 1)) . date('Y', strtotime($dob)) . date('Y');

    // Check if a file was uploaded
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $filename = $_FILES["file"]['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        // Allowed file types (add more extensions if needed)
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array(strtolower($extension), $allowed_types)) {
            // Generate a unique name for the file
            $generatedFileName = uniqid() . '.' . $extension;
            $destination = 'images/' . $generatedFileName;
            $file = $_FILES['file']['tmp_name'];

            // Move the file to the destination
            if (move_uploaded_file($file, $destination)) {
                // Insert data into the database
                $sql = "
                    INSERT INTO national_id(nid, fname, lname, phone, gender, nissue_date, dob, image_name) 
                    VALUES ('$nid', '$firstname', '$lastname', '$phone', '$gender', '$issdate', '$dob', '$generatedFileName');
                    
                    INSERT INTO health_id(hid, hissue_date, blood_type) 
                    VALUES ('$hid', '$hissdate', '$blood');
                    
                    INSERT INTO driving_license(did, dissue_date, li_type) 
                    VALUES ('$did', '$dissdate', '$license_type');
                    
                    INSERT INTO addresses(aid, cid, `address`) 
                    VALUES ('$aid', '$city', '$address');
                    
                    INSERT INTO relation(nid, hid, did, aid) 
                    VALUES ('$nid', '$hid', '$did', '$aid');
                ";

                // Execute the query and check for errors
                if (mysqli_multi_query($conn, $sql)) {
                    sleep(1);  // Optional: slight delay for processing
                    header("Location: index.php");
                    exit();  // Ensure the script ends after the redirect
                } else {
                    echo "Error: " . mysqli_error($conn);  // Output SQL error for debugging
                }
            } else {
                echo "File upload failed.";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    } else {
        echo "No file uploaded or there was an upload error.";
    }
?>
