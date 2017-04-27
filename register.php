	 <!--
         Final Project SDEV153
         Filename: register.php
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
		header("Location: error.php");
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
            <p><a href="indexMain.html">Alamo</a></p>
            <p><a href="directory.html">Crawfordsville</a></p>
            <p><a href="news.html">Darlington</a></p>
            <p><a href="events.html">Ladoga</a></p>
			<p><a href="time_capsule.html">Linden</a></p>
            <p><a href="community.html">New Market</a></p>
            <p><a href="chamber.html">New Richmond</a></p>
            <p><a href="business.html">New Ross</a></p>
			<p><a href="members.html">Waveland</a></p>
            <p><a href="contact.html">Waynetown</a></p>
			<p><a href="contact.html">Wingate</a></p>
         </nav>
		 <!--end nav community -->
	</div>
	<!--end div nav container -->
	
	<!--begin div article container -->
	<div class="articlecontainer">
		 <header>
			<h1><img src="images/BGheaderv2.jpg" alt="Placeholder" width="590" height="160"></h1><!--header image-->
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