<?php
    session_start();

	include 'dao/FUNCTIONDAO.php';

	$film_id=$_POST['film_id'];
	$username = $_SESSION["username"];
	$date_buy=$_POST["date_buy"];
	$status =$_POST["status"];
	
	$action=new FUNCTIONDAO();
	$action->click_to_buy_film($film_id,$username,$date_buy,$status);

?>
