<?php
// Register Rover
session_start();
@$roverName = $_GET['roverName'];
@$serial = $_GET['serial'];


echo @$coords = $_GET['lat'].",".$_GET['lng'];

if($roverName!=null && $serial!=null){
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

	$sql = "INSERT INTO rovers (rovername, serial, hash, coords)
	VALUES ('$roverName','$serial','".$_SESSION['key']."','$coords')";

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