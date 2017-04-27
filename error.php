	 <!--
         Final Project SDEV153
         Filename: error.php
         Author:   Justin Fisher
		 Author:
		 Author:
		 Author:
         Date:     4/22/2017
		 Add your name to the author list if you edit this page
      -->
<?php
$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);
 
if (! $error) {
    $error = 'Oops! An unknown error occurred.  (0_o)';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Error</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <h1>There was a problem</h1>
        <p class="error"><?php echo $error; ?></p>  
    </body>
</html>