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
body{background-image:url('r2img.jpg');-moz-background-size: cover;
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
<font color="gray">
<div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-center" style='background-color:lightblue;'>
        <li><a href="#"><?php session_start();
$r=$_SESSION['tid'];
 echo "TEAM ID: $r"; 
?></a></li>
        <li><a href="#">Round 2</a></li>
        <li><a href="testsub2.php">Submit Test</a></li>
	<li><a href="testsub2.php">Skip question</a></li>
      </ul>
    </div>
	<div class="container" >
<div style="text-align:center;">
<div class='panel panel-success'>
      <div class='panel-heading'>
 <h5><b>The String 
 "The Quick Brown Fox Jumps Over The Lazy Dog"
is encrypted to string 
"Gur Dhvpx Oebja Sbk Whzcf Bire Gur Ynml Qbt"
</b></div></div><br>
<h4><font color="yellow"><div class='panel panel-info'>
      <div class='panel-heading'>Now answer the following question:-<br></div></div>
What is the name of cipher used here?
</font>
<form action ="r2q3.php" method="post">
<h3>ANSWER:
<input type="radio" name="ans" value="1">ROT5

<input type="radio" name="ans" value="2">ROT13
<input type="radio" name="ans" value="3">2ROT7
<br>
<input name="s" type="SUBMIT" value="SUBMIT">
</form>
</div>
</div>
<?php	
$tid=$_SESSION['tid'];
if(isset($_POST["s"]))
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "breakthecode";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if($_POST['ans']=="2")
{
mysqli_query($conn,"UPDATE scores SET R3=10 WHERE T_id=$tid");
}

header('Location: /breakthecode2.0/testsub2.php');
}

?>
</body>
</html>
