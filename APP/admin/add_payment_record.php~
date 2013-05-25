<?php
	include '../dao/FUNCTIONDAO.php';
	
	$cash = $_POST['cash'];
	$total_payment =$_POST['total_payment'];
	$username = $_POST['username'];
	$user_id = $_POST['user_id'];
	$payment_id = $_POST['payment_id'];
	
	$action = new FUNCTIONDAO();
	$action->add_payment_record($cash,$total_payment,$username,$user_id,$payment_id);

?>
