<?php require "conn.php";
if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $query = "SELECT * from info where did='$did'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com/"></script>

    <title>Driving License ID</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body {
            /* Background image as watermark */
            background-image: url('arms2.png');
            /* Adjust the URL to your watermark image */
            background-repeat: repeat;
            background-color: #074173;
            /* Adjust opacity as needed */
            /* Adjust opacity only for the watermark */
            background-size: 200px 200px;
            /* Adjust size of watermark and spacing */
            background-position: 0px 60px;
            /* Adjust horizontal and vertical space */
            position: relative;
        }

        .blurred {
            padding: 30px;
            background-color: transparent;
            /* Transparent background */
            border-radius: 40px;
            /* Rounded corners */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            /* Box shadow for blur effect */
            backdrop-filter: blur(3px);
            /* Blurs the background */
        }
    </style>
</head>

<body>
    <div class=" h-full w-full min-h-screen bg-auto">
        <div class="min-h-full w-full px-36 h-screen">
            <div class="w-full flex flex-row items-center  text-3xl py-4 px-4 font-serif ">
                <div class="w-auto place-items-start" style="color:white;">
                    Republic of Iraq
                </div>
                <div class="w-auto py-4 px-4 place-items-start">
                    <img src="Coat_of_arms_of_Iraq.svg" alt="Logo" class="h-16 w-16 mr-2">
                </div>
            </div>
            <div class="container blurred">
                <!-- id part -->
                <div class="bg-gray-200 shadow-lg rounded-3xl w-12/12 h-full " style="padding: 20px;">
                    <div class="py-6 ">
        
                        <div class="w-full flex flex-row justify-between text-2xl py-4 px-6 rounded-3xl shadow-lg" style="background-color: #113f59;">
                            <div class="text-2xl"><a href='index.php' class=" text-white">Universal ID</a></div>
                            <div class="flex flex-row space-x-4">
                                <a href='nationalID.php?nid=<?php echo $row["nid"]; ?>' class=" text-white">National ID</a>
                                <a href='HealthID.php?hid=<?php echo $row["hid"]; ?>' class=" text-white">Health ID</a>
                                <a href='DrivingID.php?did=<?php echo $row["did"]; ?>' class=" text-white">Driving License ID</a>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row ">
                            <div class="col-2 col-md-2 d-flex justify-content-center align-items-center rounded-3xl " style="background-color:#113f59;">
                                <div class="text-center">
                                    <img class="w-40 h-40 " src="images/<?php echo $row["image_name"]; ?>" alt="Person Photo">
                                    <!-- Card ID paragraph -->
                                    <p class="text" style="color:white;"><?php echo $row["nid"]; ?></p>
                                </div>
                            </div>
                            <div class="col-7 cold-md-7">
                                <div class="bg-gray-200 p-4 mx-4 my-8 rounded-md flex">
                                    <!-- Content on the left -->
                                    <div class="flex-1">
                                        <p class="text-xl mb-2">Full Name: <?php echo $row["full_name"]; ?></p>
                                        <p class="text-xl mb-2">Address: <?php echo $row["address"]; ?></p>
                                        <p class="text-xl mb-2">DOB: <?php echo $row["dob"]; ?></p>
                                        <p class="text-xl mb-2">Age: <?php echo $row["age"]; ?></p>
                                        <p class="text-xl mb-2">Type: <?php echo $row["li_type"]; ?></p>
                                        <p class="text-xl mb-2">Phone number: <?php echo $row["phone"]; ?></p>
                                        <p class="text-xl mb-2">Issue Date: <?php echo $row["driving_iss"]; ?></p>
                                        <p class="text-xl mb-2">Expire Date: <?php echo $row["driving_exp"]; ?></p>



                                    </div>

                                    <!-- Photo on the right top corner -->
                                </div>
                            </div>
                            <div class="col-3 cold-md-3 d-flex justify-content-center align-items-center rounded-3xl" style="background-color:#1f72a2;">
                                <!-- Information on the right -->

                                <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo "http://localhost/advanced/advanced/advanced/DrivingID.php?nid=" . $row['nid'] ?>&amp;size=300x300" class="qr-code img-thumbnail img-responsive" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>