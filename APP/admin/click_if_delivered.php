<?php

	include '../dao/FUNCTIONDAO.php';
	
	$user_id = $_POST['user_id'];
	$cash = $_POST['cash'];
	$total_payment = $_POST['total_payment'];
	$date_pay = $_POST['date_pay'];
	
	$action = new FUNCTIONDAO();
	$action->click_if_delivered($user_id,$cash,$total_payment,$date_pay);
?>
