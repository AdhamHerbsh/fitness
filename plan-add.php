<?php
include("conn.php");
$plan_id = $_GET['id'];
$user_id = $_SESSION['id'];

$sql = "INSERT INTO user_plans(user_id,plan_id) VALUES($user_id,$plan_id)";
$query = mysqli_query($db,$sql);
header("location:user_plans.php");
?>