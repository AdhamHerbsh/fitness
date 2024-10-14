<?php
include("conn.php");
//
// $sql_videos = "SELECT * FROM videos";
// $query_videos = mysqli_query($db, $sql_videos);
// $count_videos = mysqli_num_rows($query_videos);
//
$sql_users = "SELECT * FROM users";
$query_users = mysqli_query($db, $sql_users);
$count_users = mysqli_num_rows($query_users);
//
$sql_coaches = "SELECT * FROM coaches";
$query_coaches = mysqli_query($db, $sql_coaches);
$count_coaches = mysqli_num_rows($query_coaches);
//
$sql_plans = "SELECT * FROM workout_plans";
$query_plans = mysqli_query($db, $sql_plans);
$count_plans = mysqli_num_rows($query_plans);

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
        
    <!-- Carousel Start -->
    <section class="pt-5">
        <div class="container-fluid p-0">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-bg vh-75"></div>
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;" data-aos="fade-in">
                                <h5 class="text-white text-uppercase">Fitness Assistant</h5>
                                <h2 class="display-6 display-md-4 text-white text-uppercase mb-md-4">Your Perfect Platform for Building Strength and Health </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Carousel End -->


    <!-- About Start -->
    <section class="py-5" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center">
                <!-- Image Column -->
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="position-relative shadow overflow-hidden rounded">
                        <img class="img-fluid w-100 h-100" src="images/about.jpg" alt="About Image" style="object-fit: cover;">
                    </div>
                </div>
                <!-- Content Column -->
                <div class="col-lg-7 p-4 rounded-4 bg-light shadow">
                    <!-- Section Title -->
                    <div class="mb-4">
                        <h5 class="text-primary text-uppercase mb-3">About Us</h5>
                        <h1 class="display-5 text-uppercase mb-0">Welcome to Fitness Assistant</h1>
                    </div>
                    <!-- Description -->
                    <h4 class="text-body mb-4" style="text-transform: capitalize;">Your AI-Powered Fitness Guide</h4>
                    <!-- Tabs Section -->
                    <div class="bg-dark p-5 rounded">
                        <!-- Nav Pills -->
                        <ul class="nav nav-pills justify-content-between mb-4">
                            <li class="nav-item w-50">
                                <a class="nav-link text-uppercase text-center w-100 active" data-bs-toggle="pill" href="#pills-1">About Us</a>
                            </li>
                            <li class="nav-item w-50">
                                <a class="nav-link text-uppercase text-center w-100" data-bs-toggle="pill" href="#pills-2">Why Choose Us</a>
                            </li>
                        </ul>
                        <!-- Tab Content -->
                        <div class="tab-content">
                            <!-- About Us Tab -->
                            <div class="tab-pane fade show active" id="pills-1">
                                <p class="text-light mb-0">
                                    Our platform is dedicated to providing an integrated solution for fitness enthusiasts. With a focus on user-friendly interfaces and AI-driven guidance, we aim to make fitness accessible to everyone in Saudi Arabia and beyond.
                                </p>
                            </div>
                            <!-- Why Choose Us Tab -->
                            <div class="tab-pane fade" id="pills-2">
                                <ul class="text-light mb-0 ps-4">
                                    <li>Personalized workout plans tailored to your fitness level and goals</li>
                                    <li>Calorie and macros calculator for precise dietary planning</li>
                                    <li>Chatbot to ask anything you want</li>
                                    <li>24/7 accessibility from any device with internet connectivity</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About End -->


    <!-- Program Start -->
    <section>
        <div class="container-fluid bg-dark p-5">
            <!-- Section Title -->
            <div class="row m-3" data-aos="fade">
                <div class="col-12 text-center">
                    <h1 class="text-uppercase text-light mb-4">Fitness Assistant Activities</h1>
                </div>
            </div>
            <div class="row g-5 m-3">
                <!-- BodyBuilding Section -->
                <div class="col-lg-6 col-md-6" data-aos="zoom-in">
                    <div class="bg-light rounded text-center p-5 h-100 shadow-sm">
                        <i class="flaticon-six-pack display-1 text-primary mb-3"></i>
                        <h3 class="text-uppercase my-4">BodyBuilding</h3>
                        <p>
                            Focuses on developing muscularity and aesthetic definition through resistance training, proper nutrition, and sometimes supplements. It involves exercises that target specific muscle groups and aims to achieve a symmetrical and balanced physique.
                        </p>
                    </div>
                </div>
                <!-- Powerlifting Section -->
                <div class="col-lg-6 col-md-6" data-aos="zoom-in">
                    <div class="bg-light rounded text-center p-5 h-100 shadow-sm">
                        <i class="flaticon-barbell display-1 text-primary mb-3"></i>
                        <h3 class="text-uppercase my-4">Powerlifting</h3>
                        <p>
                            A strength sport that focuses on three main lifts: the squat, bench press, and deadlift. Powerlifters train to increase their maximum strength in these lifts, often using heavy weights and lower repetitions.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Program End -->

   <!-- Facts Start -->
   <section class="min-vh-50 mb-5">
       <div class="container">
            <div class="justify-content-center mb-3" data-aos="fade" data-aos-delay="150">
                <div class="text-center text-uppercase">
                    <h2>Statistics</h2>
                    <h5>Our Statistics</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 my-2 text-center" data-aos="fade-up" data-aos-delay="250">
                    <div class="card card-hover p-4 shadow">
                            <div class="card-title mb-2">
                            <i class="fa fa-users rounded-circle bg-primary text-white"></i>
                            <h2>Our Trainers</h2>
                        </div>
                        <div class="card-body mb-2">
                            <h1 data-toggle="counter-up"><?= $count_coaches; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-2 text-center" data-aos="fade-up" data-aos-delay="500">
                    <div class="card card-hover p-4 shadow">
                            <div class="card-title mb-2">
                            <i class="fa fa-file-archive rounded-circle bg-primary text-white"></i>
                            <h2>Our Plans</h2>
                        </div>
                        <div class="card-body mb-2">
                            <h1 data-toggle="counter-up"><?= $count_plans; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-2 text-center" data-aos="fade-up" data-aos-delay="750">
                    <div class="card card-hover p-4 shadow">
                            <div class="card-title mb-2">
                            <i class="fa fa-users rounded-circle bg-primary text-white"></i>
                            <h2>Our Clients</h2>
                        </div>
                        <div class="card-body mb-2">
                            <h1 data-toggle="counter-up"><?= $count_users; ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Facts End -->

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