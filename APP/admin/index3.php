<?php
	session_start();
	if (!isset($_SESSION['admin_username'])){
		header('Location: ../admin_index1.php');
	}else{
		$username = $_SESSION['admin_username'];	
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../style.css" />
		<link rel="stylesheet" href="../gh/bootstrapCSS/bootstrap.min.css"/>
		<link rel="stylesheet" href="../gh/bootstrapCSS/bootstrap-responsive.min.css"/>
		<link rel="shortcut icon" href="../image/header.png">
		<link rel="stylesheet" href="../css/jquery.mobile.structure-1.2.0.css"/>
		<link rel="stylesheet" href="../css/jquery.mobile.theme-1.2.0.css"/>
		<link rel="stylesheet" href="../css/jquery.mobile-1.2.0.css"/>
		<link rel="stylesheet" href="../css/jquery-ui.css"/>
		<link rel="stylesheet" href="../css/jquery-ui-1.9.0.custom.css"/>
		<link rel="stylesheet" href="../css/jquery-ui-1.9.0.custom.min.css"/>
		 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
		<title>index3</title>
	</head>
	<body>
			<div class="div_body">  
				<div class="wrap">
					<h2 class="text center">ORION MOVIE ORDERS AND SALES SYSTEM</h2>
					<input type="text" name="date" id="date" value="<?php date_default_timezone_set('Asia/Manila'); echo date('M/d/Y h:i:s a', time()); ?>"  readonly></br>
					<input name="username" id="username" type="hidden" value="<?php if (isset($username)) echo $username; ?>" readonly>
					<input name="date_pay" id="date_pay" type="hidden" value="<?php echo date('M/d/Y'); ?>" readonly>

						<table id="admin_fullname">
							<tr>
								<td></td>
								<td></td>
							</tr>    
						</table></br>
						<div id="a_tab"> <a id="p2">Film</a><a href="#table_users" id="p1">Users</a><a id="cust">Sales</a><!--<a href="#payment_div" id="p5">PAYMENT</a>--><a id="p4" href="logout_from_logging_as_admin.php">Logout</a></div><!--a_tab-->       
						
						<div id="table_user">
							<table id="users" border="1"  class="table">
								<tr>
									<th class="table_header" colspan="4"><p>USERS</p></th>
								</tr>
								<tr>
									<th>FIRSTNAME</th>
									<th>LASTNAME</th>
									<th>ADDRESS</th>
									<th>DATE REGISTERED</th>
								</tr>
							</table>
						</div><!--table_user-->

						<div id="d2">

							<input type="button" id="choose_add" value="ADD FILM"></input>
							
							<form id="marry">
								<table>
									<tr>
										<td>
											<input type="hidden" name="film_id"/>
										</td>
									</tr>
									<tr>
										<td>
											FILM TITLE:<input type="text" name="film_title" id="film_title" required>
										</td>
									<tr>
									<tr>
										<td>
											THRILLER: <input type="text" name="thriller" id="thriller" required>
										</td>
									</tr>
									<tr>
										<td>
											FILM PRICE:<input type="text" name="film_price" id="film_price" required>
										</td>
									</tr>
										<tr>
										<td>GENRE: 
											<select name="genre" id="genre">
												<option>HORROR</option>
												<option>COMEDY</option>
												<option>ACTION</option>
												<option>ROMANCE</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>
											STOCK:<input type="number" name="stock" id="stock" required>
										<td>
									</tr>
								</table>   
								
							</form>
							
							<table id="film3" border="1" class="table">
								
								<tr>
									<th class="table_header" colspan="4"><p>FILMS</p></th>
								</tr>
								<tr>
									<th>title</th>
									<th>thriller</th>
									<th>price</th>
									<th></th>
								</tr>
							</table>
						</div>	<!--d2-->
						
						<div id="delete_warning"><h2 class="text center">Are you sure you want to delete this data??</h2></div>
						
						<div id="d3">    
						
						  
							<table id="customer_info" border="1"  class="table">
							<tr>
								<th class="table_header" colspan="7"><p>CUSTOMER INFO</p></th>
							</tr>
								<tr>
									<th>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
									<th>Firstname</th>
									<th>Lastname</th>
									<th>Film_Title</th>
									<th>Film_Price</th>
								</tr>
							</table>
					
							
							
							<select id="choice">
								<option id="option0">PILI NA!</option>
								<option id="option1" value="#user_totla_payment">USER_TOTAL_PAYMENT</option>
								<option id="option2" value="#sales_by_date">SALES_BY_DATE</option>
								<option id="option3" value="total_table">TOTAL_TABLE</option>
								<option id="option4" value=".payment_table" onclick="view_payment()">PAYMENT_TABLE</option>
							</select>
					
							<table id="user_total_payment" border="1" class="table">
							<tr>
								<th class="table_header" colspan="7"><p>USER TOTAL PAYMENT</p></th>
							</tr>
								<th>FIRSTNAME</th>
								<th>LASTNAME</th>
								<th>DATE ORDER</th>
								<th>TOTAL</th>
								<th>ACTION</th>
								<th></th>
								<th>ADDRESS</th>

							</table>

							<table id="sales_by_date" border="1"  class="table">
							<tr>
								<th class="table_header" colspan="2"><p>SALES BY DATE</p></th>
							</tr>
								<th>DATE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th>TOTAL SALE / date pay</th>
							</table>
					
							 <table id="total_table" border="1"  class="table">
							 <tr>
								<th class="table_header" colspan="4"><p>TOTAL TABLE</p></th>
							</tr>
								<tr>
									<th>Firstname</th>
									<th>Lastname</th>
									<th>Date Order&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
									<th>TOTAL Price</th>
								</tr>
							</table>
							
							<div id="payment_div">
							<table id="payment_table" border="1"  class="table">
								<tr>
									<th class="table_header" colspan="5"><p>PAYMENT TABLE</p></th>
								</tr>
								<tr>
									<th>FIRSTNAME</th>
									<th>LASTNAME</th>
									<th>DATE PAY</th>
									<th>DATE ORDER</th>
									<th>TOTAL</th>
								</tr>
							</table>

							<table id="payment_info" border="1"  class="table ">
								<tr>
									<th class="table_header" colspan="7"><p>PAYMENT INFO</p></th>
								</tr>
								<tr>
									<th>firstname</th>
									<th>lastname</th>
									<th>address</th>
									<th>date pay</th>
									<th>cash given</th>
									<th>total price</th>
									<th>change</th>
								</tr>
							</table>	
						</div><!--payment_div-->
						</div><!--d3-->
						
						
				
						<div id="payment">
							<input type="text" name="cash" id="cash"/>
							<input type="text" name="total_payment" id="total_payment"/>
						</div><!--payment-->
						<p id="p2"></p>
					
						

					<script src="../js/jquery-1.8.2.min.js"></script>
					<script src="../js/homepage.js"></script>
					<script src="../js/admin_index.js"></script>
					<script src="../js/jquery.js"></script>
					<script src="../js/jquery-ui-1.9.0.custom.js"></script>
					<script src="../js/jquery-1.8.3.js"></script>
					<script src="../js/jquery-1.9.1.js"></script>
					<script src="../js/jquery-ui-1.10.2.custom.js"></script>
					<script src="../js/jquery-ui-1.10.2.custom.min.js"></script>
					<script src="../gh/bootstrapJS/bootstrap.js"></script>
					<script src="../gh/bootstrapJS/bootstrap.min.js"></script>
			</div><!--wrap-->
		</div> <!--end of div_body-->
	</body>
</html>
