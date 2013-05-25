<?php
	session_start();
	
	include 'dao/FUNCTIONDAO.php';
   
  
	if (isset($_SESSION['username'])){
		 $username = $_SESSION['username'];
   
   $action = new FUNCTIONDAO();
   $action->updateStatusToOff($username);
	
		session_unset();
		session_destroy();
		header('Location: index1.php');
	}
	
	
   
?>
