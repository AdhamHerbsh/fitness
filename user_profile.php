<?php
include("conn.php");
$id = $_SESSION['id'];


$name = "";
$email = "";
$password = "";
$age = "";
$gender = "";
$height = "";
$weight = "";
$workout_days = "";
$fitness_goal = "";
$fitness_level = "";
$activity_type = "";
$activity_level = "";

if (!isset($_POST['save_btn'])) {
    $sql_user = "SELECT * FROM users WHERE id=$id";
    $query_user = mysqli_query($db, $sql_user);
    foreach ($query_user as $row_user) {
        $name = $row_user['name'];
        $email = $row_user['email'];
        $password = $row_user['password'];
        $age = $row_user['age'];
        $gender = $row_user['gender'];
        $height = $row_user['height'];
        $weight = $row_user['weight'];
        $workout_days = $row_user['workout_days'];
        $fitness_goal = $row_user['fitness_goal'];
        $fitness_level = $row_user['fitness_level'];
        $activity_type = $row_user['physical_activity'];
        $activity_level = $row_user['activity_level'];
    }
}

if (isset($_POST['save_btn'])) {
    $name_ = $_POST['name'];
    $email_ = $_POST['email'];
    $password_ = $_POST['password'];
    $height_ = $_POST['height'];
    $weight_ = $_POST['weight'];
    $age_ = $_POST['age'];
    $gender_ = $_POST['gender'];
    $workout_days_ = $_POST['days'];
    $fitness_goal_ = $_POST['fitness_goal'];
    $fitness_level_ = $_POST['fitness_level'];
    $activity_type_ = $_POST['activity_type'];
    $activity_level_ = $_POST['activity_level'];
    ///////////////////new/////////////////////////////
    $sql_email = "SELECT * FROM users WHERE (email like '$email_' AND id != $id)";
    $query_email = mysqli_query($db, $sql_email);
    $count_email = mysqli_num_rows($query_email);
    if ($count_email != 0) {
        echo "<script>alert('this email already exists')</script>";
    } else {
        ///////////////////////////////////////////////////
        $sql = "UPDATE users SET name='$name_',email='$email_',password='$password_',age=$age_,gender='$gender_',weight='$weight_',height='$height_',fitness_level='$fitness_level_',fitness_goal='$fitness_goal_',physical_activity='$activity_type_',activity_level='$activity_level_',workout_days='$workout_days_' WHERE id = $id";
        if ($query = mysqli_query($db, $sql)) {
            if ($workout_days_ != $workout_days) {
                $sql_delete = "DELETE FROM user_plans WHERE user_id = $id";
                $query_delete = mysqli_query($db, $sql_delete);
            }

            header("refresh:0");
        } else {
            echo "<script>alert('Profile Doesnot Updated Successfully')</script>";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Profile</title>
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
        <!-- User Profile Start -->

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 m-auto">
                        <div class="card mb-4 shadow">
                            <div class="card-header bg-primary text-white">Account Details</div>
                            <div class="card-body">
                                <form action="user_profile.php" method="POST">
                                    <!-- Name -->
                                    <div class="mb-3">
                                        <label for="name" class="small mb-1">Full Name</label>
                                        <input id="name" name="name" type="text" value="<?= $name; ?>" class="form-control" placeholder="Enter your name" required />
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <label for="email" class="small mb-1">Email</label>
                                            <input id="email" name="email" type="email" value="<?= $email; ?>" class="form-control" placeholder="Enter your email" required />
                                        </div>
                                        <!-- Password -->
                                        <div class="col-md-6">
                                            <label for="password" class="small mb-1">Password</label>
                                            <input id="password" name="password" type="password" value="<?= $password; ?>" class="form-control" placeholder="Enter your password" required />
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Age -->
                                        <div class="col-md-6">

                                            <label for="age" class="small mb-1">Age</label>
                                            <input id="age" name="age" type="number" min="0" value="<?= $age; ?>" class="form-control" placeholder="Enter your age" required />
                                        </div>
                                        <!-- Gender -->
                                        <div class="col-md-6">
                                            <label for="gender" class="small mb-1">Gender</label>
                                            <select id="gender" name="gender" class="form-control" required>
                                                <option value="0" <?= ($gender == 0) ? "selected" : "" ?>>Male</option>
                                                <option value="1" <?= ($gender == 1) ? "selected" : "" ?>>Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row gx-3 mb-3">
                                        <!-- Height -->
                                        <div class="col-md-6">
                                            <label for="height" class="small mb-1">Height (cm)</label>
                                            <input id="height" name="height" type="number" min="0" value="<?= $height; ?>" class="form-control" placeholder="Enter your height" required />
                                        </div>
                                        <!-- Weight -->
                                        <div class="col-md-6">
                                            <label for="weight" class="small mb-1">Weight (kg)</label>
                                            <input id="weight" name="weight" type="number" min="0" value="<?= $weight; ?>" class="form-control" placeholder="Enter your weight" required />
                                        </div>
                                    </div>
                                    <div class="row gx-4 mb-3">

                                        <!-- Workout Days -->
                                        <div class="col-md-4">
                                            <label for="days" class="small mb-1">Workout Days</label>
                                            <select id="days" name="days" class="form-control" required>
                                                <option value="3" <?= ($workout_days == 3) ? "selected" : "" ?>>3 days</option>
                                                <option value="4" <?= ($workout_days == 4) ? "selected" : "" ?>>4 days</option>
                                                <option value="5" <?= ($workout_days == 5) ? "selected" : "" ?>>5 days</option>
                                                <option value="6" <?= ($workout_days == 6) ? "selected" : "" ?>>6 days</option>
                                            </select>
                                        </div>

                                        <!-- Fitness Goal -->
                                        <div class="col-md-4">
                                            <label for="fitness_goal" class="small mb-1">Fitness Goal</label>
                                            <select id="fitness_goal" name="fitness_goal" class="form-control" required>
                                                <option disabled>Choose a fitness goal</option>
                                                <option <?= (strtoupper($fitness_goal) == strtoupper('lose weight')) ? "selected" : "" ?>>Lose Weight</option>
                                                <option <?= (strtoupper($fitness_goal) == strtoupper('gain weight')) ? "selected" : "" ?>>Gain Weight</option>
                                                <option <?= (strtoupper($fitness_goal) == strtoupper('maintain weight')) ? "selected" : "" ?>>Maintain Weight</option>
                                            </select>
                                        </div>
                                        <!-- Fitness Level -->
                                        <div class="col-md-4">
                                            <label for="fitness_level" class="small mb-1">Fitness Level</label>
                                            <select id="fitness_level" name="fitness_level" class="form-control" required>
                                                <option disabled>Choose fitness level</option>
                                                <option <?= (strtoupper($fitness_level) == strtoupper('beginner')) ? "selected" : "" ?>>Beginner</option>
                                                <option <?= (strtoupper($fitness_level) == strtoupper('intermediate')) ? "selected" : "" ?>>Intermediate</option>
                                                <option <?= (strtoupper($fitness_level) == strtoupper('advanced')) ? "selected" : "" ?>>Advanced</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Activity Type -->
                                        <div class="col-md-6">
                                            <label for="activity_type" class="small mb-1">Activity Type</label>
                                            <select id="activity_type" name="activity_type" class="form-control" required>
                                                <option disabled>Choose physical activity</option>
                                                <option <?= (strtoupper($activity_type) == strtoupper('bodybuilding')) ? "selected" : "" ?>>Bodybuilding</option>
                                                <option <?= (strtoupper($activity_type) == strtoupper('powerlifting')) ? "selected" : "" ?>>Powerlifting</option>
                                            </select>
                                        </div>
                                        <!-- Activity Level -->
                                        <div class="col-md-6">
                                            <label for="activity_level" class="small mb-1">Activity Level</label>
                                            <select id="activity_level" name="activity_level" class="form-control" required>
                                                <option disabled>Choose activity level</option>
                                                <option <?= (strtoupper($activity_level) == strtoupper('sedentary')) ? "selected" : "" ?>>Sedentary</option>
                                                <option <?= (strtoupper($activity_level) == strtoupper('lightly active')) ? "selected" : "" ?>>Lightly Active</option>
                                                <option <?= (strtoupper($activity_level) == strtoupper('moderately active')) ? "selected" : "" ?>>Moderately Active</option>
                                                <option <?= (strtoupper($activity_level) == strtoupper('very active')) ? "selected" : "" ?>>Very Active</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button name="save_btn" class="btn btn-primary" type="submit">Update Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- User Profile End -->
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