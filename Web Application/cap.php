<?php
	//Upload JSON Object
	@$keyIn = $_GET['key'];
	@$object = $_GET['object'];

	if($keyIn!=null && $object != null){


		// Checkpoint
		session_start();
		@$key = $_SESSION['key'];
		if ($key==null) {
		  header("Location: index.php");
		}
		$dbhost = 'localhost';
		  $dbuser = 'root';
		  $dbpass = '';
		  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
		  if(! $conn )
		  {
		    die('Could not connect: ' . mysql_error());
		  }
		  $sql = 'SELECT * from rovers';

		  mysql_select_db('simoy');
		  $retval = mysql_query( $sql, $conn );
		  if(! $retval )
		  {
		    die('Could not get data: ' . mysql_error());
		  }
		  $rovers = array();
		  while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
		  {
		      if($row['hash']!=$key){
		      	header("Location: index.php");
		      }
		  }
		  echo json_encode($rovers);
		  mysql_close($conn);

		//Record
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
		VALUES ('$keyIn','$object')";

		if ($conn->query($sql) === TRUE) {
		header("Location: index.php?notif=success");
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

			$conn->close();
	}else{
		header("Location: index.php");
	}
?>