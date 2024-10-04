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
    <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
       
       <!--font-awesome.min.css-->
       <link rel="stylesheet" href="assets/css/font-awesome.min.css">

       <!--flat icon css-->
       <link rel="stylesheet" href="assets/css/flaticon.css">

       <!--animate.css-->
       <link rel="stylesheet" href="assets/css/animate.css">

       <!--owl.carousel.css-->
       <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
       <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
       
       <!--bootstrap.min.css-->
       <link rel="stylesheet" href="assets/css/bootstrap.min.css">
       
       <!-- bootsnav -->
       <link rel="stylesheet" href="assets/css/bootsnav.css" >	
       
       <!--style.css-->
       <link rel="stylesheet" href="assets/css/style.css">
       
       <!--responsive.css-->
       <link rel="stylesheet" href="assets/css/responsive.css">
    
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
        /* Light Theme Variables */
.light-mode {
    --bg-color: #ffffff; /* Background color */
    --navbar-bg-color: #f8f9fa; /* Navbar background */
    --text-color: #333333; /* Text color (darker for light mode) for better contrast */
    --card-bg-color:#333333; /* Card background color (light gray for contrast) */
    --btn-outline-dark-border: #000000; /* Button border color */
    --btn-outline-dark-text: #000000; /* Button text color */
    --btn-outline-dark-hover-bg: #000000; /* Button hover background */
    --btn-outline-dark-hover-text: #ffffff; /* Button hover text color */
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
    background-color: var(--card-bg-color) !important; /* Ensure this is applied */
    color: var(--text-color); /* Default text color */
    transition: background-color 0.5s, color 0.5s;
}

/* Override text color for light mode */
.light-mode .card-custom {
    color: var(--text-color); /* Ensure text color is set properly */
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


    </style>
</head>

<body>
            <!-- Navbar -->
        <?php include 'nav.php'; ?>


        <div class="container parent d-flex justify-content-center align-items-center h-100">
        <div class="card p-4 w-100 bg-blue-300">
            <h2 class="text-center mb-4 text-gray-900">Submit a Scan</h2>
            <p class="text-center mb-5 text-gray-900">Please upload your scanned documents. Accepted formats: PDF, JPG, PNG (max 5MB).</p>

            <div class="upload-area">
                <input type="file" id="fileInput" accept=".pdf, .jpg, .jpeg, .png" multiple>
                <label for="fileInput" class="btn btn-outline-dark mt-2 text-gray-900">Browse Files</label>
                <p class="text-gray-900">  Or drag and drop your files here</p>
            </div>

            <div class="preview-area" id="previewArea" style="display: none;">
                <h5 class="text-gray-900">Preview:</h5>
                <div id="previewImages"></div>
            </div>

            <div class="text-center mt-4">
                <button id="submitBtn" class="btn btn-success">Submit</button>
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
            <script src="assets/js/jquery.js"></script>
        
		
           <!-- JavaScript for File Upload and Preview -->
    <script>

       const fileInput = document.getElementById('fileInput');
const previewArea = document.getElementById('previewArea');
const previewImages = document.getElementById('previewImages');

fileInput.addEventListener('change', function () {
    const files = fileInput.files; // Get all selected files
    previewImages.innerHTML = ''; // Clear previous previews
    if (files.length > 0) {
        previewArea.style.display = 'block'; // Show preview area
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (file.size > 5 * 1024 * 1024) { // Check if the file is larger than 5MB
                alert(`${file.name} is too large. Please select a file smaller than 5MB.`);
                continue; // Skip this file if it's too large
            }
            const reader = new FileReader();

            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = file.name;
                img.style.maxWidth = '100px'; // Limit the preview size
                img.style.margin = '5px'; // Add some spacing
                previewImages.appendChild(img); // Add the preview image
            };

            if (file.type === "application/pdf") {
                const pdfImg = document.createElement('img');
                pdfImg.src = "path/to/pdf-icon.png"; // Use a PDF icon here
                pdfImg.alt = 'PDF Document';
                pdfImg.style.maxWidth = '100px'; // Limit the preview size
                pdfImg.style.margin = '5px'; // Add some spacing
                previewImages.appendChild(pdfImg); // Add the PDF icon
            } else {
                reader.readAsDataURL(file); // Read the file as a data URL
            }
        }
    }
});

    </script>
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
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/animate.css">
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/bootsnav.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/responsive.css">

<script src="assets/js/jquery.js"></script>


</body>
</html>
