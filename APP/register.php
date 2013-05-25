<!DOCTYPE html>
<html>
   <head>
      <title>REGISTER HERE</title>
		<link type="text/css" rel="stylesheet" href="gh/bootstrapCSS/bootstrap.min.css"/>
		<link rel="stylesheet" href="gh/bootstrapCSS/bootstrap-responsive.min.css"/>
      <link rel="stylesheet" href="style.css" />
      	    <link rel="shortcut icon" href="images/header.png">
   </head>
   <body>
      <div id="div_body"> 
      <div class="wrap">
		<input name="date" id="date" type="hidden" value="<?php echo date('M/d/Y'); ?>" readonly>
         <h2 class="text center">ORION MOVIE ORDERS AND SALES SYSTEM</h2>
         <div id="div_register_login"> 
            <div id="login_form">
            	<p class="text-right"><a href="index1.php">X</a></p>
               <h4 class="header">LOGIN FORM</h4>
               <form method="POST" action="login.php" class="form-horizontal"> 
                  Username: <input type="text" name="username" required></br>
                  Password: <input type="password" name="password" required></br>
                  <button id="btn_login">LOGIN</button></br>
                  &nbsp;
                  doesn't have an account?? sign up <!--<a id="a_register" onclick="register_user()"> &nbsp;here</a>--><a id="a_register" href="#div_form_register"><b> &nbsp;here</b></a>
               </form>
            </div><!login_form>
			
            <div id="div_form_register">
            	 <a href="#login_form"><button  class="close">&times;</button></a>
               <h4 class="header">REGISTER FORM</h4>
               <form id="form_register" method="POST">
                  <table>
                     <tr>
                        <td>
                           Firstname: <input type="text" name="firstname" id="firstname" placeholder="firstname" required>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           Lastname: <input type="text" name="lastname" id="lastname" placeholder="lastname" required>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           Address: <input type="text" name="address" id="address" placeholder="address" required><input type="text" id="extension" value="Abuyog,Leyte" readonly />
                        </td>
                     </tr>
                     <tr>
                        <td>
                           Username: <input type="text" name="entered_username" id="username" placeholder="username" required>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           Password: <input type="password" name="entered_password" id="password" placeholder="password" required>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <button id="btn_register">REGISTER</button>&nbsp;
                           <a href="#login_form"><button>CANCEL</button></a>
                        </td>
                     </tr>
                  </table>
               </form>
            </div><!div_form_register>       
         </div><!div_register_login>
      </div><!--end of div_body-->
      <script src="js/jquery-1.8.2.min.js"></script>
      <script src="gh/bootstrapJS/bootstrap.js"></script>
		<script src="gh/bootstrapJS/bootstrap.min.js"></script>
      <script src="js/homepage.js"></script>
		<script src="js/register.js"></script>
		</div><!--wrap-->
   </body>
</html>
