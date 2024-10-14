<?php
include("conn.php");
$id = $_SESSION['id'];
$sql_users = "SELECT * FROM users WHERE id = $id";
$query_users = mysqli_query($db, $sql_users);

$gender = "";
$height = "";
$weight = "";
$age = "";
$fitness_goal = "";
$activity_level = "";

foreach ($query_users as $row_user) {

    $gender = $row_user['gender'];
    $height = $row_user['height'];
    $weight = $row_user['weight'];
    $age = $row_user['age'];
    $fitness_goal = $row_user['fitness_goal'];
    $activity_level = $row_user['activity_level'];
}

if ($gender == 0) {
    $bmr = 10 * $weight + 6.25 * $height - (5 * $age) + 5;
}
if ($gender == 1) {
    $bmr = 10 * $weight + 6.25 * $height - (5 * $age) - 161;
}

if (strtoupper($activity_level) == strtoupper('sedentary')) {
    $new_bmr = 1.2 * $bmr;
}
if (strtoupper($activity_level) == strtoupper('lightly active')) {
    $new_bmr = 1.375 * $bmr;
}
if (strtoupper($activity_level) == strtoupper('moderately active')) {
    $new_bmr = 1.55 * $bmr;
}
if (strtoupper($activity_level) == strtoupper('very active')) {
    $new_bmr = 1.725 * $bmr;
}

if (strtoupper($fitness_goal) == strtoupper('lose weight')) {
    $calories = $new_bmr - 500;
    $protiens = 0.30 * $calories / 4;
    $fats = 0.40 * $calories / 9;
    $carbs = 0.30 * $calories / 4;
}
if (strtoupper($fitness_goal) == strtoupper('maintain weight')) {
    $calories = $new_bmr;
    $protiens = 0.30 * $calories / 4;
    $fats = 0.40 * $calories / 9;
    $carbs = 0.30 * $calories / 4;
}
if (strtoupper($fitness_goal) == strtoupper('gain weight')) {
    $calories = $new_bmr + 500;
    $protiens = 0.25 * $calories / 4;
    $fats = 0.25 * $calories / 9;
    $carbs = 0.50 * $calories / 4;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fitness Level</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="images/logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/aos/aos.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Header Start -->
    <!-- Main Layout -->
    <div class="container-fluid bg-dark px-0 fixed-top">
        <div class="row">
            <!-- Sidebar (Left Side) -->
            <div class="col-lg-4 bg-dark d-none d-lg-block px-5">
                <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center">
                    <h1 class="m-0 display-10 text-primary text-uppercase">Fitness Assistant</h1>
                </a>
            </div>

            <!-- Navbar (Right Side) -->
            <div class="col-lg-8">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0 px-lg-5">
                    <!-- Mobile Logo -->
                    <a href="index.php" class="navbar-brand d-block d-lg-none">
                        <h1 class="m-0 display-10 text-primary text-uppercase">Fitness Assistant</h1>
                    </a>

                    <!-- Mobile Menu Toggle Button -->
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Include Navbar Items -->
                    <?php include("header.php"); ?>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->    
    
    
<main>

    <!-- Calories Start -->
    <section class="min-vh-50 mb-5">
        <div class="container">
                   <!-- Section Title -->
        <div class="text-center mb-5">
            <h1 class="text-uppercase text-primary">Daily Calories and Macros</h1>
        </div>

        <!-- Calories -->
        <div class="col-md-12 my-2 text-center" data-aos="fade-up" data-aos-delay="250">
            <div class="card card-hover p-4 shadow">
                <div class="card-title mb-2">
                    <i class="fas fa-fire rounded-circle bg-primary text-white"></i>
                    <h2>Calories</h2>
                </div>
                <div class="card-body mb-2">
                    <h1 class="display-5 " data-toggle="counter-up"><?=  round($calories,2); ?></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Proteins -->
            <div class="col-md-4 my-2 text-center" data-aos="fade-up" data-aos-delay="500">
                <div class="card card-hover p-4 shadow">
                    <div class="card-title mb-2">
                        <i class="fas fa-drumstick-bite rounded-circle bg-primary text-white"></i>
                        <h2>Proteins</h2>
                    </div>
                    <div class="card-body mb-2">
                        <h1 class="display-5 " data-toggle="counter-up"><?= round($protiens,2); ?></h1>
                        </div>
                    </div>
                </div>
                <!-- Fats -->
                <div class="col-md-4 my-2 text-center" data-aos="fade-up" data-aos-delay="750">
                    <div class="card card-hover p-4 shadow">
                            <div class="card-title mb-2">
                            <i class="fas fa-bacon rounded-circle bg-primary text-white"></i>
                            <h2>Fat</h2>
                        </div>
                        <div class="card-body mb-2">
                        <h1 class="display-5 " data-toggle="counter-up"><?= round($fats,2); ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-2 text-center" data-aos="fade-up" data-aos-delay="750">
                    <div class="card card-hover p-4 shadow">
                            <div class="card-title mb-2">
                            <i class="fas fa-bread-slice rounded-circle bg-primary text-white"></i>
                            <h2>Carbs</h2>
                        </div>
                        <div class="card-body mb-2">
                        <h1 class="display-5 " data-toggle="counter-up"><?= round($carbs,2); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Calories End -->

</main>

    <!-- Footer Start -->
    <div class="container-fluid py-4 py-lg-0 px-5 bg-dark">
        <div class="row gx-5">
            <div class="col-lg-12">
                <div class="py-lg-4 text-center">
                    <p class="text-secondary mb-0"> Fitness Website All
                        Rights Reserved.</p>
                </div>
            </div>

        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-dark py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/aos/aos.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>