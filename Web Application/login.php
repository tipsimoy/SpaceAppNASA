<?php
// Login
session_start();
$email = $_POST['username'];
$password = $_POST['password'];
$hash = md5($email.$password);

$con=mysqli_connect("localhost","root","","simoy");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM users where email='$email' and password='$password' and hash='$hash'";

if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  if($rowcount){
  	//Login now
  	$_SESSION['key'] = $hash;
  	header("Location: home.php");
  }else{
  	header("Location: index.php?notify=failed");
  }
  mysqli_free_result($result);
  }

mysqli_close($con);
echo $email." ".$password." ".$hash;
?>