<?php

	include '../dao/FUNCTIONDAO.php';
	
	
	$film_title = $_POST["film_title"];
	$thriller = $_POST["thriller"];
	$film_price = $_POST["film_price"];
	$genre = $_POST["genre"];
	$stock = $_POST["stock"];
	$film_id = $_POST["film_id"];

	$action = new FUNCTIONDAO();
	$action-> edit_film_by_admin($film_id,$film_title,$thriller,$film_price,$genre,$stock);

?>
