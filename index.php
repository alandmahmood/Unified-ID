<?php 
require "conn.php"; 
session_start(); // Make sure to start the session before any headers or HTML output

if (!isset($_SESSION["access"])) {
    header("location: login.php");
    exit(); // Ensure script execution stops after redirection
} else {
    if ($_SESSION["access"] == "admin") {
        header("location: index.php");
        exit(); // Ensure script execution stops after redirection
    } else {
        header("location: request.php");
        exit(); // Ensure script execution stops after redirection
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Table</title>
    <script src="https://cdn.tailwindcss.com/"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
        html, body {
            height: 100%; /* Set height to 100% */
            margin: 0; /* Remove default margin */
        }
        .main-content {
            flex: 1; /* This allows the main content to grow and fill available space */
        }

        /* Keep your existing footer styles */
        .footer-section {
            background-color: #113f59;
            padding: 10px 0;
            text-align: center;
        }
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
            display: flex; /* Use flexbox layout */
            flex-direction: column; /* Align items in a column */
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
       <div class="w-full flex flex-row justify-between text-2xl py-4 px-6 rounded-1xl shadow-lg text-white" style="background-color: #113f59;">
<div class="text-2xl"><a href='index.php'>Universal ID</a></div>
        <div class="flex flex-row space-x-4">
            <a href='Home.php'>Home</a>
            <a href='nationalID.php?nid=<?php echo $row["nid"]; ?>'>National ID</a>
            <a href='HealthID.php?hid=<?php echo $row["hid"]; ?>'>Health ID</a>
            <a href='DrivingID.php?did=<?php echo $row["did"]; ?>'>Driving License ID</a>
            <a  href="add.php">Add Citizen</a>
        </div>
                                        <!-- Theme Toggle Button with Icons -->
        <button id="theme-toggle" class="ml-4 px-3 py-1 rounded focus:outline-none" aria-label="Toggle Theme">
    <!-- Moon SVG Icon (Visible in Dark Mode) -->
    <svg id="theme-icon-moon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: inline;">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3a7 7 0 009.79 9.79z" />
    </svg>
    <!-- Sun SVG Icon (Visible in Light Mode) -->
    <svg id="theme-icon-sun" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364l-1.414 1.414M6.05 17.95l-1.414 1.414m12.728 0l-1.414-1.414M6.05 6.05L4.636 7.464M12 8a4 4 0 100 8 4 4 0 000-8z" />
    </svg>
</button>
  </div>
  <br>
<hr>

<!-- Main content wrapper -->
<div class="container main-content">
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $select = "SELECT * FROM info";
            $result = mysqli_query($conn, $select);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row["nid"]; ?></td>
                    <td><?php echo $row["full_name"]; ?></td>
                    <td>
                        <a href="NationalID.php?nid=<?php echo $row["nid"]; ?>" class="btn btn-primary btn-sm">National ID</a>
                        <a href="HealthID.php?hid=<?php echo $row["hid"]; ?>" class="btn btn-primary btn-sm">Health ID</a>
                        <a href="DrivingID.php?did=<?php echo $row["did"]; ?>" class="btn btn-primary btn-sm">Driving License</a>
                    </td>
                </tr>
                <?php  
            }
            ?>
        </tbody>
    </table>
</div>


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


<!-- Footer -->
<?php include 'footer.php'; ?>

</body>
</html>
