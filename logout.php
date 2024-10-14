<?php
include("conn.php");
if (isset($_SESSION['type'])) {
    if ($_SESSION['type'] == 'users') {
        $id = $_SESSION['id'];
        $sql_delete = "DELETE FROM chats WHERE user_id = $id";
        $query_delete = mysqli_query($db, $sql_delete);
    }
}
session_destroy();

header('location:login.php');
