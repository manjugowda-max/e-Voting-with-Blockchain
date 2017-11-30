<?php

require('connection.php');

session_start();

if(empty($_SESSION['member_id'])){
  header("location:access-denied.php");
}

?>

<?php

$positions = mysql_query("SELECT * FROM tbPositions")
or die("There are no records to display ... \n" . mysql_error()); 

?>

<?php

if (isset($_POST['Submit'])) {
  $position = addslashes( $_POST['position'] ); 
   
  $result = mysql_query("SELECT * FROM tbCandidates WHERE candidate_position='$position'")
  or die(" There are no records at the moment ... \n"); 
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>online voting</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <script language="JavaScript" src="js/user.js"></script>
  <script type="text/javascript">
    function getVote(int)
    {
      if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
      }
      else
      {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }

      if(confirm("Your vote is for "+int))
      {
          xmlhttp.open("GET","save.php?vote="+int,true);
          xmlhttp.send();
      }
      else
      {
          alert("Choose another candidate "); 
      }
      
    }

    function getPosition(String)
    {
      if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
      }
      else
      {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }

      xmlhttp.open("GET","vote.php?position="+String,true);
      xmlhttp.send();
    }
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      var j = jQuery.noConflict();
      j(document).ready(function() {
            j(".refresh").everyTime(1000,function(i){
                j.ajax({
                  url: "admin/refresh.php",
                  cache: false,
                  success: function(html){
                    j(".refresh").html(html);
                  }
                })
            })
            
        });
       j('.refresh').css({color:"green"});
    });
  </script>
</head>

<body id="top">

<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <div id="logo" class="fl_left">
      <h1><a href="voter.php">ONLINE VOTING</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="voter.php">Home</a></li>
        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>

<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
  <section id="testimonials" class="hoc container clear">
    <h2 class="font-x3 uppercase btmspace-80 underlined"> Online <a href="#">Voting</a></h2>
    <ul class="nospace group">

        <div>
            <table bgcolor="#00FF00" width="420" align="center">
            <form name="fmNames" id="fmNames" method="post" action="vote.php" onSubmit="return positionValidate(this)">
            <tr>
                <td bgcolor="#5D7B9D" >Choose Party</td>
                <td bgcolor="#5D7B9D" style="color:#000000"; ><SELECT NAME="position" id="position" onclick="getPosition(this.value)">
                <OPTION  VALUE="select">Select
                <?php 
                  //loop through all table rows
                  while ($row=mysql_fetch_array($positions)){
                    echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
                  }
                ?>
                </SELECT></td>
                <td bgcolor="#5D7B9D" ><input style="color:#000000";  type="submit" name="Submit" value="See Candidates" /></td>
            </tr>

            <tr>
            </tr>
            </form> 
            </table>

            <table bgcolor="#00FF00" width="270" align="center">
            <form>
            <tr>
                <td bgcolor="#5D7B9D">Candidates:</td>
                <td bgcolor="#5D7B9D"></td>
            </tr>

            <?php
              
                if (isset($_POST['Submit']))
                {
                  while ($row=mysql_fetch_array($result)){
                    
                      echo "<tr>";
                      echo "<td style='background-color:#5D7B9D'>" . $row['candidate_name']."</td>";
                      echo "<td style='background-color:#5D7B9D'><input type='radio' name='vote' value='$row[candidate_name]' onclick='getVote(this.value)' /></td>";
                      echo "</tr>";
                  }
                  mysql_free_result($result);
                  mysql_close($link);
                }
            ?>

            <tr>
                <p><b>NB:</b> Click a circle under a respective candidate to cast your vote. You can't vote more than once. This process can not be undone so think wisely before casting your vote.</p>
            </tr>
            </form>
            </table>
        </div>

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