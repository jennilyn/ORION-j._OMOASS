<?php

	include 'dao/FUNCTIONDAO.php';
	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$address = $_POST['address'];
	$date_register = $_POST['date_register'];
	
	$action = new FUNCTIONDAO();
	$action->add_user($firstname,$lastname,$address,$username,$password,$date_register);
?>
