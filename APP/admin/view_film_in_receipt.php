<?php
   
   session_start();	
	include '../dao/FUNCTIONDAO.php';
	
	$username = $_POST['username'];

	$action = new FUNCTIONDAO();
	$action->view_film_in_receipt($username);

?>
