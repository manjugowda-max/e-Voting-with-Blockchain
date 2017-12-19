<?php

require('connection.php');
session_start();

if( empty($_SESSION['member_id'])) {
  header( "location: access-denied.php" );
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Vote-Chain</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <script language="JavaScript" src="js/user.js"></script>
</head>
<body id="top">

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="voter.php">Vote-Chain</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="voter.php">Home</a></li>
        <li><a class="drop" href="#">Voter Pages</a>
          <ul>
            <li><a href="voter-verification.php">Vote</a></li>
            <li><a href="manage-profile.php">Profile Manager</a></li>
          </ul>
        </li>
        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>

<div class="wrapper bgded" style="background-color: #141414;">
  <section id="testimonials" class="hoc container clear">
    <ul class="nospace group">
      <li class="one_third">
        <div id="container">
          <p><h1></h1></p>
        </div>
      </li>
      <li class="one_third">
        <center>
          <div id="container">
            <form action="voter-verification.php" method="POST">
              <p><h1>Please press Start button to start face recognition process.</h1></p>
              <br>
              <input type="submit" name="start" value="Start" class="my-button">
            </form>

            <?php

      			if( isset($_POST['start']) ) {
      			  $voterID = $_SESSION['voter_id'];

      			  $result = exec("C:\\Python27\\python.exe C:\\xampp\\htdocs\\e-voting-with-blockchain\\face-recognition\\recognizer.py. $voterID");

      			  //echo $result;

      			  if( $result=="yes" ) {
                $_SESSION['voter_status'] = 1;

                $voter_status = $_SESSION['voter_status'];
                $sql = "UPDATE tbmembers SET voter_status='$voter_status' WHERE voter_id='$voterID'";
                $result = mysql_query( $sql ) or die( mysql_error() );

      			  	header( "location: vote.php" );
      			  }
      			  else {
      			  	//try again:
      			  	header( "location: voter-verification-failure.php" );
      			  }
      			}

      			?>

          </div>
        </center>
      </li>
    </ul>
  </section>
</div>

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
</html>