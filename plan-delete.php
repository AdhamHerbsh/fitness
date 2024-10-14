<?php
include("conn.php");
$id = $_GET['id'];
$sql = "DELETE FROM workout_plans WHERE id = $id";
$query = mysqli_query($db,$sql);
header("location:coach_plans.php");
?>