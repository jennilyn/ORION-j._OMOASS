<?php
   
    session_start();	
	include '../dao/FUNCTIONDAO.php';
	
	$admin_username = $_SESSION["admin_username"];

	$action = new FUNCTIONDAO();
	$action->getAdminFullName($admin_username);

?>
