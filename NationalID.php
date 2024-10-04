<?php require "conn.php";
if (isset($_GET["nid"])) {
    $nid = $_GET["nid"];
    $query = "SELECT * from info where nid='$nid'";
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
    <title>National ID</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" 
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
          crossorigin="anonymous">
    <style>
        body {
            background-image: url('arms2.png');
            background-repeat: repeat;
            background-color: #074173;
            background-size: 200px 200px;
            background-position: 0px 60px;
            position: relative;
        }

        .blurred {
            padding: 30px;
            background-color: transparent;
            border-radius: 40px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(3px);
        }
    </style>
</head>

<!-- Navbar -->
<?php include 'nav.php'; ?>

<body class="flex flex-col min-h-screen">
    <!-- Main Content -->
    <div class="flex-grow w-full px-4 md:px-36">
        <div class="w-full flex flex-row items-center text-3xl py-4 px-4 font-serif">
            <div class="w-auto place-items-start text-gray-900">
                Republic of Iraq
            </div>
            <div class="w-auto py-4 px-4 place-items-start">
                <img src="Coat_of_arms_of_Iraq.svg" alt="Logo" class="h-16 w-16 mr-2">
            </div>
        </div>
        <div class="container blurred">
            <div class="bg-gray-200 shadow-lg rounded-3xl w-full" style="padding: 20px;">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-4 d-flex justify-content-center align-items-center rounded-3xl" 
                             style="background-color:#113f59;">
                            <div class="text-center">
                                <img class="w-40 h-40 text-gray-200" src="images/<?php echo $row["image_name"]; ?>" 
                                     alt="Person Photo">
                                <p class="text" style="color:white;"><?php echo $row["nid"]; ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="bg-gray-200 p-4 mx-4 my-4 rounded-md flex text-black">
                                <div class="flex-1">
                                    <p class="text-xl mb-2 md:text-lg" style="font-size: 1rem;">Full Name: <?php echo $row["full_name"]; ?></p>
                                    <p class="text-xl mb-2 md:text-lg" style="font-size: 1rem;">Address: <?php echo $row["address"]; ?></p>
                                    <p class="text-xl mb-2 md:text-lg" style="font-size: 1rem;">Phone number: <?php echo $row["phone"]; ?></p>
                                    <p class="text-xl mb-2 md:text-lg" style="font-size: 1rem;">Gender: <?php echo $row["gender"]; ?></p>
                                    <p class="text-xl mb-2 md:text-lg" style="font-size: 1rem;">DOB: <?php echo $row["dob"]; ?></p>
                                    <p class="text-xl mb-2 md:text-lg" style="font-size: 1rem;">Age: <?php echo $row["age"]; ?></p>
                                    <p class="text-xl mb-2 md:text-lg" style="font-size: 1rem;">Issue Date: <?php echo $row["national_iss"]; ?></p>
                                    <p class="text-xl mb-2 md:text-lg" style="font-size: 1rem;">Expire Date: <?php echo $row["national_exp"]; ?></p>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 d-flex justify-content-center align-items-center rounded-3xl" 
                             style="background-color:#1f72a2;">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo "http://u-id.online/NationalID.php?nid=" . $row['nid'] ?>&amp;size=600x300" 
                                 class="qr-code img-thumbnail img-responsive" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!-- Footer Inclusion -->
    <?php include 'footer.php'; ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" 
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" 
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" 
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
            crossorigin="anonymous"></script>
</body>

</html>
