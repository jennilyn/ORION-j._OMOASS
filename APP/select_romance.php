<?php

	include 'dao/FUNCTIONDAO.php';
	
	$genre = $_POST['genre'];
	
	$action= new FUNCTIONDAO();
	$action->select_romance($genre);

?>
