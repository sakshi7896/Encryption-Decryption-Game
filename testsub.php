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
$result=mysqli_query($conn,"SELECT Q1+Q2+Q3+Q4+Q5+Q6+Q7+Q8+Q9+Q10 as Total FROM scores where T_id='$tid'");
if($row = mysqli_fetch_assoc($result))
{
$scr=$row["Total"];
}
echo "<div class='panel panel-info'><div class='panel-heading'><center><p>your score:$scr<p></center></div>";
if($scr>=40)
{
echo"<center><form action='a7.php' method='post'><div class='panel-body'><strong><h4>Congratulations!! You have qualified for round 2!
<br><br><a href='round2.html'><input type='button' value='ROUND 2'></a></h4></strong></div>";
}
else
{
echo "<center><form action='a7.php' method='post'><div class='panel-body'><strong><h4>Sorry!you could not qualify to the next round!!</h4></strong>";
}
?>
</body>
</html>