<?php

require('../connection.php');
// retrieving candidate(s) results based on position
if (isset($_POST['Submit'])){
  $position = addslashes( $_POST['position'] );
  
  $results = mysql_query("SELECT * FROM tbCandidates where candidate_position='$position'");

  $row1 = mysql_fetch_array($results); // for the first candidate
  $row2 = mysql_fetch_array($results); // for the second candidate
  if ($row1){
  $candidate_name_1=$row1['candidate_name']; // first candidate name
  $candidate_1=$row1['candidate_cvotes']; // first candidate votes
  }

  if ($row2){
  $candidate_name_2=$row2['candidate_name']; // second candidate name
  $candidate_2=$row2['candidate_cvotes']; // second candidate votes
  }
}

?> 

<?php

// retrieving positions sql query
$positions=mysql_query("SELECT * FROM tbPositions")
or die("There are no records to display ... \n" . mysql_error()); 

?>

<?php

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])) {
 header("location:access-denied.php");
}

?>

<?php

if(isset($_POST['Submit'])) {
  $totalvotes=$candidate_1+$candidate_2;
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>online voting</title>
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <script language="JavaScript" src="js/admin.js"></script>
</head>

<body id="top">

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    
    <div id="logo" class="fl_left">
      <h1><a href="admin.php">ONLINE VOTING</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="admin.php">Home</a></li>
        <li><a class="drop" href="#">Admin Panel</a>
          <ul>
            <li><a href="manage-admins.php">Admin Manager</a></li>
            <li><a href="positions.php">Manage Parties</a></li>
            <li><a href="candidates.php">Manage Members</a></li>
            <li><a href="refresh.php">Results</a></li>
          </ul>
        </li>
        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>

<div id="header" class="hoc clear"></div>

<div>
  <div>
    <table width="420" align="center">
      <form name="fmNames" id="fmNames" method="post" action="refresh.php" onSubmit="return positionValidate(this)">
        <tr>
          <td bgcolor="#5D7B9D" style="color:#ffffff">Choose Party</td>
          <td bgcolor="#5D7B9D" style="color:#000000">
            <div class="my-select">
              <SELECT NAME="position" id="position">
                <OPTION  VALUE="select"><p style="color:black";>Select</p>
                <?php 

                //loop through all table rows
                while ($row=mysql_fetch_array($positions)) {
                  echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
                }

                ?>
              </SELECT>

            </div>

          </td>
          <td bgcolor="#5D7B9D" style="color:#000000"><input type="submit" name="Submit" value="See Results" class="my-button" /></td>
        </tr>
        <tr>
        </tr>
      </form> 
    </table>

    <?php if(isset($_POST['Submit'])){echo $candidate_name_1;} ?> :<br>
    <img src="images/candidate-1.gif" height="10" 
    width="<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>" >

    <?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
    <br>Vote(s) <?php if(isset($_POST['Submit'])){ echo $candidate_1;} ?>

    <br>
    <br>

    <?php if(isset($_POST['Submit'])){ echo $candidate_name_2;} ?> :<br>
    <img src="images/candidate-2.gif" height="10" 
    width="<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>" >

    <?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
    <br>Vote(s) <?php if(isset($_POST['Submit'])){ echo $candidate_2;} ?>
  
  </div>
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