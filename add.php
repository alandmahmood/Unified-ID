<?php require "conn.php" ?>
<?php
    if(isset($_POST["add"])){
        $firstname=$_POST["first_name"];
        $lastname=$_POST["last_name"];
        $phone=$_POST["phone_number"];
        $gender=$_POST["gender"];
        $dob=$_POST["date_of_birth"];
        $city=$_POST["city"];
        $address=$_POST["address"];
        $blood=$_POST["blood_type"];
        $license_type=$_POST["license_type"];
        $issdate=$_POST["issue_date"];
        $hissdate=$_POST["issue_date_health"];
        $dissdate=$_POST["issue_date_license"];
        
        $randomNum=rand(10,99);
        $nid="N".strtoupper(substr($firstname, 0, 1)).strtoupper(substr($lastname, 0, 1)).date('Y', strtotime($dob)).date('Y', strtotime($issdate)).$randomNum;
        $hid="H".strtoupper(substr($firstname, 0, 1)).strtoupper(substr($lastname, 0, 1)).date('Y', strtotime($dob)).date('Y', strtotime($hissdate)).$randomNum;
        $did="D".strtoupper(substr($firstname, 0, 1)).strtoupper(substr($lastname, 0, 1)).date('Y', strtotime($dob)).date('Y', strtotime($dissdate)).$randomNum;
        $aid="A".strtoupper(substr($firstname, 0, 1)).strtoupper(substr($lastname, 0, 1)).date('Y', strtotime($dob)).date('Y');
        
        $filename = $_FILES["file"]['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $generatedFileName = basename($_FILES["file"]["name"]);
   
        $destination = 'images/' . $generatedFileName;
        $file = $_FILES['file']['tmp_name'];
        
        $checkSql = "SELECT 1 FROM national_id WHERE nid = '$nid' LIMIT 1";
        $result = mysqli_query($conn, $checkSql);

        if (mysqli_num_rows($result) > 0) {
            echo "dup";}


        $sql= "INSERT INTO national_id(nid, fname,lname,phone,gender,nissue_date,dob, image_name) VALUES
          ('$nid','$firstname','$lastname', '$phone', '$gender', '$issdate', '$dob', '$generatedFileName');
          INSERT INTO health_id(hid, hissue_date, blood_type) VALUES ('$hid','$hissdate', '$blood');
          INSERT INTO driving_license(did, dissue_date, li_type) VALUES ('$did','$dissdate','$license_type');
          INSERT INTO addresses(aid, cid, `address`) VALUES ('$aid', '$city', '$address');
          INSERT INTO relation VALUES ('$nid','$hid','$did','$aid');";
    
        if (move_uploaded_file($file, $destination)){
        
            if (mysqli_multi_query($conn, $sql)) {
                echo "Data inserted successfully!";
            } else {
                echo "Error inserting data: " . mysqli_error($conn);
            }
            
    }}

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add citizen</title>
  <script src="https://cdn.tailwindcss.com/"></script>
</head>
<body>
    <!-- Navbar -->
<?php include 'nav.php'; ?>
<div class="max-w-5xl mx-auto">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="" method="post" enctype="multipart/form-data">
        <!-- national id -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-4 text-gray-900 ">National ID</h2>
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="firstName">First Name</label>
                    <input name="first_name" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="firstName" type="text" placeholder="First Name" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="lastName">Last Name</label>
                    <input name="last_name" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="lastName" type="text" placeholder="Last Name" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phoneNumber">Phone Number</label>
                    <input name="phone_number" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phoneNumber" type="tel" placeholder="Phone Number" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">Gender</label>
                    <select name="gender" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="gender">
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="dob">Date of Birth</label>
                    <input name="date_of_birth" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="dob" type="date" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Image</label>
                    <input name="file" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" type="file" required>
                </div>
                <div class="col-span-2 mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="city">City</label>
                    <select name="city" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="city">
                        <option value="" disabled selected>Select City</option>
                        <option value="1">Slemani</option>
                        <option value="2">Hawler</option>
                        <option value="3">Duhok</option>
                    </select>
                </div>
                <div class="col-span-2 mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="address">Address</label>
                    <input name="address" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="address" type="text" placeholder="Address" required>
                </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="issueDate">Issue Date</label>
                    <input name="issue_date" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="issueDate" type="date" required value="<?php echo date('Y-m-d');?>">
                </div>
        </div>


        <!-- Health ID -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-4">Health ID</h2>
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="bloodType">Blood Type</label>
                    <input name="blood_type" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="bloodType" type="text" placeholder="Blood Type" required>
                </div>
            </div>
            <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="issueDateHealth">Issue Date</label>
                    <input name="issue_date_health" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="issueDateHealth" type="date" required value="<?php echo date('Y-m-d');?>">
                </div>
        </div>

        <!-- License Information -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-4">License Information</h2>
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="licenseType">License Type</label>
                    <input name="license_type" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="licenseType" type="text" placeholder="License Type" required>
                </div>
            </div>
            <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="issueDateLicense">Issue Date</label>
                    <input name="issue_date_license" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="issueDateLicense" type="date" required value="<?php echo date('Y-m-d');?>">
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
    <!-- Foooter -->
    <?php include 'footer.php'; ?>





   
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
