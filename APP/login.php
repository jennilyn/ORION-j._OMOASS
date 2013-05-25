
<?php
	session_start();
	include 'dao/FUNCTIONDAO.php';
	$action = new FUNCTIONDAO();
	if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){			
		$verrify = $action->checkUser($_REQUEST['username'],$_REQUEST['password']);	
		if($verrify){
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['user_id'] = $_REQUEST['user_id'];
			header('Location: index2.php');	
		}else{
			$errMsg = "UserName add Password Didn't Match";
		}
	}
?>

