<?php
	  /*
         Filename: connect.php
         Author:   Justin Fisher
         Date:     4/22/2017
      */
$username = 'test'; // DB user
$password = 'rD5U3PVRxBqFhQ8Y'; // DB Password
$host = 'sdev153.libfoobar.so'; // Address of DB server
$port = '3306';
$connection = mysqli_connect($host, $username, $password);
if (!$connection){
    die("Error: Database Connection Failed ಠ╭╮ಠ" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'users');
if (!$select_db){
    die("Error: Database Selection Failed ಠ╭╮ಠ" . mysqli_error($connection));
}