<?php 

	session_start(); //to check if there is a session
	session_destroy(); // destroy session to commit a logout
	unset($_SESSION['id']); // remove id from session
	unset($_SESSION['uname']);
	header('location: index.php'); // redirect
	exit(); // terminate execution of current script