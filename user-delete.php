<?php
include("conn.php");
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id = $id";
$query = mysqli_query($db,$sql);
header("location:users.php");
?>