<?php
if (isset($_GET["hid"])) {
    $hid = $_GET["hid"];
    $query = "SELECT * from info where hid='$hid'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            width: 100%;
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

        /* Navbar Styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background-color: var(--navbar-bg-color);
        }

        .navbar .logo {
            font-size: 1.5rem;
        }

        .navbar-links {
            display: flex;
            gap: 1rem;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar-links {
                flex-direction: column;
                width: 100%;
            }

            .navbar-links a {
                padding: 0.5rem 1rem;
                width: 100%; /* Full width for mobile */
                text-align: left; /* Align text to the left */
            }
        }

        @media (min-width: 769px) {
            .navbar-links {
                display: flex;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar" >
        <div class="logo"><a href='login.php'>Universal ID</a></div>
        <div class="navbar-links">
            <a href='Home1.php'>Home</a>
            <a href='nationalID.php?nid=<?php echo $row["nid"]; ?>'>National ID</a>
            <a href='HealthID.php?hid=<?php echo $row["hid"]; ?>'>Health ID</a>
            <a href='DrivingID.php?did=<?php echo $row["did"]; ?>'>Driving License ID</a>
            <a href='request.php'>Request ID</a>
        </div>
        <!-- Theme Toggle Button with Icons -->
        <button id="theme-toggle" class="ml-4 px-3 py-1 rounded focus:outline-none" aria-label="Toggle Theme">
            <svg id="theme-icon-moon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: inline;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3a7 7 0 009.79 9.79z" />
            </svg>
            <svg id="theme-icon-sun" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364l-1.414 1.414M6.05 17.95l-1.414 1.414m12.728 0l-1.414-1.414M6.05 6.05L4.636 7.464M12 8a4 4 0 100 8 4 4 0 000-8z" />
            </svg>
        </button>
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
