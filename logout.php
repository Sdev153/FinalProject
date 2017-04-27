<?php
	  /*
         Filename: logout.php
         Author:   Justin Fisher
         Date:     4/22/2017
      */
session_start();
session_destroy();
header('location: login.php');
?>