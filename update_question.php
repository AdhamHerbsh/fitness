<?php
include("conn.php");
$faq_id = $_GET['id'];
$sql_faq = "SELECT * FROM faq WHERE id=$faq_id";
$query_faq = mysqli_query($db, $sql_faq);
foreach ($query_faq as $row_faq) {
    $question_ = $row_faq['question'];
    $answer_ = $row_faq['answer'];
}

if (isset($_POST['save_btn'])) {
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $sql = "UPDATE faq SET question='$question',answer='$answer' WHERE id = $faq_id";
    if ($query = mysqli_query($db, $sql)) {
        header("refresh:0");
    } else {
        echo "<script>alert('Question Doesnot Updated Successfully')</script>";
    }
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
    
    <!-- Udpate Question Start -->
    <section>
        <div class="container-fluid p-4">
            <div class="mb-3 text-center">
                <h5 class="display-5 text-uppercase mb-0">FAQ</h5>
                <h2 class="text-primary text-uppercase">Update Question</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="bg-dark p-5 rounded shadow">
                        <form action="update_question.php?id=<?= $faq_id; ?>" method="POST">
                            <div class="row g-4">
                                <!-- Question -->
                                <div class="col-12">
                                    <label for="question" class="form-label text-light h5">Question</label>
                                    <textarea id="question" name="question" class="form-control bg-light border-0 px-4 py-3" rows="3" placeholder="Enter your question" required><?= $question_; ?></textarea>
                                </div>

                                <!-- Answer -->
                                <div class="col-12">
                                    <label for="answer" class="form-label text-light h5">Answer</label>
                                    <textarea id="answer" name="answer" class="form-control bg-light border-0 px-4 py-3" rows="3" placeholder="Enter the answer" required><?= $answer_; ?></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 text-center mt-4">
                                    <button name="save_btn" class="col-6 mx-auto btn btn-primary" type="submit">Update Question</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Update Question End -->

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