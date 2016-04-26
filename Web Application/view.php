<?php

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Simoy Project</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style-logged.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar-fixed navbar-inverse">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="home.php">Simoy Project</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="pull-right nav navbar-nav">
        	<li id="feed">
        		<a>Temperature: 0C Humidity: 0%  MQ2: 0ppm  MQ5: 0ppm  Dust Density: 0mg/m^3</a>
        	</li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="active"><a href="home.php">Home<span class="sr-only">(current)</span></a></li>
          <li><a href="#report" data-toggle="modal" id="dataTrigger" data-target="#report">Report</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  	<div id="rovers"></div>
  
  	<!-- Modal Add new Rover-->
  <div id="report" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Report</h4>
        </div>
        <div class="modal-body">
          <form id="form">
            <div class="form-group">
              <label for="exampleInputEmail1">Temperature</label>
              <input type="number" name="temp" class="form-control" id="temp" placeholder="Temperature">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Humidity</label>
              <input type="number" name="hum" class="form-control" id="hum" placeholder="Humidity">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">MQ2</label>
              <input type="number" name="mq2" class="form-control" id="mq2" placeholder="MQ2">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">MQ5</label>
              <input type="number" name="mq5" class="form-control" id="mq5" placeholder="MQ5">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Dust Density</label>
              <input type="number" name="dust" class="form-control" id="dust" placeholder="Dust Density">
            </div>
        </div>
        <div class="modal-footer">
        <input type="button" id="btnReport" class="btn btn-default" data-dismiss="modal" value="Report"/>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>

    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script-view.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2ZRCpcbVv6zdCPIQUQDLTg3CkhePzPII&callback=initMap"
    async defer></script>
  </body>
</html>