<?php 
    session_start();
	include 'dao/FUNCTIONDAO.php';
	
	$username = $_SESSION["username"];

	$action = new FUNCTIONDAO();
	$action->getUserFullName($username);	
?>
