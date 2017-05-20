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
        <li><a href="#">Question 7</a></li>
        <li><a href="testsub.php">Submit Test</a></li>
	<li><a href="p8.php">Skip question</a></li>
      </ul>
    </div>
<div class="container" >
<div style="text-align:center;">
<form method="post" action="p7.php">
<font color="red"><b>This is keyword cipher!Try this and identify the keyword!<br></font></b>
<label for="fn" ><font color="red"><br>Enter a string:<input type="text"  class="form-control" name="fn"/></label><br>

<input type="submit" class="btn btn-primary btn-md" value="submit" >
</form>
</div>
</div>
<?php	
$x=$_SESSION['tid'];
if(isset($_POST["fn"]))
{
$x=$_POST["fn"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "breakthecode";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$tid=$_SESSION['tid'];
$result=mysqli_query($conn,"SELECT Q7 FROM counters where T_id='$tid'");
if($row = mysqli_fetch_assoc($result))
{
if($row["Q7"]<=5)
{
echo "<br><br>
      <p><strong><div class='panel-heading'><h5><center>current count ".$row["Q7"]."</center></h5></strong><p>";

$result=mysqli_query($conn,"UPDATE counters SET Q7=Q7+1 WHERE T_id=$tid");
$keys=array('b','r','a','m','c','o','h','e','n','d','f','g','i','j','k','l','p','q','s','t','u','v','w','x','y','z');
$x=strtolower($x);
$a='';
		$l=strlen($x);
		for($i=0;$i<$l;$i++)
			{
			$v=ord($x{$i});
			if($v==32)
			$a=$a." ";
			else
				{
				$a=$a.$keys[$v-97];
				}
			}
		echo "<p><strong><h1><center>$a</center></h1></strong></p>";		
} 
}
if($row["Q7"]>5)
{
echo "<div class='panel panel-info'>
      <div class='panel-heading'><p><center><strong><h4>You have tried maximum times! now answer the question</h4></strong></center></p></div>";
echo "<center><form action='a7.php' method='post'><div class='panel-body'><strong><h4>
What is the keyword of this cipher?</h4><h6>HINT:Name of founder of bit torrent</h6></strong>
<br><br><input type='text' name='ans'><br><br></div>
<input type='submit' name='sub' class='btn btn-primary btn-lg'>
</div>
</form></center>";
}
}
?>

</body>	
</html>