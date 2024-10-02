<?php 
require "conn.php";
if (isset($_GET["nid"])) {
    $nid = $_GET["nid"];
    $query = "SELECT * FROM info WHERE nid='$nid'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com/"></script>
    

    
    <style>
        /* Default Dark Theme Variables */
        :root {
            --bg-color: #074173;
            --navbar-bg-color: #113f59;
            --text-color: #ffffff;
            --card-bg-color: #113f59;
            --btn-outline-dark-border: #ffffff;
            --btn-outline-dark-text: #ffffff;
            --btn-outline-dark-hover-bg: #ffffff;
            --btn-outline-dark-hover-text: #074173;
        }

        /* Light Theme Variables */
        .light-mode {
            --bg-color: #ffffff;
            --navbar-bg-color: #f8f9fa;
            --text-color: #000000;
            --card-bg-color: #f0f0f0;
            --btn-outline-dark-border: #000000;
            --btn-outline-dark-text: #000000;
            --btn-outline-dark-hover-bg: #000000;
            --btn-outline-dark-hover-text: #ffffff;
        }

        /* Apply Variables */
        body {
            background-image: url('arms2.png');
            background-repeat: repeat;
            background-color: var(--bg-color);
            background-size: 200px 200px;
            background-position: 0px 60px;
            position: relative;
            backdrop-filter: blur(3px);
            color: var(--text-color);
            transition: background-color 0.5s, color 0.5s;
        }
        .parent {
            min-height: 100vh;
        }

        /* Card Styling */
        .card-custom {
            background-color: var(--card-bg-color) !important;
            color: var(--text-color);
            transition: background-color 0.5s, color 0.5s;
        }

        /* Button Styling */
        .btn-outline-dark {
            border-color: var(--btn-outline-dark-border) !important;
            color: var(--btn-outline-dark-text) !important;
            transition: background-color 0.5s, color 0.5s;
        }

        .btn-outline-dark:hover {
            background-color: var(--btn-outline-dark-hover-bg) !important;
            color: var(--btn-outline-dark-hover-text) !important;
        }

        /* Theme Toggle Button Styling */
        #theme-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            background: none;
            border: none;
            cursor: pointer;
            transition: color 0.5s;
        }

        #theme-toggle:focus {
            outline: none;
        }

        /* Adjust icon sizes */
        #theme-toggle i {
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
            <!-- Navbar -->
        <?php include 'nav.php'; ?>



    <!-- Main Content -->
    <div class="container parent d-flex justify-content-center align-items-center h-100 rounded-3xl">
        <div class="container bg-gray-200 shadow-lg rounded-3xl w-100 w-md-75 w-lg-50">
            <div class="row">
                <div class="col-md-8 d-flex justify-content-center align-items-center rounded-3xl" style="background-color:#113f59;">
                    <div class="">
                        <p class="text-xl text-white mb-2">Welcome to the Universal ID system!</p>
                        <p class="text-lg text-white mb-2">You can either fill out your information manually, or submit a scan</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg-gray-200 p-4 mx-4 my-2 rounded-md flex flex-column">
                        <div class="flex-1">
                            <a href="addman.php" class="btn btn-outline-primary mb-2" role="button" aria-pressed="true">Manual Entry</a>
                            <a href="" class="btn btn-outline-primary  mb-2" role="button" aria-pressed="true">Submit a Scan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Foooter -->
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
