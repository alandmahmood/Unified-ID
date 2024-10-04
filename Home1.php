<?php 
require "conn.php";
session_start(); 
if (isset($_GET["nid"])) {
    $nid = mysqli_real_escape_string($conn, $_GET["nid"]); // Improved security
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
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
          integrity="sha512-iBBXm8fW90+nuLcSKVB/OKR6JVvTTzE+E5C0wCkH/k7LaL1pV9aVj6szr0ODUhb8gF6Vc2y1PZB5Xy+Lk+8g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        /* Default Dark Theme Variables */
        :root {
        --bg-color: #ffffff;
        --navbar-bg-color: #113f59;
        --text-color: #ffffff;
        --card-bg-color: #f0f0f0;
        --btn-outline-dark-border: #000000;
        --btn-outline-dark-text: #000000;
        --btn-outline-dark-hover-bg: #000000;
        --btn-outline-dark-hover-text: #ffffff;
        }

        /* Light Theme Variables */
        .light-mode {
        --bg-color: #074173;
        --navbar-bg-color: #113f59;
        --text-color: #ffffff;
        --card-bg-color: #113f59;
        --btn-outline-dark-border: #ffffff;
        --btn-outline-dark-text: #ffffff;
        --btn-outline-dark-hover-bg: #ffffff;
        --btn-outline-dark-hover-text: #074173;

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

        @media (max-width: 768px) {
            .about-us {
                padding: 30px 0;
            }
        }
                .about-us {
            background-color: #6A9AB0; /* Custom background color */
            color: #ffffff; /* Text color */
            padding: 50px 0; /* Top and bottom padding */
            height: 550px;
        }

        .about-us h2 {
    font-size: 2.5rem;
    font-weight: bold;
}

/* Adjust for smaller screens */
@media (max-width: 768px) {
    .about-us h2 {
        font-size: 1.75rem; /* Smaller font for mobile */
    }
}

.about-us p {
    font-size: 1.5rem;
    line-height: 1.75;
}

/* Adjust for smaller screens */
@media (max-width: 768px) {
    .about-us p {
        font-size: 1.125rem; /* Smaller font for mobile */
        line-height: 1.5;    /* Tighter line spacing for mobile */
    }
}

    </style>
</head>

<body>
    <!-- Navbar -->
    <?php include 'nav.php'; ?>

     <!-- Carousel Section -->
    <div id="homeCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#homeCarousel" data-slide-to="1"></li>
            <li data-target="#homeCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="uid2.png" class="d-block w-100" alt="First Slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Welcome to Universal ID System</h5>
                    <p>Your trusted solution for identity management.</p>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="uid2.png" class="d-block w-100" alt="Second Slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Secure and Reliable</h5>
                    <p>Ensuring your data is safe with top-notch security.</p>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="uid2.png" class="d-block w-100" alt="Third Slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>User-Friendly Interface</h5>
                    <p>Easy to navigate and use for everyone.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#homeCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#homeCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- About Us Section -->
    <section class="about-us">
        <div class="container text-center">
            <h2 class="mb-4">About Us</h2>
            <p class="lead">Universal ID is a modern identity management project that introduces a unified digital ID system. This system integrates National ID, health ID, and driving license ID into a single platform. People can easily view and share their IDs online by using special barcodes, making it easier to verify their identities in different areas.</p>
            <p>With a user-friendly interface and robust features, our system caters to both personal and organizational needs, making identity management efficient and reliable.</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container parent d-flex justify-content-center align-items-center mt-4">
        <div class="bg-gray-200 shadow-lg rounded-3xl w-100 w-md-75 w-lg-50">
            <div class="row">
                <!-- Text Column -->
                <div class="col-md-8 d-flex justify-content-center align-items-center" style="background-color:#113f59; padding: 20px;">
                    <div class="text-center">
                        <p class="text-xl text-white mb-2">Request Your Digital ID</p>
                        <p class="text-lg text-white mb-0">Fill out your information manually, submit a scan, or request a demo ID.</p>
                    </div>
                </div>
                <!-- Button Column -->
                <div class="col-md-4">
                    <div class="bg-gray-200 p-4 rounded-md">
                        <a href="addman.php" class="btn btn-outline-primary w-100 mb-2" role="button" aria-pressed="true">Manual Entry</a>
                        <a href="scan.php" class="btn btn-outline-primary w-100 mb-2" role="button" aria-pressed="true">Submit a Scan</a>
                        <a href="request.php" class="btn btn-outline-primary w-100" role="button" aria-pressed="true">Request a Demo ID</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
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
    
            
    <!-- Theme Toggle Script -->


    <script>
        // JavaScript for Theme Toggle with Icons
        const toggleButton = document.getElementById('theme-toggle');
        const sunIcon = document.getElementById('theme-icon-sun');
        const moonIcon = document.getElementById('theme-icon-moon');
        const currentTheme = localStorage.getItem('theme');

        // Function to update icons based on theme
        function updateIcons(theme) {
            console.log("Updating icons to:", theme);
            if (theme === 'dark') {
                sunIcon.style.display = 'inline';
                moonIcon.style.display = 'none';
            } else {
                sunIcon.style.display = 'none';
                moonIcon.style.display = 'inline';
            }
        }
        // Apply saved theme on page load
        if (currentTheme === 'light') {
            document.body.classList.add('light-mode');
            updateIcons('light');
        } else {
            // Default to dark mode if no theme is set
            document.body.classList.remove('light-mode');
            updateIcons('dark');
        }
        // // Apply saved theme on page load
        // if (currentTheme === 'dark') {
        //     document.body.classList.add('dark-mode');
        //     updateIcons('dark');
        // } else {
        //     // Default to dark mode if no theme is set
        //     document.body.classList.remove('dark-mode');
        //     updateIcons('light');
        // }

        // Toggle theme on button click
        toggleButton.addEventListener('click', () => {
            document.body.classList.toggle('light-mode');
            let theme;
            if (document.body.classList.contains('light-mode')) {
                theme = 'light';
            } else {
                theme = 'dark';
            }
            console.log("Toggling to:", theme);
            localStorage.setItem('theme', theme);
            updateIcons(theme);
        });
    </script>
</body>
</html> 
