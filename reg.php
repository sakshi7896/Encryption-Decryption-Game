<html lang="en">
  <head>
    <meta charset="utf-8"> 
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "themazerunner";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else
{
//if(isset($_POST["p1"])
$pl1=$_POST["p1"];
//if(isset($_POST["p2"])
$m=$_POST["mail"];
$cont=$_POST["contact"];
echo "
<div style='text-align:center;'>
<div class='panel panel-success'>
      <div class='panel-heading'>Hello ".$pl1." and ".$pl2."<br>";
$sql = "INSERT INTO regestration (players,contact,mail)VALUES ('$pl1', '$m',$cont)";
if (mysqli_query($conn,$sql)) {
    echo "<h5><b>You have been Registered<b></h5></div>";
} else {
    echo "arushi Error: " . $sql . "<br>" . mysqli_error($conn);
}
$l=mysqli_insert_id($conn);
mysqli_query($conn,"INSERT INTO scores(T_id) VALUES($l)");
echo "<div class='panel-body'><b><br>Your Team Id: ".$l;
//session_start();
//$_SESSION['tid']=$l;
mysqli_close($conn);
}
?>
</body>
</html>