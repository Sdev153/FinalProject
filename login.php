	 <!--
         Final Project SDEV153
         Filename: login.php
         Author:   Justin Fisher
		 Author:
		 Author:
		 Author:
         Date:     4/22/2017
		 Add your name to the author list if you edit this page
      -->
<?php
/* 
	 This comment is inside the php tag so it isnt visible to the public 
	 php stuff for mysql database connetion starts here 
	 This uses the PHP function password_verify to check the hashed and salted password from the DB against the users plain text password. 
*/
session_start();
require_once('connect.php'); // The file being refrenced contains the username and pass for MySql.. No not the root, I'm not that stupid....
if(isset($_POST) & !empty($_POST))
{
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = ($_POST['password']); //get the plain text password
	$sql = "SELECT password FROM users WHERE username = '$username'"; //get the hashed and salted password from the DB
	$query = mysqli_query($connection, $sql);
	$result = mysqli_fetch_assoc($query);
	$hash = $result['password']; // hashed and salted password from the DB
	if(password_verify($password, $hash))
	{
		$_SESSION['username'] = $username;
	}
	else
	{
		$fmsg = "Invalid Username/Password";
	}
}
if(isset($_SESSION['username']))
{
	//$smsg = "User already logged in";
	$accmsg =  "You are currently logged in as $username. Please logout to close the session.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Crawfordsville | Montgomery County Chamber of Commerce</title>
	<meta charset="utf-8">
      <meta name="viewport" content="width=device-width">
	  <link rel="stylesheet" href="styles.css">  
</head>

<body>
	<!--begin div nav container -->
  <div class="navcontainer">
		<!--begin nav main -->
         <nav class="sitenavigation">
            <p><a href="indexMain.html">Home</a></p>
            <p><a href="directory.html">Directory</a></p>
            <p><a href="news.html">News</a></p>
            <p><a href="events.html">Events</a></p>
			<p><a href="time_capsule.html">Time Capsule</a></p>
            <p><a href="community.html">Community</a></p>
            <p><a href="chamber.html">Chamber</a></p>
            <p><a href="business.html">Business</a></p>
			<p><a href="mobile.html">MOBILE</a></p>
			<p><a href="register.php">Join</a></p>
			<p><a href="login.php">Login</a></p>
			<p><a href="members.html">Members</a></p>
            <p><a href="contact.html">Contact</a></p>
         </nav>
		 <!--end nav main -->
		 
		 <!--begin nav community -->
		 <nav class="communitynavigation">
			<p>Our Communities</p>
            <p><a href="http://www.city-data.com/city/Alamo-Indiana.html">Alamo</a></p>
            <p><a href="http://www.city-data.com/city/Crawfordsville-Indiana.html">Crawfordsville</a></p>
            <p><a href="http://www.city-data.com/city/Darlington-Indiana.html">Darlington</a></p>
            <p><a href="http://www.city-data.com/city/Ladoga-Indiana.html">Ladoga</a></p>
			<p><a href="http://www.city-data.com/city/Linden-Indiana.html">Linden</a></p>
            <p><a href="http://www.city-data.com/city/New-Market-Indiana.html">New Market</a></p>
            <p><a href="http://www.city-data.com/city/New-Richmond-Indiana.html">New Richmond</a></p>
            <p><a href="http://www.city-data.com/city/New-Ross-Indiana.html">New Ross</a></p>
			<p><a href="http://www.city-data.com/city/Waveland-Indiana.html">Waveland</a></p>
            <p><a href="http://www.city-data.com/city/Waynetown-Indiana.html">Waynetown</a></p>
			<p><a href="http://www.city-data.com/city/Wingate-Indiana.html">Wingate</a></p>
         </nav>
		 <!--end nav community -->
	</div>
	<!--end div nav container -->
	
	<!--begin div article container -->
	<div class="articlecontainer">
		 <header>
		 <?php if(isset($accmsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $accmsg; ?> </div><?php } ?>
		 <input type="button" onclick="location.href='logout.php';" value="Logout" <!-- This line is javascript -->
			<h1><img src="images/BGheaderv2.jpg" alt="Placeholder" width="590" height="160"></h1><!--header image-->
			<h2>Crawfordsville & Montgomery County Chamber<br>Member Login</h2>
		</header>
		
		<article>
			
<div class="container">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
      <form class="form-signin" method="POST">
        <!--<h2 class="form-signin-heading">Please Log-In</h2>-->
		<fieldset>
		 <legend>Member Log-In</legend>
        <div class="input-group">
		  <span class="input-group-addon" id="basic-addon1"></span>
		  <input type="text" name="username" class="form-control" placeholder="Username" required>
		</div>
        <label for="inputPassword" class="sr-only"></label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
		</fieldset>
        <br><button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
		<input type="button" onclick="location.href='register.php';" value="Register" <!-- This line is javascript -->
		<input type="button" onclick="location.href='logout.php';" value="Logout" <!-- This line is javascript -->
      </form>
		
	</div>
	<!--end div article container -->