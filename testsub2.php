<!DOCTYPE html>
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
session_start();
$tid=$_SESSION['tid'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "breakthecode";
$conn = mysqli_connect($servername, $username, $password, $dbname);
//mysqli_query($conn,"UPDATE TABLE scores SET TOTAL=Q1+Q2+Q3+Q4+Q5+Q6+Q7+Q8+Q9+Q10 WHERE T_id='$tid'");
$result=mysqli_query($conn,"SELECT R1+R2+R3 as Total FROM scores where T_id='$tid'");

if($row = mysqli_fetch_assoc($result))
{
$scr=$row["Total"];
}
$result=mysqli_query($conn,"SELECT Q1+Q2+Q3+Q4+Q5+Q6+Q7+Q8+Q9+Q10 as Total1 FROM scores where T_id='$tid'");

if($row = mysqli_fetch_assoc($result))
{
$scr1=$row["Total1"];
}
$scr1=$scr1+$scr;
echo "<div class='panel panel-info'><div class='panel-heading'><center><p>Round 2 score:$scr<p></center></div>";

echo"<center><form ><div class='panel-body'><strong><h4>Your total Score till now is: $scr1
<br><br><a href='round3.html'><input type='button' value='ROUND 3'></a></h4></strong></div>";

?>
</body>
</html>