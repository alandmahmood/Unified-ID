<?php require "conn.php"; ?>

<?php
    // Get form parameters using POST
    $firstname = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $lastname = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone_number"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $dob = mysqli_real_escape_string($conn, $_POST["date_of_birth"]);
    $city = mysqli_real_escape_string($conn, $_POST["city"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $blood = mysqli_real_escape_string($conn, $_POST["blood_type"]);
    $license_type = mysqli_real_escape_string($conn, $_POST["license_type"]);
    $issdate = mysqli_real_escape_string($conn, $_POST["issue_date"]);
    $hissdate = mysqli_real_escape_string($conn, $_POST["issue_date_health"]);
    $dissdate = mysqli_real_escape_string($conn, $_POST["issue_date_license"]);

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
