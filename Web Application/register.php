<?php

@$email = $_POST['email'];
@$password = $_POST['password'];
@$re_password = $_POST['re_password'];
@$hash = md5($email.$password);

echo $email." ".$password." ".$hash;

if($password==$re_password && $password!=null && $re_password !=null){
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

	$sql = "INSERT INTO users (email, password, hash)
	VALUES ('$email','$password','$hash')";

	if ($conn->query($sql) === TRUE) {
		header("Location: index.php?notif=success");
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}else{
	header("Location: signup.php");
}

?>