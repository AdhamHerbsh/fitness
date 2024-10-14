<?php
include("conn.php");
$plan_id = $_GET['id'];
$user_id = $_SESSION['id'];

$sql = "DELETE FROM user_plans WHERE (user_id=$user_id AND plan_id =$plan_id)";
$query = mysqli_query($db,$sql);
header("location:user_plans.php");
?>