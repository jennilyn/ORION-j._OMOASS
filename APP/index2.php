
<?php
	session_start();
	if (!isset($_SESSION['username'])){
		header('Location: index1.php');
	}else{
		$username = $_SESSION['username'];	
	}
?>

<html>
	<head>
		<!--<link rel="stylesheet" href="gh/bootstrapCSS/bootstrap.min.css"/>
		<link rel="stylesheet" href="gh/bootstrapCSS/bootstrap-responsive.min.css"/>
		<link rel="stylesheet" href="style.css" />
				<link rel="stylesheet" href="../css/jquery-ui.css"/>
			    <link rel="shortcut icon" href="image/header.png">-->
			    
			    
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="gh/bootstrapCSS/bootstrap.min.css"/>
		<link rel="stylesheet" href="gh/bootstrapCSS/bootstrap-responsive.min.css"/>
		<link rel="shortcut icon" href="image/header.png">
		<link rel="stylesheet" href="css/jquery.mobile.structure-1.2.0.css"/>
		<link rel="stylesheet" href="css/jquery.mobile.theme-1.2.0.css"/>
		<link rel="stylesheet" href="css/jquery.mobile-1.2.0.css"/>
		<link rel="stylesheet" href="css/jquery-ui.css"/>
		<link rel="stylesheet" href="css/jquery-ui-1.9.0.custom.css"/>
		<link rel="stylesheet" href="css/jquery-ui-1.9.0.custom.min.css"/>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css" />
		<title>index2</title>
	</head>
	<body>
	<div class="div_body">
		<div class="wrap">
					<h2 class="text center">ORION MOVIE ORDERS AND SALES SYSTEM</h2>
					<input type="text" name="date" id="date" value="<?php date_default_timezone_set('Asia/Manila'); echo date('M/d/Y h:i:s a', time()); ?>"  readonly></br>
					 <input type="hidden" name="date_buy" id="date_buy" value="<?php echo date('M/d/Y'); ?>"  readonly></br>
					<input name="username" id="username" type="hidden" value="<?php if (isset($username)) echo $username; ?>" readonly>
					<!--<p id="a_sign_out" class="text left"><a href="logout.php" id="logout">Logout</a></p>-->
					<input type="hidden" name="status" value="HINDI PA NA DIDELIVER"/>
					<p id="a_sign_out" class="text right"><a href="logout.php" id="logout">Logout</a></p>
					<div id="p_fullname"></div>	 

					<div id="div_body2">
						
						<div id="div_film2">
							
							

							
							<h2>FILMS</h2>
							
							<div id="div_genre">
								<input type="button" class="genre" id="btn_horror" value="HORROR"/>
								<input type="button" class="genre" id="btn_romance" value="ROMANCE"/>
								<input type="button" class="genre" id="btn_action" value="ACTION"/>
								<input type="button" class="genre" id="btn_comedy" value="COMEDY"/>
								<input type="button" class="genre" id="btn_view_all" value="VIEW ALL"></br>
							</div><!--div_genre-->
							
							<div id="list_of_films">
							<i class="icon-search"></i><input type="text" id="search" name="search" placeholder="search" class="input-medium search-query"/>
							<!--<div id="notice">
								note! lang  this site is only for Abuyog,Leyte Philippines :P
								kapag ang table row ay <p style="text-decoration : line-through">ganito</p> ibig sabihin ay ubos na ito!
							</div>-->
							<table id="film2"  class="table">
								 <tr>
									<th class="table_header" colspan="5"><p>FILMS</p></th>
								</tr>	
							</table>
				
							</div><!--list_of_films-->
							
							<div id="warning_ubos"><h3 id="warning_h3">UBOS NA !! :(</h3></div>
							
							
							<div class="reciept">
								<table id="reciept" class="table">
								   <th>firstname</th>
								   <th>lastname</th>
								   <th>film_title</th>
								   <th>film_price</th>
								</table>
							</div>
							
						</div><!--div_film2-->      
						
					</div><!--end of div_body2-->   
				<script src="js/jquery-1.8.2.min.js"></script>
			   	<script src="js/homepage.js"></script>
				<script src="js/index2.js"></script>
				<script src="js/jquery.js"></script>
				<script src="js/jquery-1.8.3.js"></script>
				<script src="js/jquery-1.9.1.js"></script>
				<script src="js/jquery-ui-1.10.2.custom.js"></script>
				<script src="js/jquery-ui-1.10.2.custom.min.js"></script>
				<script src="gh/bootstrapJS/bootstrap.js"></script>
				<script src="gh/bootstrapJS/bootstrap.min.js"></script>
			</div><!--wrap-->
		</div><!--end of div_body-->
	</body>
</html>


