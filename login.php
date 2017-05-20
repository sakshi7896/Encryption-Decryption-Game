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
$dbname = "breakthecode";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else
{
$tid=$_POST['tid'];
$p=$_POST['pass'];
$result=mysqli_query($conn,"SELECT * from login WHERE T_id='$tid' AND Password='$p'");
$match  = mysqli_num_rows($result);
if($match>0)
{
echo "<div style='text-align:center;'>
<div class='panel panel-success'>
      <div class='panel-heading'>login successfull</div>";
session_start();
$row = mysqli_fetch_assoc($result);
echo "<div class='panel-body'>team id:".$row['T_id']."</div>/<div>";
$_SESSION['tid']=$row['T_id'];
echo "<br><br><a href='round1.html'><input type='button' value='START' class='btn btn-primary btn-md'></a>";
}
else
{
echo "<div class='panel panel-error'>error login";
}
}
?>
</body>
</html>