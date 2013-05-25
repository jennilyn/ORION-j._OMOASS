<?php

	include '../dao/FUNCTIONDAO.php';
	
	$film_id=$_POST['film_id'];
	
	$action=new FUNCTIONDAO();
	$action->retrieve_film_by_admin($film_id);

?>
