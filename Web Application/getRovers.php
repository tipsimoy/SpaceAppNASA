<?php
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
      if($row['hash']==$key){
        array_push($rovers, array( "rovername" => $row['rovername'],"coords"=>$row['coords'],"serial"=>$row['serial'],"hash"=>$row['hash']));
      }
  }
  echo json_encode($rovers);
  mysql_close($conn);
?>