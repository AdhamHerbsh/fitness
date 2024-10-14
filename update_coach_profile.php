<?php
include("conn.php");
$id = $_GET['id'];
$sql_coach = "SELECT * FROM coaches WHERE id=$id";
$query_coach = mysqli_query($db, $sql_coach);
foreach ($query_coach as $row_coach) {
    $name = $row_coach['name'];
    $email = $row_coach['email'];
    $password = $row_coach['password'];
    $age = $row_coach['age'];
    $gender = $row_coach['gender'];
}

if (isset($_POST['save_btn'])) {
    $name_ = $_POST['name'];
    $email_ = $_POST['email'];
    $password_ = $_POST['password'];
    $age_ = $_POST['age'];
    $gender_ = $_POST['gender'];
    ///////////////////new/////////////////////////////
    $sql_email = "SELECT * FROM coaches WHERE (email like '$email_' AND id != $id)";
    $query_email = mysqli_query($db, $sql_email);
    $count_email = mysqli_num_rows($query_email);
    if ($count_email != 0) {
        echo "<script>alert('this email already exists')</script>";
    } else {
        ///////////////////////////////////////////////////

        $sql = "UPDATE coaches SET name='$name_',email='$email_',password='$password_',age=$age_,gender='$gender_' WHERE id = $id";
        if ($query = mysqli_query($db, $sql)) {
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

                <!-- Update Coach Start -->

                <section>
        <div class="container">
            <div class="row">
                <div class="col-xl-10 m-auto">
                    <div class="card mb-4 shadow">
                        <div class="card-header bg-primary text-white">Update Coach Profile</div>
                        <div class="card-body">
                        <form action="update_coach_profile.php?id=<?= $id; ?>" method="POST">
                                    <!-- Name -->
                                    <div class="mb-3">
                                        <label for="name" class="small mb-1">Name</label>
                                        <input id="name" name="name" type="text" value="<?= $name; ?>" class="form-control" placeholder="Enter your name" required />
                                    </div>
                                    <div class="row">
                                        <!-- Email -->
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="small mb-1">Email</label>
                                            <input id="email" name="email" type="email" value="<?= $email; ?>" class="form-control" placeholder="Enter your email" required />
                                        </div>
                                        <!-- Password -->
                                        <div class="col-md-6 mb-3">
                                            <label for="password" class="small mb-1">Password</label>
                                            <input id="password" name="password" type="password" value="<?= $password; ?>" class="form-control" placeholder="Enter a password" required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Age -->
                                        <div class="col-md-6 mb-3">
                                            <label for="age" class="small mb-1">Age</label>
                                            <input id="age" name="age" type="number" min="0" value="<?= $age; ?>" class="form-control" placeholder="Enter your age" required />
                                        </div>

                                        <!-- Gender -->
                                        <div class="col-md-6 mb-3">
                                            <label for="gender" class="small mb-1">Gender</label>
                                            <select id="gender" name="gender" class="form-select bg-light">
                                                <option <?php if (strtoupper($gender) == strtoupper("male")) echo "selected"; ?>>Male</option>
                                                <option <?php if (strtoupper($gender) == strtoupper("female")) echo "selected"; ?>>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                <!-- Submit Button -->
                                <div class="col-12">
                                <button name="save_btn" class="btn btn-primary" type="submit">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Update Coach End -->
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