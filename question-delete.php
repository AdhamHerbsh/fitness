<?php
include("conn.php");
$id = $_GET['id'];
$sql = "DELETE FROM faq WHERE id = $id";
$query = mysqli_query($db,$sql);
header("location:questions.php");
?>