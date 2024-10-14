<?php
include("conn.php");
$id = $_GET['id'];
$sql = "DELETE FROM coaches WHERE id = $id";
$query = mysqli_query($db,$sql);
header("location:coaches.php");
?>