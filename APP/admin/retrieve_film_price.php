<?php

	include '../dao/FUNCTIONDAO.php';
	
	$user_id = $_POST['user_id'];
	
	$action=new FUNCTIONDAO();
	$action->retrieve_film_total_payment($user_id);

?>
