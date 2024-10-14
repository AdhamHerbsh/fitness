<?php
include("conn.php");
$id = $_SESSION['id'];
$sql_user = "SELECT * FROM users WHERE id = $id";
$query_user = mysqli_query($db, $sql_user);
foreach ($query_user as $row_user) {
    $day = $row_user['workout_days'];
    $physical_activity = $row_user['physical_activity'];
}

$sql = "SELECT * FROM user_plans WHERE user_id = $id";
$query = mysqli_query($db, $sql);
$count = mysqli_num_rows($query);

if ($count == 0) {
    $sql_plans = "SELECT * FROM workout_plans WHERE duration = $day AND upper(physical_activity) like upper('$physical_activity')";
    $query_plans = mysqli_query($db, $sql_plans);
    $count_plans = mysqli_num_rows($query_plans);
} else {
    $sql_plans = "SELECT * FROM workout_plans WHERE id IN (SELECT plan_id FROM user_plans WHERE user_id = $id) AND duration = $day AND upper(physical_activity) like upper('$physical_activity')";
    $query_plans = mysqli_query($db, $sql_plans);
    $count_plans = mysqli_num_rows($query_plans);
}








?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>user Plans</title>
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
     <!-- User Plans Start -->
  <section>
        <div class="container-fluid p-2">
            <div class="mb-3 text-center">
                <h2 class="text-primary text-uppercase">Workout Plans</h2>
                <!-- <h1 class="display-5 text-uppercase mb-0">FAQ</h1> -->
            </div>
            <div class="tab-class text-center">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-2">                         
                            <?php
                            foreach ($query_plans as $row_plans) {

                            ?>
                            <div class="card col-md-5 m-auto my-3">
                                <div class="card-body">
                                    <h5 class="card-title text-primary mb-3"><i class="flaticon-barbell"></i> Workout Plans</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Plans Number <?= $row_plans['id']; ?></h6>
                                    <p class="card-text">
                                        <ol class="list-group text-start">
                                            <li class="list-group-item"><p class="text-uppercase"><span class="fw-bold">Type of Activity:</span> <?= $row_plans['physical_activity']; ?> </p></li>
                                            <li class="list-group-item"><p class="text-uppercase"><span class="fw-bold">Duration:</span> <?= $row_plans['duration']; ?> days</p></li>
                                            <li class="list-group-item"><p class="text-uppercase"><span class="fw-bold">Equipments:</span> <?= $row_plans['equipment_required']; ?></p></li>
                                        </ol>
                                    </p>
                                    <a class="btn btn-primary" href="pdf_file.php?id=<?= $row_plans['id']; ?>">show</a>
                                    <?php if ($count == 0) { ?>

                                        <a class="btn btn-danger" href="./plan-add.php?id=<?= $row_plans['id']; ?>">select</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a class="btn btn-danger" href="./user-plan-delete.php?id=<?= $row_plans['id']; ?>">delete</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>                                
                <?php
                            }
                ?>
                            </div>                                
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- User Plans End -->

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