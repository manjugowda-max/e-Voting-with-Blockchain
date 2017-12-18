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

<!-- <div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href=""></a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href=""></a></li>
      </ul>
    </nav>
  </header>
</div> -->

<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
  <section id="testimonials" class="hoc container clear">
    <h2 class="font-x3 uppercase btmspace-80 underlined"> Online <a href="#">Voting</a></h2>
    <ul class="nospace group">
      <li class="one_half first">
        <blockquote>
          <div id="container">

            <form action="reg-verification.php" method="POST">
              <p><h1>Please Verify Yourself to proceed. </h1></p>
              <p>Press the Start button to start face recognition process.</p>
              <input type="submit" name="start" value="Start" class="my-button">
            </form>

            <?php

            require('connection.php');
            session_start();

      			if( isset($_POST['start']) ) {
              $voterid = $_SESSION['voter_id'];

      			  $result = exec("C:\\Python27\\python.exe C:\\xampp\\htdocs\\e-voting-with-blockchain\\face-recognition\\dataset_creator.py. $voterid");

              $result = exec("C:\\Python27\\python.exe C:\\xampp\\htdocs\\e-voting-with-blockchain\\face-recognition\\trainer.py");

              $_SESSION['login_status'] = 1;
              $login_status = $_SESSION['login_status'];

              $sql = "UPDATE tbmembers SET login_status='$login_status' WHERE voter_id='$voterid'";
              $result = mysql_query( $sql ) or die( mysql_error() ); 
      			  
      			  header( "location: voter.php" );
      			}

            ?>

          </div>
        </blockquote>
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