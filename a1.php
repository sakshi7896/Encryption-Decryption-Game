<?php
session_start();
$tid=$_SESSION['tid'];
$a=$_POST['ans'];
if($a==29)
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "breakthecode";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_query($conn,"UPDATE scores SET Q1=10 WHERE T_id=$tid");
}
  header('Location: /breakthecode2.0/p2.php');
?>
