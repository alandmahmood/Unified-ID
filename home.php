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
    <title>Home</title>
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
            backdrop-filter: blur(3px);
        }

        .parent {
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <div class="container parent d-flex justify-content-center align-items-center h-100 rounded-3xl">
        <div class="container bg-gray-200 shadow-lg rounded-3xl w-12/40 h-full " >
            <div class="row">
                <div class="col-8 d-flex justify-content-center align-items-center rounded-3xl " style="background-color:#113f59;">
                    <div class="">
                        <p class="text-xl text-white mb-2">Welcome to the Universal ID system!</p><br>
                        <p class="text-lg text-white mb-2">You can either fill out your information manually, or submit a scan</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="bg-gray-200 p-4 mx-4 my-8 rounded-md flex">
                        <div class="flex-1" >
                            <a href="addman.php" class="btn btn-outline-primary" role="button" aria-pressed="true">Manual Entry</a>
                            <a href="" class="btn btn-outline-dark" role="button" aria-pressed="true">Submit a Scan</a>
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