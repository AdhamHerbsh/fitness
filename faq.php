<?php
include("conn.php");
$sql_faqs = "SELECT * FROM faq";
$query_faqs = mysqli_query($db, $sql_faqs);
$count_faqs = mysqli_num_rows($query_faqs);
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
    <style>
        .card-title:hover {
            cursor: pointer;
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
                    <?php
                    if (isset($_SESSION['type'])) {
                        include("header.php");
                    } else {
                        include("guest_header.php");
                    }
                    ?>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <main>
        <!-- FAQ Section Start -->
        <section>

            <div class="container">
                <!-- Section Title -->
                <div class="mb-5 text-center">
                    <h2 class="text-primary text-uppercase">Frequently Asked Questions</h2>
                </div>

                <!-- FAQ Grid -->
                <div class="row g-4 justify-content-center">
                    <?php foreach ($query_faqs as $row_faqs) { ?>
                        <div class="col-lg-6 col-md-8">
                            <!-- FAQ Card -->
                            <div class="card bg-dark text-white rounded shadow-lg border-0 h-100">
                                <div class="card-body">
                                    <a class="card-title text-uppercase text-primary text-decoration-none"  data-bs-toggle="collapse" href="#<?php echo $row_faqs['id'] ?>" role="button" aria-expanded="true" aria-controls="<?php echo $row_faqs['id'] ?>"><?= $row_faqs['question']; ?></a>
                                    <p class="card-text collapse" id="<?php echo $row_faqs['id'] ?>" ><?= $row_faqs['answer']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- FAQ Section End -->
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
    <script src="lib/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="lib/aos/aos.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.card-title').on('click', function() {
                // Toggle the 'd-none' class on the corresponding card text when the title is clicked
                $(this).siblings('.card-text').toggleClass('d-block');
            });
        });
    </script>

</body>

</html>