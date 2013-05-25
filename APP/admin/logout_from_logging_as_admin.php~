<?php
	session_start();
	if (isset($_SESSION['admin_username'])){
		session_unset();
		session_destroy();
		header('Location: login_as_admin.php');
	}
?>
