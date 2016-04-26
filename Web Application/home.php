<?php
  session_start();
  $key = $_SESSION['key'];
  if ($key==null) {
    header("Location: index.php?notify=kick");
  }

  
  //session_destroy();
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
        <ul class="nav navbar-nav">
          <li class="active"><a href="home.php">Home<span class="sr-only">(current)</span></a></li>
          <li><a href="#add_rover" data-toggle="modal" data-target="#add">AddRover</a></li>
          <li><a href="#myrovers" data-toggle="modal" id="roversTrigger" data-target="#myrovers">MyRovers</a></li>
          <li><a href="#recent_data" data-toggle="modal" id="dataTrigger" data-target="#data">MyData</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div id="rovers"></div>
  <!-- Trigger the modal with a button -->

  <!-- Modal Add new Rover-->
  <div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Rover</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Name your rover</label>
              <input type="text" name="roverName" class="form-control" id="roverName" placeholder="Name of your rover">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Serial number</label>
              <input type="text" name="serial" class="form-control" id="serial" placeholder="Serial number">
            </div>
          
        </div>
        <div class="modal-footer">
        <input type="button" id="regRover" class="btn btn-default" data-dismiss="modal" value="Register"/>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>

    </div>
  </div>

  <!-- Modal Recent Data Reading-->
  <div id="data" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Recent Data Reading</h4>
        </div>
        <div class="modal-body">
          <table class="table">
              <thead>
                  <tr>
                    <th>Rover Code</th>
                    <th>Temperature</th>
                    <th>Humidity</th>
                    <th>MQ2</th>
                    <th>MQ5</th>
                    <th>Dust Density</th>
                  </tr>
                </thead>
                <tbody id="dataHandler">
                </tbody>
              </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <!-- Modal My Rovers-->
  <div id="myrovers" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">My Rovers</h4>
        </div>
        <div class="modal-body">
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Serial Number</th>
                  <th>API Permalink</th>
                </tr>
              </thead>
              <tbody id="roversHandler">
              </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2ZRCpcbVv6zdCPIQUQDLTg3CkhePzPII&callback=initMap"
    async defer></script>
  </body>
</html>