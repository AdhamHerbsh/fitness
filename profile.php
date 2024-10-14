<?php
include("conn.php");
$id = $_SESSION['id'];


if (isset($_POST['save_btn'])) {

	$fitness_level = $_POST['fitness_level'];
	$fitness_goal  = $_POST['fitness_goal'];
	$workout_days  = $_POST['workout_days'];
	$activity_level  = $_POST['activity_level'];
	$activity_type  = $_POST['activity_type'];

	$sql = "UPDATE `users` SET fitness_level='$fitness_level',fitness_goal='$fitness_goal',workout_days='$workout_days',activity_level='$activity_level',physical_activity='$activity_type' WHERE id=$id ";
	if ($query = mysqli_query($db, $sql)) {
		$_SESSION['id'] = $id;
		$_SESSION['type'] = 'users';
		header("location:user_plans.php");
	} else {
		echo "<script>alert('register account failed ,check your inputs')</script>";
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
        

        .profile-wrap {
            margin: 10vh auto;
        }

        .profile-html {
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

        .form-control, .form-select, .select-option {
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

        .profile-options {
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
            <div class="col-md-6 col-lg-5 profile-wrap">
                <div class="profile-html text-white">
                    <input id="tab-1" type="radio" name="tab" class="d-none" checked>
                    <label for="tab-1" class="tab pb-2">Complate Personal Details</label>

                    <form action="profile.php" method="post" class="mt-4">
						<!-- Primary Fitness Goal -->
					<div class="mb-3">
							<label for="fitness_goal" class="form-label">Primary Fitness Goal</label>
							<select name="fitness_goal" id="fitness_goal" class="form-select">
								<option selected disabled>Choose Goal</option>
								<option>lose weight</option>
								<option>gain weight</option>
								<option>maintain weight</option>
							</select>
						</div>
						<!-- Level of Experience -->
						<div class="mb-3">
							<label for="fitness_level" class="form-label">Level Of Experience</label>
							<select name="fitness_level" id="fitness_level" class="form-select">
								<option selected disabled>Choose Level</option>
								<option>beginner</option>
								<option>intermediate</option>
								<option>advanced</option>
							</select>
						</div>
						<!-- Physical Activity Type -->
						<div class="mb-3">
							<label for="activity_type" class="form-label">Physical Activity Type</label>
							<select name="activity_type" id="activity_type" class="form-select">
								<option selected disabled>Choose Type</option>
								<option>bodybuilding</option>
								<option>powerlifting</option>
							</select>
						</div>
						<!-- Activity Level -->
						<div class="mb-3">
							<label for="activity_level" class="form-label">Activity Level</label>
							<select name="activity_level" id="activity_level" class="form-select">
								<option selected disabled>Choose Level</option>
								<option>sedentary</option>
								<option>lightly active</option>
								<option>moderately active</option>
								<option>very active</option>
							</select>
						</div>
						<!-- Workout Days -->
						<div class="mb-3">
							<label for="days" class="form-label">Workout Days</label>
							<select name="workout_days" id="workout_days" class="form-select">
								<option selected disabled>Choose Number of Days</option>
								<option value="3">3 days</option>
								<option value="4">4 days</option>
								<option value="5">5 days</option>
								<option value="6">6 days</option>
							</select>
						</div>
						<button type="submit" name="save_btn" class="btn btn-primary col-12 ">Next</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>