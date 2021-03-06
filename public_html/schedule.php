<?php session_save_path("/home/p/p2n8/php");
  session_start();?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<?php if(!isset($_SESSION['username'])) : ?>
  <body>
  <!-- Adding Navigation Bar-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Transit</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="./schedule.php">Schedule</a></li>
            <li><a href="./register.php">Register</a></li>
            <li><a href="http://www.cs.ubc.ca/~laks/cpsc304/project.html">About</a></li>
            <li><a href="http://www.omfgdogs.com">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<?php else:?>
    <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Transit</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="schedule.php">Schedule</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="http://www.cs.ubc.ca/~laks/cpsc304/project.html">About</a></li>
            <li><a href="http://www.omfgdogs.com">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="changepass.php">Change Password</a></li>
            <li><a href="signout.php">Sign Out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<?php endif;?>
    <div class="container">
      <h2>Bus Schedule</h2>       
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Transit ID</th>
              <th>Arrivals</th>
              <th>Departures</th>
              <th>Destination</th>
              <th>Travel Time</th>
            </tr>
          </thead>
        <?php
        $usern = $_SESSION['username'];
        $conn = oci_connect("ora_p2n8", "a36523124", "ug");
        $results = oci_parse($conn, "select * from schedule");
        oci_execute($results);
        while ($row = oci_fetch_array($results, OCI_BOTH)) {
          echo "<tbody><tr><td>" . $row["TRANSITID"] . " </td><td>"  . $row["ARRIVALS"] . " </td>
          <td>" . $row["DEPARTURES"] . " </td><td>" . $row["DESTINATION"] . " </td><td>" . $row["TRAVELTIME"] . " </td></tr></tbody>";
        }
        /*
        $results = oci_parse($conn, "select * from customers");
        oci_execute($results);
        while ($row = oci_fetch_array($results, OCI_BOTH)) {
          echo "<tbody><tr><td>" . $row["USERNAME"] . " </td><td>"  . $row["USERNAME"] . " </td>
          <td>" . $row["USERNAME"] . " </td><td>" . $row["USERNAME"] . " </td><td>" . $row["USERNAME"] . " </td></tr></tbody>";
        }
        */
        oci_close($conn);
        ?>
        </table>
      </div>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>