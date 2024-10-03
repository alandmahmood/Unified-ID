<?php require "conn.php"; ?>
<?php
    if(isset($_POST["add"])){
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
        
        $nid = "N" . strtoupper(substr($firstname, 0, 1)) . strtoupper(substr($lastname, 0, 1)) . date('Y', strtotime($dob)) . date('Y', strtotime($issdate));
        $hid = "H" . strtoupper(substr($firstname, 0, 1)) . strtoupper(substr($lastname, 0, 1)) . date('Y', strtotime($dob)) . date('Y', strtotime($hissdate));
        $did = "D" . strtoupper(substr($firstname, 0, 1)) . strtoupper(substr($lastname, 0, 1)) . date('Y', strtotime($dob)) . date('Y', strtotime($dissdate));
        $aid = "A" . strtoupper(substr($firstname, 0, 1)) . strtoupper(substr($lastname, 0, 1)) . date('Y', strtotime($dob)) . date('Y');
        
        $filename = $_FILES["file"]['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $generatedFileName = basename($_FILES["file"]["name"]);
   
        $destination = 'images/' . $generatedFileName;
        $file = $_FILES['file']['tmp_name'];
    
        $sql= "INSERT INTO national_id(nid, fname, lname, phone, gender, nissue_date, dob, image_name) VALUES
              ('$nid','$firstname','$lastname', '$phone', '$gender', '$issdate', '$dob', '$generatedFileName');
              INSERT INTO health_id(hid, hissue_date, blood_type) VALUES ('$hid','$hissdate', '$blood');
              INSERT INTO driving_license(did, dissue_date, li_type) VALUES ('$did','$dissdate','$license_type');
              INSERT INTO addresses(aid, cid, `address`) VALUES ('$aid', '$city', '$address');
              INSERT INTO relation VALUES ('$nid','$hid','$did','$aid');";
    
        if (move_uploaded_file($file, $destination)){
            if (mysqli_multi_query($conn, $sql)){
                sleep(5);
                header("location: NationalID.php?nid=$nid");
            }
            else {
                echo mysqli_error($conn);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Request ID</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com/"></script>

  <style>
    body {
        background-image: url('arms2.png');
        background-repeat: repeat;
        background-color: #074173;
        background-size: 200px 200px;
        background-position: 0px 60px;
        position: relative;
        backdrop-filter: blur(3px);
        min-height: 100vh;
    }
  </style>
</head>
<body>
    <!-- Navbar -->
    <?php include 'nav.php'; ?>
    <br>
    <div class="container mx-auto px-4 py-8">
    <!-- Title -->
    <h1 class="text-2xl md:text-4xl font-extrabold text-center text-gray-900 mb-4">
        Welcome to the Universal ID Request Form
    </h1>
    
    <!-- Description -->
    <h2 class="text-center text-gray-700 text-base md:text-2xl">
        This form will create a demo version of the ID. Please ensure to update and verify it later.
    </h2>
</div>

    <div class="max-w-5xl mx-auto p-4">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="addman.php" method="post" enctype="multipart/form-data">
            <!-- National ID Section -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-4 text-gray-900">Request ID</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- First Name -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="firstName">First Name</label>
                        <input name="first_name" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="firstName" type="text" placeholder="First Name" required>
                    </div>
                    <!-- Last Name -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="lastName">Last Name</label>
                        <input name="last_name" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="lastName" type="text" placeholder="Last Name" required>
                    </div>
                    <!-- Gender -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">Gender</label>
                        <select name="gender" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="gender" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <!-- Date of Birth -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="dob">Date of Birth</label>
                        <input name="date_of_birth" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="dob" type="date" required>
                    </div>
                    <!-- City -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="city">City</label>
                        <select name="city" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="city" required>
                            <option value="" disabled selected>Select City</option>
                            <option value="1">Slemani</option>
                            <option value="2">Hawler</option>
                            <option value="3">Duhok</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Health ID Section -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-4 text-gray-900"></h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Blood Type -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="bloodType">Blood Type</label>
                        <input name="blood_type" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="bloodType" type="text" placeholder="Blood Type" required>
                    </div>
                </div>
            </div>

            <!-- License Information Section -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-4 text-gray-900"></h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- License Type -->
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end">
                <button name="add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Add
                </button>
            </div>
        </form>
    </div>
    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- Tailwind JS (if needed for additional functionality) -->
</body>
</html>
