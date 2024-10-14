<?php
include("conn.php");
$id = $_SESSION['id'];
$plan_id = $_GET['id'];

$sql_plan = "SELECT * FROM workout_plans WHERE id = $plan_id";
$query_plan = mysqli_query($db, $sql_plan);
foreach ($query_plan as $row_plan) {
    $activity_type = $row_plan['physical_activity'];
    $duration =  $row_plan['duration'];
    $equipments = $row_plan['equipment_required'];
    $pdf =  $row_plan['path'];
}

if (isset($_POST['save_btn'])) {
    $activity_type_ = $_POST['activity_type'];
    $duration_ =  $_POST['duration'];
    $equipments_ = $_POST['equipments'];
    $tmp_name = $_FILES["file"]["tmp_name"];
    $pdf_ = basename($_FILES["file"]["name"]);
    if (move_uploaded_file($tmp_name, "pdfs/$pdf_")) {
        $sql = "UPDATE `workout_plans` SET `physical_activity`='$activity_type_',`duration`='$duration_', `equipment_required`='$equipments_',path='$pdf_' WHERE id = $plan_id";
        if ($query = mysqli_query($db, $sql)) {
            header("refresh:0");
        } else {
            echo "<script>alert('plan Doesnot Updated Successfully')</script>";
        }
    } else {
        $sql = "UPDATE `workout_plans` SET `physical_activity`='$activity_type_',`duration`='$duration_', `equipment_required`='$equipments_' WHERE id = $plan_id";
        if ($query = mysqli_query($db, $sql)) {
            header("refresh:0");
        } else {
            echo "<script>alert('plan Doesnot Updated Successfully')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Update Plan</title>
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
       <!-- Update Plan Start -->
       <section>
        <div class="container-fluid p-1">
            <div class="mb-2 text-center">
                <h5 class="display-5 text-uppercase mb-3 text-primary">Update Plan</h5>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 m-auto">
                    <div class="bg-dark p-4">
                        <form action="update_plan.php?id=<?= $plan_id; ?>" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 text-white">
                                <!-- Activity Type -->
                                <div class="mb-3">
                                    <label for="activity_type" class="mb-1">Activity Type:</label>
                                    <select id="activity_type" name="activity_type" class="form-control py-2" required>
                                        <option disabled>Physical Activity</option>
                                        <option <?= ($activity_type == 'bodybuilding') ? "selected" : "" ?>>Bodybuilding</option>
                                        <option <?= ($activity_type == 'powerlifting') ? "selected" : "" ?>>Powerlifting</option>
                                    </select>
                                </div>
                                <!-- Duration -->
                                <div class="mb-3">
                                    <label for="duration" class="mb-1">Duration:</label>
                                    <select id="duration" name="duration" class="form-control py-2" required>
                                        <option disabled>Duration</option>
                                        <option value="3" <?= ($duration == 3) ? "selected" : "" ?>>3 days</option>
                                        <option value="4" <?= ($duration == 4) ? "selected" : "" ?>>4 days</option>
                                        <option value="5" <?= ($duration == 5) ? "selected" : "" ?>>5 days</option>
                                        <option value="6" <?= ($duration == 6) ? "selected" : "" ?>>6 days</option>
                                    </select>
                                </div>

                                <!-- Equipments -->
                                <div class="mb-3">
                                    <label for="equipments" class="mb-1">Equipments:</label>
                                    <input id="equipments" name="equipments" type="text" placeholder="Equipments" value="<?= $equipments; ?>" class="form-control" required>
                                </div>

                                <!-- Current PDF File -->
                                <div class="col-4 pt-1 text-center">
                                    <label class="mb-1">Current PDF File:</label>
                                </div>
                                <div class="col-8 pt-1">
                                    <a class="btn btn-primary w-100 mt-1" href="pdf_file.php?id=<?= $plan_id; ?>">View PDF <i class="fa fa-file"></i></a>
                                </div>

                                <!-- Update PDF File -->
                                <div class="col-4 pt-1 text-center">
                                    <label for="file" class="mb-1">Update PDF File:</label>
                                </div>
                                <div class="col-8">
                                    <input id="file" name="file" type="file" class="form-control">
                                </div>

                                <!-- Update Button -->
                                <div class="mb-3 text-center">
                                    <button name="save_btn" class="col-10 btn btn-primary" type="submit">Update Plan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Update Plan End -->

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