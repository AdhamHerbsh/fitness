<?php
include("conn.php");
if (isset($_POST['c_signup_btn'])) {
	$c_email = $_POST['c_email'];
	$c_age = $_POST['c_age'];
	$c_name = $_POST['c_name'];
	$c_pass = $_POST['c_pass'];
	$c_gender = $_POST['c_gender'];
	$type = 'coaches';
$sql_email = "SELECT * FROM coaches WHERE email like '$c_email'";
$query_email = mysqli_query($db,$sql_email);
$count_email = mysqli_num_rows($query_email);
if($count_email != 0) 
{
	echo "<script>alert('register account failed your email already exists')</script>";
}  
else{
    $sql = "INSERT INTO `coaches`(`name`,`email`,`gender`,`age`,`password`)
	 VALUES('$c_name','$c_email','$c_gender','$c_age','$c_pass') ";
	if ($query = mysqli_query($db, $sql)) {
		$id = mysqli_insert_id($db);
		$_SESSION['id'] = $id;
		$_SESSION['type'] = 'coaches';
		header("location:coach_plans.php");
	} else {

		echo "<script>alert('register account failed ,check your inputs')</script>";
	}
}
}

if (isset($_POST['signup_btn'])) {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$weight = $_POST['weight'];
	$password = $_POST['pass'];
	$age = $_POST['age'];
	$height = $_POST['height'];
	$sql_email = "SELECT * FROM users WHERE email like '$email'";
	$query_email = mysqli_query($db,$sql_email);
	$count_email = mysqli_num_rows($query_email);
	if($count_email != 0) 
	{
		echo "<script>alert('register account failed your email already exists')</script>";
	}  
	else{
	$sql = "INSERT INTO `users`(`name`,`email`,`gender`,`weight`,`height`,`age`,`password`) 
	VALUES('$name','$email','$gender','$weight','$height','$age','$password') ";
	if ($query = mysqli_query($db, $sql)) {
		$id = mysqli_insert_id($db);
		$_SESSION['id'] = $id;
		$_SESSION['type'] = 'users';
		header("location:profile.php");
		
	} else {
		echo "<script>alert('register account failed ,check your inputs')</script>";
	}
}
}
?>
<!DOCTYPE html>
<html lang="en">

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
            max-width: 550px;
            margin: 10vh auto;
            padding: 20px;
            background: rgba(34, 36, 41, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.3);
            color: #fff;
        }

        .form-label {
            color: #fff;
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
        .tab.active {
            color: #FB5B21;
            border-bottom: 2px solid #FB5B21;
        }

        .btn-custom {
            background-color: #FB5B21;
            border: none;
        }

        .btn-custom:hover {
            background-color: #f34e0e;
        }

		.form-control, .form-select, .select-option {
            background: #121212;
            color: #fff;
        }

        .form-control::placeholder {
            color: #aaa;
        }
        .form-footer {
            text-align: center;
            margin-top: 20px;
        }

        .form-footer a {
            color: #FB5B21;
            text-decoration: none;
        }

        .form-footer a:hover {
            color: #fff;
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            .login-wrap {
                padding: 15px;
            }

            .tab {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
<div class="bg-image"></div>
    <div class="container">
		<div class="row justify-content-center">
		<div class="login-wrap">
		<input id="tab-1" type="radio" name="tab" class="d-none" checked>
		<label for="tab-1" class="tab pb-2">Sign Up</label>
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active tab" id="coach-tab" data-bs-toggle="tab" data-bs-target="#coach"
                        type="button" role="tab" aria-controls="coach" aria-selected="true">Coach</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link tab" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button"
                        role="tab" aria-controls="user" aria-selected="false">User</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <!-- Coach Form -->
                <div class="tab-pane fade show active" id="coach" role="tabpanel" aria-labelledby="coach-tab">
                    <form action="signup.php" method="post">
                        <div class="mb-3">
                            <label for="c_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="c_name" name="c_name" placeholder="Enter Full Name" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="c_age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="c_age" name="c_age" min="0" placeholder="Enter Age" required>
                            </div>
                            <div class="col-md-6">
                                <label for="c_gender" class="form-label">Gender</label>
                                <select class="form-select" id="c_gender" name="c_gender">
                                    <option selected disabled>Choose gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="c_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="c_email" name="c_email" placeholder="Enter Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="c_pass" class="form-label">Password</label>
                            <input type="password" class="form-control" id="c_pass" name="c_pass" minlength="8" placeholder="Enter Password" required>
                        </div>
                        <button type="submit" name="c_signup_btn" class="btn btn-primary col-12">Sign Up</button>

                        <div class="form-footer">
                            <a href="login.php">Already have an account? Login</a><br>
                            <a href="index.php">Back to home</a>
                        </div>
                    </form>
                </div>

                <!-- User Form -->
                <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
                    <form action="signup.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" name="age" min="0" placeholder="Enter Age" required>
                            </div>
                            <div class="col-md-6">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" name="gender">
                                    <option class="select-option" selected disabled>Choose gender</option>
                                    <option class="select-option" value="male">Male</option>
                                    <option class="select-option" value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="height" class="form-label">Height</label>
                                <input type="number" class="form-control" id="height" name="height" min="0" placeholder="Enter Height Length" required>
                            </div>
                            <div class="col-md-6">
                                <label for="weight" class="form-label">Weight</label>
                                <input type="number" class="form-control" id="weight" name="weight" min="0" placeholder="Enter Weight" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" required>
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label">Password</label>
                            <input type="password" class="form-control" id="pass" name="pass" minlength="8" placeholder="Enter Password" required>
                        </div>
                        <button type="submit" name="signup_btn" class="btn btn-primary col-12">Sign Up</button>

                        <div class="form-footer">
                            <a href="login.php">Already have an account? Login</a><br>
                            <a href="index.php">Back to home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
		</div>	
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
