<?php
$dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  if(! $conn )
  {
    die('Could not connect: ' . mysql_error());
  }
  $sql = 'SELECT * from data';

  mysql_select_db('simoy');
  $retval = mysql_query( $sql, $conn );
  if(! $retval )
  {
    die('Could not get data: ' . mysql_error());
  }
  //$rovers = array();
  $temp=0;
  $hum=0;
  $mq2=0;
  $mq5=0;
  $dust=0;
  $count=0;
  while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
  {
      $data = json_decode($row['data'],true);
      $temp += $data['temp'];
      $hum += $data['hum'];
      $mq2 += $data['mq2'];
      $mq5 += $data['mq5'];
      $dust += $data['dust'];
      $count++;
  }
  //echo $count;
  echo $data = '{"temp":"'.($temp/$count).'","hum":"'.($hum/$count).'","mq2":"'.($mq2/$count).'","mq5":"'.($mq5/$count).'","dust":"'.($dust/$count).'"}';
  mysql_close($conn);
?>