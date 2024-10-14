<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
<style>


h1,h2,h3,h4,h5,h6,p{
  font-family: "Trirong", serif !important;
}
a{
  font-family: "Trirong", serif !important;
}
div{
  font-family: "Trirong", serif !important;
}
li{
  font-family: "Trirong", serif !important;
}

p{
  font-family: "Trirong", serif !important;
}
.text-secondary {
    font-family: "Trirong", serif !important;
}
th,tr,td
{
    font-family: "Trirong", serif !important;
}
button
{
  font-family: "Trirong", serif !important;
}
</style>
</head>

<?php
session_start();
$server = "localhost";
$dbname = "fitness";
$user = "root";
$password = "";
$db = mysqli_connect($server,$user,$password,$dbname);
?>