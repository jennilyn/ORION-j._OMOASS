<?php
   
    session_start();	
	include '../dao/FUNCTIONDAO.php';
	
	$action = new FUNCTIONDAO();
	$action->getTotalPayment();

?>
