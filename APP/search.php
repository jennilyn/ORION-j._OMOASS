<?php
	include 'dao/FUNCTIONDAO.php';
	
	$film_title=$_POST['film_title'];

	$action=new FUNCTIONDAO;
	$action->search($film_title);

?>
