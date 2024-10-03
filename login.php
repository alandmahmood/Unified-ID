<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
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
              <!-- Navbar -->
              <?php include 'nav.php'; ?>
<body>




    <!-- Main Content -->
    <div class="container parent d-flex justify-content-center align-items-center h-100 rounded-3xl">
        <div class="container bg-gray-200 shadow-lg rounded-3xl w-100 w-md-75 w-lg-50">
            <section class="vh-100" style="background-color: #113f59;">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col col-xl-10">
                            <div class="card" style="border-radius: 1rem;">
                                <div class="row g-0">
                                    <div class="col-md-6 col-lg-5 d-none d-md-block">
                                        <img src="UID5.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%; object-fit: cover;" />
                                    </div>
                                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                        <div class="card-body p-4 p-lg-5 text-black">
                                            <form method="POST" action="loginconfirm.php" enctype="multipart/form-data">
                                                <div class="d-flex align-items-center mb-3 pb-1">
                                                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                                    <span class="h1 fw-bold mb-0">Universal ID</span>
                                                </div>
                                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                                <div class="form-outline mb-4">
                                                    <input type="text" name="username" id="username" class="form-control form-control-lg" required />
                                                    <label class="form-label" for="username">Username</label>
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <input type="password" name="password" id="password" class="form-control form-control-lg" required />
                                                    <label class="form-label" for="password">Password</label>
                                                </div>

                                                <div class="pt-1 mb-4">
                                                    <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
