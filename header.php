<?php
if (isset($_POST['logout_btn'])) {
    include('logout.php');
}
if (isset($_SESSION['type'])) {
    if ($_SESSION['type'] == 'admins') {
        $hide_admins = '';
        $hide_users = 'none';
        $hide_coaches = 'none';
    } else {
        if ($_SESSION['type'] == 'coaches') {
            $hide_admins = 'none';
            $hide_users = 'none';
            $hide_coaches = '';
        } else {
            if ($_SESSION['type'] == 'users') {
                $hide_admins = 'none';
                $hide_users = '';
                $hide_coaches = 'none';
            } else {
                $hide_admins = 'none';
                $hide_users = 'none';
                $hide_coaches = 'none';
            }
        }
    }
} else {
    $hide_admins = 'none';
    $hide_users = 'none';
    $hide_coaches = 'none';
}
?>



<!-- Header.php -->
<div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
    <div class="navbar-nav mr-auto py-0">
        <!-- User Links -->
        <a href="home.php" class="nav-item nav-link" style="display: <?php echo $hide_users; ?>;">Home</a>

        <!-- Admin Links -->
        <a href="coaches.php" class="nav-item nav-link" style="display: <?php echo $hide_admins; ?>;">Coaches</a>
        <a href="users.php" class="nav-item nav-link" style="display: <?php echo $hide_admins; ?>;">Users</a>
        <a href="questions.php" class="nav-item nav-link" style="display: <?php echo $hide_admins; ?>;">FAQ</a>

        <!-- Coach Links -->
        <a href="coach_plans.php" class="nav-item nav-link" style="display: <?php echo $hide_coaches; ?>;">Workout Plans</a>
        <a href="coach_profile.php" class="nav-item nav-link" style="display: <?php echo $hide_coaches; ?>;">Profile</a>

        <!-- User-Specific Links -->
        <a href="user_plans.php" class="nav-item nav-link" style="display: <?php echo $hide_users; ?>;">Workout Plans</a>
        <a href="user_calories.php" class="nav-item nav-link" style="display: <?php echo $hide_users; ?>;">Daily Calories</a>
        <a href="add_chat.php" class="nav-item nav-link" style="display: <?php echo $hide_users; ?>;">Chatbot</a>
        <a href="faq.php" class="nav-item nav-link" style="display: <?php echo $hide_users; ?>;">FAQ</a>
        <a href="user_profile.php" class="nav-item nav-link" style="display: <?php echo $hide_users; ?>;">Profile</a>
    </div>

    <!-- Logout Button -->
    <a href="logout.php" class="btn btn-primary">Logout</a>
</div>
