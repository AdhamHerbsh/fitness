<?php
include("conn.php");

if (isset($_POST['login_btn'])) {
    $email = $_POST['l_email'];
    $password = $_POST['l_pass'];
    if(isset($_POST['type'])){
        $type = $_POST['type'];
    }else{
        $type = "users";
    }

    $sql = "SELECT * FROM `$type` WHERE (`email` like '$email' AND `password` like '$password')";
    $query = mysqli_query($db, $sql);
    if (mysqli_num_rows($query) == 0) {
        echo "<script> localStorage.setItem('status','401UNAUTH'); </script>";
    } else {
        foreach ($query as $row) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['type'] = $type;
        }
        if ($type == "admins") {
            header("location:users.php");
        } else {
            if ($type == 'users') {
                header("location:home.php");
            } else {
                header("location:coach_plans.php");
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Fitness Level</title>

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
    <link href="lib/aos/aos.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">






    <style>
        .login-wrap {
            margin: 10vh auto;
        }

        .login-html {
            background: rgba(34, 36, 41, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 12px 15px rgba(0, 0, 0, .24), 0 17px 50px rgba(0, 0, 0, .19);
        }

        .tab {
            font-size: 22px;
            color: #fff;
            text-align: center;
            cursor: pointer;
            border-bottom: 2px solid transparent;
        }

        .tab:hover {
            border-color: #FB5B21;
        }

        .form-control,
        .form-select,
        .select-option {
            background: #121212;
            color: #fff;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .btn-primary {
            background-color: #FB5B21;
            border: none;
        }

        .btn-primary:hover {
            background-color: #e34c1a;
        }

        .text-link {
            color: #FB5B21;
        }

        .text-link:hover {
            color: #fff;
        }

        .login-options {
            text-align: center;
            margin-top: 20px;
        }

        .hr {
            background-color: rgba(255, 255, 255, .2);
        }
    </style>
</head>

<body>
    <div class="bg-image"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 login-wrap">
                <div id="wrong-message" class="m-auto alert alert-danger alert-dismissible mb-3 fade d-none" role="alert">
                    <strong>Wrong Username or Password <i class="fa fa-exclamation"></i></strong>
                    <br />
                    You Should write your username and password correct...
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="login-html text-white">
                    <input id="tab-1" type="radio" name="tab" class="d-none" checked>
                    <label for="tab-1" class="tab pb-2">Sign In</label>

                    <form action="login.php" method="post" class="mt-4">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="l_email" class="form-control" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label">Password</label>
                            <input type="password" id="pass" name="l_pass" class="form-control" placeholder="Enter your password" minlength="8" required>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select name="type" id="type" class="form-select">
                                <option selected disabled>Choose Type</option>
                                <option class="select-option" value="admins">Admin</option>
                                <option class="select-option" value="users">User</option>
                                <option class="select-option" value="coaches">Coach</option>
                            </select>
                        </div>

                        <button type="submit" name="login_btn" class="btn btn-primary col-12">LOGIN</button>

                        <hr class="my-4 hr">

                        <div class="login-options">
                            <a href="signup.php" class="text-link">Don't have an account? <u>Sign Up</u></a><br>
                            <a href="index.php" class="text-link">Back to home? <u>Home</u></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/aos/aos.js"></script>

    <script type="text/javascript">
            var status = localStorage.getItem("status");
            
            if(status === "401UNAUTH"){
                document.getElementById("wrong-message").classList.remove("d-none");
                document.getElementById("wrong-message").classList.add("show");
                localStorage.setItem("status","");
            }
    </script>

</body>

</html>