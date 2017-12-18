<?php

session_start();
require('connection.php');

//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])) {
  header("location:access-denied.php");
} 

//retrive voter details from the tbmembers table
$result=mysql_query("SELECT * FROM tbMembers WHERE member_id = '$_SESSION[member_id]'")
or die("There are no records to display ... \n" . mysql_error()); 

if (mysql_num_rows($result)<1){
  $result = null;
}

$row = mysql_fetch_array( $result );
if($row) {
	// get data from db
	$stdId = $row['member_id'];
	$firstName = $row['first_name'];
	$lastName = $row['last_name'];
	$email = $row['email'];
	$voter_id = $row['voter_id'];
	$image = $row['image'];

	if( empty( $image ) ) {
	 $image = "images/demo/default-avatar.jpg";
	}
	else {
	 $image = "e-voting-with-blockchain/".$image;
	}
}

?>

<?php
    // updating sql query
if (isset($_POST['update'])) {
  $myId = addslashes( $_GET[id]);
  $myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
  $myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
  $myEmail = $_POST['email'];
  $myPassword = $_POST['password'];
  $myVoterid = $_POST['voter_id'];

  $newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

/*        $sql = mysql_query( "UPDATE tbMembers SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail', voter_id = '$myVoterid', password='$newpass' WHERE member_id = '$myId'" )
          or die( mysql_error() );*/

  $sql = mysql_query( "UPDATE tbMembers SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail', voter_id = '$myVoterid', password='$myPassword' WHERE member_id = '$myId'" )
          or die( mysql_error() );

  // redirect back to profile
  header("Location: manage-profile.php");
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
  <style>
    #camera {
      /*width: 100%;
      height: 350px;*/
      width:200px;
      height:200px;
    }
  </style>
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
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>

<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
  <section id="testimonials" class="hoc container clear"> 
    <h2 class="font-x3 uppercase btmspace-80 underlined"> Online <a href="#">Voting</a></h2>
    <ul class="nospace group">
      <li class="one_half first">
        <blockquote>
            <table border="0" width="620" align="center">
            <CAPTION><h3>MY PROFILE</h3></CAPTION>
            <form>
            <br>

            <tr>
              <td colspan="2" align="center">
				<a href="<?php echo $image; ?>">
                  <img src="<?php echo $image; ?>" style="border:1px solid grey; width:200px; height:200px;" >
                </a>
              </td>
            </tr>

            <tr>
                <td style="color:#000000"; >Number ID:</td>
                <td style="color:#000000"; ><?php echo $stdId; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >First Name:</td>
                <td style="color:#000000"; ><?php echo $firstName; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Last Name:</td>
                <td style="color:#000000"; ><?php echo $lastName; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Email:</td>
                <td style="color:#000000"; ><?php echo $email; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Voter ID:</td>
                <td style="color:#000000"; ><?php echo $voter_id; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Password:</td>
                <td style="color:#000000"; >Encrypted</td>
            </tr>
            </table>
            </form>

        </blockquote>
      
      </li>
      <li class="one_half">
        <blockquote>
            <table  border="0" width="620" align="center">
            <CAPTION><h3>UPDATE PROFILE</h3></CAPTION>
            <form action="manage-profile.php?id=<?php echo $_SESSION['member_id']; ?>" method="post" onsubmit="return updateProfile(this)">

              <table align="center">
              
              <tr>

                <td colspan="2" align="center">
                  <div id="camera" style="border:1px solid grey;"></div>
                  <br>
                  <input style="color:#000000" id="take_snapshots" type="button" name="image" value="Take Snapshot" class="my-button">
                </td>

              </tr>

              <tr>
                <td style="color:#000000" >First Name:</td>
                <td style="color:#000000" ><input  style="color:#000000"; type="text" font-weight:bold;" name="firstname" maxlength="15" value="" class="my-input"></td>
              </tr>

              <tr>
                <td style="color:#000000">Last Name:</td>
                <td style="color:#000000"><input style="color:#000000";  type="text" font-weight:bold;" name="lastname" maxlength="15" value="" class="my-input"></td>
              </tr>

              <tr>
                <td style="color:#000000" >Email Address:</td>
                <td style="color:#000000"><input style="color:#000000";  type="text" font-weight:bold;" name="email" maxlength="100" value="" class="my-input"></td>
              </tr>

              <tr>
                <td style="color:#000000" >Voter ID:</td>
                <td style="color:#000000"><input  style="color:#000000";  type="text"  font-weight:bold;" name="voter_id" maxlength="100" value="" class="my-input"></td>
              </tr>

              <tr>
                <td style="color:#000000" >New Password:</td>
                <td style="color:#000000" ><input  style="color:#000000";  type="password" font-weight:bold;" name="password" maxlength="15" value="" class="my-input"></td>
              </tr>

              <tr>
                <td style="color:#000000" >Confirm New Password:</td>
                <td style="color:#000000" ><input   style="color:#000000";  type="password"  font-weight:bold;" name="ConfirmPassword" maxlength="15" value="" class="my-input"></td>
              </tr>

              <tr>
                <td style="color:#000000" >&nbsp;</td>
                <td style="color:#000000" ><input style="color:#000000";  type="submit" name="update" value="Update Profile" class="my-button"></td>
              </tr>

              </table>
            </form>
            </table>

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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="../e-voting-with-blockchain/camera/jpeg_camera/jpeg_camera_with_dependencies.min.js" type="text/javascript"></script>
<script>
    var options = {
      shutter_ogg_url: "../e-voting-with-blockchain/camera/jpeg_camera/shutter.ogg",
      shutter_mp3_url: "../e-voting-with-blockchain/camera/jpeg_camera/shutter.mp3",
      swf_url: "../e-voting-with-blockchain/camera/jpeg_camera/jpeg_camera.swf",
    };
    var camera = new JpegCamera("#camera", options);
  
  $('#take_snapshots').click(function(){
    var snapshot = camera.capture();
    snapshot.show();
    
    snapshot.upload({api_url: "../e-voting-with-blockchain/camera/action.php"}).done(function(response) {
$('#imagelist').prepend("<tr><td><img src='"+response+"' width='100px' height='100px'></td><td>"+response+"</td></tr>");
}).fail(function(response) {
  alert("Upload failed with status " + response);
});
})

function done(){
    $('#snapshots').html("uploaded");
}
</script>
<!-- Camera Scripts -->
</body>
</html>