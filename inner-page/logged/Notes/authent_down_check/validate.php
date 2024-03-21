<?php
// Function to validate credentials
function validateCredentials($username, $password)
{
    // Open the CSV file
    $file = fopen("users.csv", "r");

    // Check if file opened successfully
    if ($file !== FALSE) {
        // Iterate through each line in the file
        while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
            // Check if the username and password match
            if ($data[0] === $username && $data[1] === $password) {
                // Close the file
                fclose($file);
                return true; // Return true if match found
            }
        }
        // Close the file
        fclose($file);
    }
    return false; // Return false if no match found
}

// If the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate username and password
    if (empty($username) || empty($password)) {
        $error = "Username and password are required";
    } else {
        // Validate credentials
        if (validateCredentials($username, $password)) {
            // Redirect to download page if credentials are valid
            header("Location: download.php");
            exit();
        } else {
            $error = "Invalid username or password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PGI Bharatpur ┃ verified ┃ Notes</title>
    <meta name="description" content="Welcome to PGI Bharatpur - Your Gateway to Global Nursing Opportunities! Join us to embark on a rewarding journey in international nursing education.">
    <meta name="keywords" content="PGI Bharatpur, nursing education, international nursing, NCLEX, global healthcare">
    <meta name="author" content="Samratthapa, pgibharatpur">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../../logo.jpg" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../../../assets-2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../../../../assets-1/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../../../../assets-1/vendor/aos/aos.css" rel="stylesheet">
    <link href="../../../../assets-1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../../assets-1/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../../../assets-2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../../../assets-2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../../../assets/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../../../assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Medicio
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        .container {
            width: 100vw;
        }
    </style>
</head>

<body>      
    <section>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row">
    <!-- Pills navs -->
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
        </li>
    </ul>
    <!-- Pills navs -->

    <!-- Pills content -->
    <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login"> <?php if (isset($error)) : ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <form method="post">
                <div class="text-center mb-3">
                    <p>Sign in with:</p>
                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-facebook-f"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-google"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-twitter"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-github"></i>
                    </button>
                </div>

                <p class="text-center">or:</p>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <inputtype="text" id="username" name="username" class="form-control" />
                    <label class="form-label" for="username">Email or username</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="password" name="password"class="form-control" />
                    <label class="form-label" for="password">Password</label>
                </div>

                <!-- 2 column grid layout -->
                <div class="row mb-4">
                    <div class="col-md-6 d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-3 mb-md-0">
                            <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                            <label class="form-check-label" for="loginCheck"> Remember me </label>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex justify-content-center">
                        <!-- Simple link -->
                        <a href="#!">Forgot password?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <button class="btn btn-primary btn-block mb-4" type="submit" value="Login">Sign in</button>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Not a member? <a href="#!">Register</a></p>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
            <form>
                <div class="text-center mb-3">
                    <p>Sign up with:</p>
                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-facebook-f"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-google"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-twitter"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-github"></i>
                    </button>
                </div>

                <p class="text-center">or:</p>

                <!-- Name input -->
                <div class="form-outline mb-4">
                    <input type="text" id="registerName" class="form-control" />
                    <label class="form-label" for="registerName">Name</label>
                </div>

                <!-- Username input -->
                <div class="form-outline mb-4">
                    <input type="text" id="registerUsername" class="form-control" />
                    <label class="form-label" for="registerUsername">Username</label>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="registerEmail" class="form-control" />
                    <label class="form-label" for="registerEmail">Email</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="registerPassword" class="form-control" />
                    <label class="form-label" for="registerPassword">Password</label>
                </div>

                <!-- Repeat Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="registerRepeatPassword" class="form-control" />
                    <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked aria-describedby="registerCheckHelpText" />
                    <label class="form-check-label" for="registerCheck">
                        I have read and agree to the terms
                    </label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-3">Sign in</button>
            </form>
        </div>
    </div>
    <!-- Pills content -->
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
    </div>
        </div>
    </section>

    <!-- Vendor JS Files -->
    <script src="../../../../assets-2/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../../../../assets-1/vendor/aos/aos.js"></script>
    <script src="../../../../assets-1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../../assets-2/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../../../../assets/swiper/swiper-bundle.min.js"></script>
    <script src="../../../../assets-2/vendor/php-email-form/validate.js"></script>
    <script src="../../../../script.js"></script>

    <!-- Template Main JS File -->
    <script src="../../../../assets/js/main.js"></script>
</body>

</html>