<?php
// Register Rover
@$temp = $_GET['temp'];
@$hum = $_GET['hum'];
@$mq2 = $_GET['mq2'];
@$mq5 = $_GET['mq5'];
@$dust = $_GET['dust'];
$hash = "NORMALUSER";
$data = '{"temp":"'.$temp.'","hum":"'.$hum.'","mq2":"'.$mq2.'","mq5":"'.$mq5.'","dust":"'.$dust.'"}';

if($temp!=null && $hum!=null && $mq2!=null && $mq5!=null && $dust!=null){
	$dbservername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "simoy";

	// Create connection
	$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "INSERT INTO data (hash, data)
	VALUES ('$hash','$data')";

	if ($conn->query($sql) === TRUE) {
		header("Location: home.php?notif=success");
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}else{
	header("Location: home.php");
}

?>