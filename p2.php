<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
input{max-width:100px;}
body{background-image:url('r1bg.jpg');-moz-background-size: cover;
-webkit-background-size: cover;
background-size: cover;
background-position: top center !important;
background-repeat: no-repeat !important;
background-attachment: fixed;}
.pos{position:absolute; top:500px;right:570px;}
</style>
</head>
<body>
<br>
<div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-center" style='background-color:lightblue;'>
        <li><a href="#"><?php session_start();
$r=$_SESSION['tid'];
 echo "TEAM ID: $r"; 
?></a></li>
        <li><a href="#">Question 2</a></li>
        <li><a href="testsub.php">Submit Test</a></li>
	<li><a href="p3.php">Skip question</a></li>
      </ul>
    </div>
<div class="container" >
<div style="text-align:center;">

<form method="post" action="p2.php">
<font color="red"><b>An Output is generated using 2 numbers.Try this and deduce the logic!<br></font></b>
<label for="fn"><font color="red">Enter first number:<input type="text"  class="form-control" name="fn"/> Range :5-30</label><br>
<label for="sn">Enter second number: <input type="text" class="form-control" name="sn"/> Range :0-1000</label><br>

<input type="submit" class="btn btn-primary btn-md" value="submit" >
</form>
<?php	
$x=$_SESSION['tid'];
session_write_close();
if(isset($_POST["fn"]))
{
$x=$_POST["fn"];
		
$y=$_POST["sn"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "breakthecode";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$tid=$_SESSION['tid'];
$result=mysqli_query($conn,"SELECT Q2 FROM counters where T_id='$tid'");
if($row = mysqli_fetch_assoc($result))
{
if($row["Q2"]<=5)
{
echo "<br><br>
      <p><strong><div class='panel-heading'><h5><center>current count ".$row['Q2']."</center></h5></strong><p>";

$result=mysqli_query($conn,"UPDATE counters SET Q2=Q2+1 WHERE T_id=$tid");

$a=1;
if($x<5||$x>30||$y>1000)
{$str="the numbers should be in the given range";
}
else
{

for($i=1;$i<=$y;$i++)
{
$a=$a*$x;
$a=$a%100;
}
$str=$a;
}
echo "<p><strong><h1><center>$str</center></h1></strong></p>";
} 
}
if($row["Q2"]>5)
{
echo "<div class='panel panel-info'>
      <div class='panel-heading'><p><center><strong><h4>You have tried maximum times! now answer the question</h4></strong></center></p></div>";
echo "<center><form action='a2.php' method='post'><div class='panel-body'><strong><h4>
What will be the output with 29 as 1st number and 7 as second number?</h4></strong>
<br><br><input type='text' name='ans'><br><br></div>
<input type='submit' name='sub' class='btn btn-primary btn-lg'>
</div>
</form></center>";
}
}
?>

</body>	
</html>