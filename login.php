<!DOCTYPE html>
<html>
<head>
  <title>Decentralized Voting Platform</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <script language="JavaScript" src="js/user.js"></script>
</head>

<body id="top">

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="index.php">Decentralized Voting Platform</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="index.php">Home</a></li>
      </ul>
    </nav>
  </header>
</div>

<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
  <section id="testimonials" class="hoc container clear">
    <h2 class="font-x3 uppercase btmspace-80 underlined"> Online <a href="#">Voting</a></h2>
    <ul class="nospace group">
      <li class="one_half">
        <blockquote>

          <table style="background-color:powderblue;" width="300" border="0" align="center" cellpadding="0" cellspacing="1">
          <tr>
          <form name="form1" method="post" action="checklogin.php" onSubmit="return loginValidate(this)">
          <td>
          <table style="background-color:powderblue;" width="100%" border="0" cellpadding="3" cellspacing="1" >
          <tr>
          <td style="color:#000000"; width="78" >Email</td>
          <td style="color:#000000"; width="6">:</td>
          <td style="color:#000000"; width="294"><input name="myusername" type="text" id="myusername" class="my-input"></td>
          </tr>
          <tr>
          <td style="color:#000000"; >Password</td>
          <td style="color:#000000"; >:</td>
          <td style="color:#000000"; ><input name="mypassword" type="password" id="mypassword" class="my-input"></td>
          </tr>
          <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td style="color:#000000";><input type="submit" name="Submit" value="Login" class="my-button"></td>
          </tr>
          </table>
          </td>
          </form>
          </tr>
          </table>
          <center>
          <br>Not yet registered? <a href="registeracc.php"><b>Register Here</b></a>
          </center>

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