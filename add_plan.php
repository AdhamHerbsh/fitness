<?php
include("conn.php");
$id = $_SESSION['id'];
if (isset($_POST['save_btn'])) {
    $activity_type = $_POST['activity_type'];
    $duration =  $_POST['duration'];
    $equipments = $_POST['equipments'];
    $tmp_name = $_FILES["file"]["tmp_name"];
    $pdf = basename($_FILES["file"]["name"]);
    if (move_uploaded_file($tmp_name, "pdfs/$pdf")) {

        $sql = "INSERT INTO `workout_plans`(`physical_activity`, `duration`, `equipment_required`, `path`, `coach_id`)
     VALUES ('$activity_type','$duration','$equipments','$pdf','$id')";
        if ($query = mysqli_query($db, $sql)) {
            echo "<script> localStorage.setItem('status','200OK'); </script>";
        } else {
            echo "<script> localStorage.setItem('status','417FAIL'); </script>";
        }
    } else {
        echo "<script>alert('pdf file doesnot Add Failed')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add Plan</title>
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
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/aos/aos.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .btn-danger {
            background: #FB5B21 !important;
        }
    </style>

</head>

<body>
    <!-- Header Start -->
    <!-- Main Layout -->
    <div class="container-fluid bg-dark px-0 fixed-top">
        <div class="row">
            <!-- Sidebar (Left Side) -->
            <div class="col-lg-4 bg-dark d-none d-lg-block px-5">
                <a href="#" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center">
                    <h1 class="m-0 display-10 text-primary text-uppercase">Fitness Assistant</h1>
                </a>
            </div>

            <!-- Navbar (Right Side) -->
            <div class="col-lg-8">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0 px-lg-5">
                    <!-- Mobile Logo -->
                    <a href="#" class="navbar-brand d-block d-lg-none">
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
        <!-- Add Plan Start -->
        <section class="py-0">
        <!-- Add Plan Form -->
        <div class="container-fluid p-2">
            <div class="mb-2 text-center">
                <h5 class="display-5 text-uppercase mb-0">Plans</h5>
                <h1 class="text-primary text-uppercase">Add Plan</h1>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 m-auto">
                    <div id="success-message" class="m-auto alert alert-success alert-dismissible mb-3 fade d-none" role="alert">
                                <strong>Plan Added Successfully <i class="fa fa-check"></i></strong>
                                <br />
                                You Add New Plan for Users...
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <div id="wrong-message" class="m-auto alert alert-danger alert-dismissible mb-3 fade d-none" role="alert">
                                <strong>Plan Doesn't Added Successfully <i class="fa fa-exclamation"></i></strong>
                                <br />
                                You Can't Create New Plan Until Solve Problem...
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    <div class="bg-dark p-5 rounded">
                        <form action="add_plan.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3">

                                <!-- Activity Type -->
                                <div class="col-12">
                                    <select name="activity_type" class="form-control bg-light border-0 px-4 py-3" required>
                                        <option disabled>Physical Activity</option>
                                        <option selected>Bodybuilding</option>
                                        <option>Powerlifting</option>
                                    </select>
                                </div>

                                <!-- Duration -->
                                <div class="col-12">
                                    <select name="duration" class="form-control bg-light border-0 px-4 py-3" required>
                                        <option disabled>Duration</option>
                                        <option selected value="3">3 Days</option>
                                        <option value="4">4 Days</option>
                                        <option value="5">5 Days</option>
                                        <option value="6">6 Days</option>
                                    </select>
                                </div>

                                <!-- Equipments -->
                                <div class="col-12">
                                    <input name="equipments" type="text" placeholder="Equipments" class="form-control bg-light border-0 px-4 py-3" required />
                                </div>

                                <!-- PDF File Upload -->
                                <div class="col-12">
                                    <label class="form-label text-white">PDF File</label>
                                    <input name="file" type="file" class="form-control bg-light border-0 px-4 py-3" required />
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button name="save_btn" class="col-12 btn btn-primary" type="submit">Add Plan</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Add Plan End -->
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

    <script type="text/javascript">
            var status = localStorage.getItem("status");
            
            if(status === "200OK"){
                document.getElementById("success-message").classList.remove("d-none");
                document.getElementById("success-message").classList.add("show");
                localStorage.setItem("status","");
            }else if (status === "417FAIL"){
                document.getElementById("wrong-message").classList.remove("d-none");
                document.getElementById("wrong-message").classList.add("show");
                localStorage.setItem("status","");

            }
    </script>
</body>

</html>