	 <!--
         Final Project SDEV153
         Filename: register.php
         Author:   Justin Fisher
         Date:     4/22/2017
      -->
<?php
/* 
	 This comment is inside the php tag so it isnt visible to the public 
	 php stuff for mysql database connetion starts here 
	 This uses the PHP function password_hash to hash and salt the users password. 
*/
require_once('connect.php'); // The file being refrenced contains the username and pass for MySql.. No not the root, I'm not that stupid....
if(isset($_POST) & !empty($_POST))
{
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash and salt the password before storing it in the DB

	$sql = "INSERT INTO `users` (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
	$result = mysqli_query($connection, $sql);
	if($result)
	{
		$smsg = "User Registration successfull";
	}
	else
	{
		$fmsg = "User registration failed";
	}
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

<!--JavaScriptSDK for facebook likebutton-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--Twitter JavaScript Widget-->
<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>


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
            <p><a href="contact.html">Contact</a></p>
			<p><a href="https://weather.com/weather/today/l/USIN0138:1:US" target="_blank">Local Weather</a></p>
			<p><a href="https://www.google.com/maps/dir//Crawfordsville+%26+Montgomery+County+Chamber+of+Commerce" target="_blank">Directions</a></p>
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
			<h1><img src="images/BGheaderv3.png" alt="Crawfordsville & Montgomery County Chamber of Commerce" class="headerimage"></h1><!--header image-->
			<h1 class="headertext">Crawfordsville & Montgomery County<br> Chamber of Commerce</h1>
			<h2>Crawfordsville & Montgomery County Chamber<br>New Member Registration</h2>
		</header>
		
		<article>
			
<div class="container">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
      <form class="form-signin" method="POST">
        <!--<h2 class="form-signin-heading">Please Register</h2>-->
		<fieldset>
		<legend>New Member Registration</legend>
        <div class="input-group">
		  <span class="input-group-addon" id="basic-addon1"></span>
		  <input type="text" name="username" class="form-control" placeholder="Username" required>
		</div>
        <label for="inputEmail" class="sr-only"></label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only"></label>
        <br><input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <br><button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <input type="button" onclick="location.href='login.php';" value="Login" <!-- This line is javascript -->
		</fieldset>
      </form>
</div>
	<!--end div article container -->
	
		<!--div for right side container-->
	<div class="contactinforightside">
	<h1>Hours of Operation</h1>
	<p>Monday-Friday</p>
	<p>8:30 A.M. - 4:30 P.M</p>
	<h2>Address</h2>
	<p>200 S. Washington Street, Suite 304<br>
	Crawfordsville, IN 47933</p>
	<h3>Numbers</h3>
	<p>Phone: (765) 362-6800<br>
	Fax: (765) 362-6900</p>
	
	<!--Facebook Share button-->
	<div class="FBshare">
	<div class="fb-like" data-href="https://www.facebook.com/Cville.MontCoChamber/?fref=ts" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
	</div>
	
	<!--Twiter Follow button-->
	<div class="TwitterFollowBtn">
	<a class="twitter-follow-button"
  	href="https://twitter.com/CvilleCommerce"
 	data-size="large">
	Follow @CvilleCommerce</a>
	</div>


	</div>