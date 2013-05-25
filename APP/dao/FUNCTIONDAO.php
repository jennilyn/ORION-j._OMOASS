<?php

    include 'BASEDAO.php';
   
   class FUNCTIONDAO extends BASEDAO{
   
   //both in user and admin
	   function view_film_one_to_ten(){
	   
	      $this->openConn();
	      $stmt= $this->dbh->prepare("SELECT * FROM film order by film_id DESC limit 10;");
	      $stmt->execute();
	      
	      $this->closeConn();
	      
	      
	        while($row = $stmt->fetch()){		
			
						echo "<tr id=".$row[0].">";
							echo "<td>".$row[1]."</td>";
							echo "<td>".$row[2]."</td>";
							echo "<td>".$row[3]."</td>";
						echo "</tr>"; 
			}  	      
	   }
	   
	   //user's functions
	   
	    function view_all_film(){
	   
		  	$this->openConn();
		   	$stmt= $this->dbh->prepare("SELECT film_id,film_title,film_price,stock,thriller FROM film;");
		   	$stmt->execute();
	   
	   		$this->closeConn();
	   		
	   		
	   		echo "<tr>";
		   		echo "<th>FILM TITLE</th>";
		   		echo "<th>FILM PRICE</th>";
		   		echo "<th>THRILLER</th>";
		   		echo "<th></th>";
		   	echo "</tr>";
	      	while ($content = $stmt->fetch()){
	      		if($content[3] <= 0) {
			        echo "<tr  style = 'text-decoration: line-through'>";
			        echo "<td>".$content[1]."</td>";
			        echo "<td>".$content[2]."</td>";
			        echo "<td>".$content[4]."<td>";
			        echo "<td>
			                <button class='outOfStock' onclick='ubos()'>ubos na</button>
			               </td>";
			        echo "</tr>";
			    } else {
			    	echo "<tr>";
			        echo "<td>".$content[1]."</td>";
			        echo "<td>".$content[2]."</td>";
			        echo "<td>".$content[4]."<td>";
			        echo "<td>
			                 <button class='p_buy' onclick='buyFilm(".$content[0].")'>ORDER</button>
			               </td>";
			        echo "</tr>";
			    }
	      }
	      
	   }
	   
		
		function add_user($firstname,$lastname,$address,$username,$password,$date_register){
			$this->openConn();
			$stmt= $this->dbh->prepare("INSERT INTO user (firstname,lastname,address,username,password,date_register) VALUES (?,?,?,?,?,?);");
			$stmt->bindParam(1,$firstname);
			$stmt->bindParam(2,$lastname);
			$stmt->bindParam(3,$address);
			$stmt->bindParam(4,$username);
			$stmt->bindParam(5,$password);
			$stmt->bindParam(6,$date_register);
			$stmt->execute();
	
			$this->closeConn();
		}
			
		
		 
		function checkUser($username, $password){
	      	
	      $this->openConn();	
	      $stmt = $this->dbh->prepare("SELECT username,password FROM user");
	      $stmt->execute();
	      
		  $found = false;   		
	      while($row = $stmt->fetch()){
		         if($row[0]==$username && $row[1] == $password){
		            $found = true;
		        
		         }
	      }	
	      
	      $stmt2=$this->dbh->prepare("UPDATE user SET status = 'ON' where username=?;");
	      $stmt2->bindParam(1,$username);
	      $stmt2->execute();
	      	
		  $this->closeConn(); 
		  return $found;
		}
		
		
		function click_to_buy_film($film_id,$username,$date_buy,$status){

			   $this->openConn();
			   $stmt = $this->dbh->prepare("SELECT * FROM film where film_id= ?;");
			   $stmt->bindParam(1,$film_id);
			   $stmt->execute();
			
			   $record = $stmt->fetch();
			   
			   $stmt2 = $this->dbh->prepare("SELECT * FROM user where username=?;");
			   $stmt2->bindParam(1,$username);
			   $stmt2->execute();
			   
			   $record2 = $stmt2 ->fetch();
			   
			   $film = array(
			               "film_id"=>$record[0],
			               "film_title"=>$record[1],
			               "film_price"=>$record[3],
			               "firstname"=>$record2[1],
			               "lastname"=>$record2[2]  
			            );
			   $json_string = json_encode($film);
			      
			   echo $json_string;
			   
			   $stmt4 = $this->dbh->prepare("SELECT user_id FROM user where username= ?;");
			   $stmt4->bindParam(1,$username);
			   $stmt4->execute(); 
			   $record3 = $stmt4->fetch();

			   $stmt3 = $this->dbh->prepare("INSERT INTO user_to_film (film_id,user_id,date_buy,status) values(?,?,?,?)");
			   $stmt3->bindParam(1,$film_id);
			   $stmt3->bindParam(2,$record3[0]);
			   $stmt3->bindParam(3,$date_buy);
			   $stmt3->bindParam(4,$status);
			   $stmt3->execute();
			   
			   $stmt5=$this->dbh->prepare(" UPDATE film  SET stock = stock - 1  WHERE film_id=?;");
			   $stmt5->bindParam(1,$film_id);
			   $stmt5->execute();
			   $this->closeConn();
		}
		 
	   function view_film_in_receipt($username){
	   
		    $this->openConn();
		    $stmt= $this->dbh->prepare("select u.firstname,u.lastname,f.film_title,f.film_price from user_to_film as utf,user as u, film as f where u.user_id=utf.user_id and u.username=? and f.film_id=utf.film_id;");
		    $stmt->bindParam(1,$username);
		    $stmt->execute();
		    $this->closeConn();
		   
		    while ($content = $stmt->fetch()){
		      
		            echo "<tr id='".$content[0]."'>
			            echo <td>".$content[1]."</td>
			            echo <td>".$content[2]."</td>
			            echo <td>".$content[3]."</td>
			           
		            echo </tr>";
		    }
	     }
		
		 function getUserFullName($username){
	      $this->openConn();
	      $stmt= $this->dbh->prepare("SELECT firstname,lastname from user where username=?;");
	      $stmt->bindParam(1,$username);
	      $stmt->execute();
	      
	      $this->closeConn();
	      
	      	while($content = $stmt ->fetch()){
	      		echo "<h4 id='user_fullname'>".$content[0]."&nbsp;".$content[1]."</h4>";
	      	}	
	   }	
	   
	   
	   function search($film_title){
			$this->openConn();
			$stmt = $this->dbh->prepare("SELECT * FROM film where film_title like '".$film_title."%'");
			$stmt->execute();
			$found = false;
			
			
			echo "<caption> FILMS </caption>";
			echo "<th>FILM TITLE</th>";
			echo "<th>THRILLER</th>";
			echo "<th>FILM PRICE</th>";
			echo "<th></th>";				
			while ($s =$stmt->fetch()){
				if($s[5] <= 0) {
			        echo "<tr class='warning' style = 'text-decoration: line-through'>";
			        echo "<td>".$s[1]."</td>";
			        echo "<td>".$s[2]."</td>";
			        echo "<td>".$s[3]."</td>";
			        echo "<td>
			                <button class='outOfStock' onclick='ubos()'>ubos na</button>
			               </td>";
			        echo "</tr>";
			        $found=true;
			    }else{
					echo "<tr id=".$s[0].">";
						echo "<td>".$s[1]."</td>";
						echo "<td>".$s[2]."</td>";
						echo "<td>".$s[3]."</td>";
						echo "<td><button class='p_buy' onclick='buyFilm(".$s[0].")'>ORDER</button></td>";
					echo "</tr>";
					$found=true;
			
				}
			}
			if(!$found){
				echo "<tr><td colspan='4'>NOt FOUND!!</td></tr>";
			}	
	   }   
	   function updateStatusToOff($username){
	   	$this->openConn();
	   	$stmt=$this->dbh->prepare("UPDATE user SET status='OFF' where username=?;");
	   	$stmt->bindParam(1,$username);
	   	$stmt->execute();
	   	$this->closeConn();
	   }


	   function select_horror($genre){
	   	$this->openConn();
	   	$stmt=$this->dbh->prepare("SELECT * FROM film where genre=?;");
	   	$stmt->bindParam(1,$genre);
	   	$stmt->execute();
	   	
	   	$this->closeConn();
	   	
	   	echo "<tr>";
	   		echo "<th>FILM TITLE</th>";
	   		echo "<th>THRILLER<th>";
	   		echo "<th>FILM PRICE</th>";
	   		echo "<th></th>";
	   	echo "</tr>";
	   	while ($content = $stmt->fetch()){
	      		if($content[5] <= 0) {
			        echo "<tr class='warning' style = 'text-decoration: line-through'>";
			        echo "<td>".$content[1]."</td>";
			        echo "<td>".$content[2]."</td>";
			        echo "<td>".$content[3]."</td>";
			        echo "<td>
			                <button class='outOfStock' onclick='ubos()'>ubos na</button>
			               </td>";
			        echo "</tr>";
			    } else {
			    	echo "<tr>";
			        echo "<td>".$content[1]."</td>";
			        echo "<td>".$content[2]."</td>";
			        echo "<td>".$content[3]."</td>";
			        echo "<td>
			                 <button class='p_buy' onclick='buyFilm(".$content[0].")'>ORDER</button>
			               </td>";
			        echo "</tr>";
			    }
	      }
	   }
	   
	   function select_romance($genre){
	   	$this->openConn();
	   	$stmt=$this->dbh->prepare("SELECT * FROM film where genre=?;");
	   	$stmt->bindParam(1,$genre);
	   	$stmt->execute();
	   	
	   	$this->closeConn();
	   	
	   	echo "<tr>";
	   		echo "<th>FILM TITLE</th>";
	   		echo "<th>THRILLER</th>";
	   		echo "<th>FILM PRICE</th>";
	   		echo "<th></th>";
	   	echo "</tr>";
	   	while ($content = $stmt->fetch()){
	      		if($content[5] <= 0) {
			        echo "<tr class='warning' style = 'text-decoration: line-through'>";
			        echo "<td>".$content[1]."</td>";
			        echo "<td>".$content[2]."</td>";
			        echo "<td>".$content[3]."</td>";
			        echo "<td>
			                <button class='outOfStock' onclick='ubos()'>ubos na</button>
			               </td>";
			        echo "</tr>";
			    } else {
			    	echo "<tr>";
			        echo "<td>".$content[1]."</td>";
			        echo "<td>".$content[2]."</td>";
			        echo "<td>".$content[3]."</td>";
			        echo "<td>
			                 <button class='p_buy' onclick='buyFilm(".$content[0].")'>ORDER</button>
			               </td>";
			        echo "</tr>";
			    }
	      }
	   }
	   
	   function select_action($genre){
	    $this->openConn();
	   	$stmt=$this->dbh->prepare("SELECT * FROM film where genre=?;");
	   	$stmt->bindParam(1,$genre);
	   	$stmt->execute();
	   	
	   	$this->closeConn();
	   	
	   	echo "<tr>";
	   		echo "<th>FILM TITLE</th>";
	   		echo "<th>THRILLER</th>";
	   		echo "<th>FILM PRICE</th>";
	   		echo "<th></th>";
	   	echo "</tr>";
	   	while ($content = $stmt->fetch()){
	      		if($content[5] <= 0) {
			        echo "<tr class='warning' style = 'text-decoration: line-through'>";
			        echo "<td>".$content[1]."</td>";
			        echo "<td>".$content[2]."</td>";
			        echo "<td>".$content[3]."</td>";
			        echo "<td>
			                <button class='outOfStock' onclick='ubos()'>ubos na</button>
			               </td>";
			        echo "</tr>";
			    } else {
			    	echo "<tr>";
			        echo "<td>".$content[1]."</td>";
			        echo "<td>".$content[2]."</td>";
			        echo "<td>".$content[3]."</td>";
			        echo "<td>
			                 <button class='p_buy' onclick='buyFilm(".$content[0].")'>ORDER</button>
			               </td>";
			        echo "</tr>";
			    }
	      }
	   }
	   
	   function select_comedy($genre){
	    $this->openConn();
	   	$stmt=$this->dbh->prepare("SELECT * FROM film where genre=?;");
	   	$stmt->bindParam(1,$genre);
	   	$stmt->execute();
	   	
	   	$this->closeConn();
	   	
	   	echo "<tr>";
	   		echo "<th>FILM TITLE</th>";
	   		echo "<th>THRILLER<th>";
	   		echo "<th>FILM PRICE</th>";
	   		echo "<th></th>";
	   	echo "</tr>";
	   	while ($content = $stmt->fetch()){
	      		if($content[5] <= 0) {
			        echo "<tr class='warning' style = 'text-decoration: line-through'>";
			        echo "<td>".$content[1]."</td>";
			        echo "<td>".$content[2]."</td>";
			        echo "<td>".$content[3]."</td>";
			        echo "<td>
			                <button class='outOfStock' onclick='ubos()'>ubos na</button>
			               </td>";
			        echo "</tr>";
			    } else {
			    	echo "<tr>";
			        echo "<td>".$content[1]."</td>";
			        echo "<td>".$content[2]."</td>";
			        echo "<td>".$content[3]."</td>";
			        echo "<td>
			                 <button class='p_buy' onclick='buyFilm(".$content[0].")'>ORDER</button>
			               </td>";
			        echo "</tr>";
			    }
	      }
	   }
	   
	   
	   //admin's functions
	   
	   
	    function view_all_film_again(){
	   
		   $this->openConn();
		   $stmt= $this->dbh->prepare("SELECT film_id,film_title,film_price,stock,thriller FROM film ORDER BY film_id DESC;");
		   $stmt->execute();
		   
	   	   $this->closeConn();
	   
	      	while ($content = $stmt->fetch()){
	      		if($content[3] <= 0) {
			        echo "<tr  style = 'text-decoration: line-through'>";
			        echo "<td>".$content[1]."</td>";
			        echo "<td>".$content[4]."</td>";
			        echo "<td>".$content[2]."</td>";
			        
			        echo "<td>
			                <button class='delete' onclick='deleteFilm(".$content[0].")'>DELETE</button>
	                     <button class='edit' onclick='editFilm(".$content[0].")'>EDIT</button>
			               </td>";
			        echo "</tr>";
			       
			    } else {
			    	echo "<tr>";
			        echo "<td>".$content[1]."</td>";
			        			        echo "<td>".$content[4]."</td>";
			        echo "<td>".$content[2]."</td>";

			        echo "<td>
			                 <button class='delete' onclick='deleteFilm(".$content[0].")'>DELETE</button>
	                     <button class='edit' onclick='editFilm(".$content[0].")'>EDIT</button>
			               </td>";
			        echo "</tr>";
			    }
	      }
	   }
	   
	    function checkAdmin($admin_username,$admin_password){
		
			$this->openConn();
			$stmt= $this->dbh->prepare("SELECT admin_username,admin_password from admin_info;" );
			$stmt->execute();
			$found=false;			
			while($rows = $stmt->fetch()){
			   if($rows[0]==$admin_username && $rows[1]==$admin_password){
			      $found= true;
			   }
			}
			$this->closeConn();
			return $found;
		}
		
		function add_film_by_admin($film_title,$thriller,$film_price,$genre,$stock,$date_added,$user_id,$film_id){
		
			$this->openConn();
			$stmt= $this->dbh->prepare("INSERT INTO film (film_title,thriller,film_price,genre,stock,date_added) values (?,?,?,?,?,?);");
			$stmt->bindParam(1,$film_title);
			$stmt->bindParam(2,$thriller);
			$stmt->bindParam(3,$film_price);
			$stmt->bindParam(4,$genre);
			$stmt->bindParam(5,$stock);
			$stmt->bindParam(6,$date_added);
			
			$stmt->execute();	
			$id= $this->dbh->lastInsertId();
			echo "<tr id=".$id.">";
				echo "<td>".$film_title."</td>";
				echo "<td>".$thriller."</td>";
				echo "<td>".$film_price."</td>";
				echo "<td>".$genre."</td>";
				echo "<td>".$stock."</td>";
				echo "<td>
			          <button class='delete' onclick='deleteFilm(".$content[0].")'>DELETE</button>
			          <button class='edit' onclick='editFilm(".$content[0].")'>EDIT</button>
			         </td>";
			echo "<tr>";
			$this->closeConn();
		}
		
		function delete_film_by_admin($film_id){
		
			$this->openConn();
			$stmt= $this->dbh->prepare("DELETE FROM film where film_id=?");
			$stmt->bindParam(1,$film_id);
			$stmt->execute();
			$this->closeConn();
		}
		
		
		function retrieve_film_by_admin($film_id){
		
			$this->openConn();
			$stmt = $this->dbh->prepare("SELECT * FROM film where film_id= ?;");
			$stmt->bindParam(1,$film_id);
			$stmt->execute();
			$record = $stmt->fetch();
			$film = array(
			            "film_id"=>$record[0],
			            "film_title"=>$record[1],
			            "thriller"=>$record[2],
			            "film_price"=>$record[3],
			            "genre"=>$record[4] ,
			            "stock"=>$record[5]  
					);
			$json_string = json_encode($film);
			   
			echo $json_string;
			   
			$this->closeConn();
		
		}
			function edit_film_by_admin($film_id,$film_title,$thriller,$film_price,$genre,$stock){
		
			$this->openConn();
			$stmt = $this->dbh->prepare("UPDATE film SET film_title=?, thriller=?, film_price=?, genre=?, stock=? where film_id=?;");
			$stmt->bindParam(1,$film_title);
			$stmt->bindParam(2,$thriller);
			$stmt->bindParam(3,$film_price);
			$stmt->bindParam(4,$genre);
			$stmt->bindParam(5,$stock);
			$stmt->bindParam(6,$film_id);
			$stmt->execute();
			
			$this->closeConn();
			
			echo "<td>".$film_title."</td>";
			echo "<td>".$film_price."</td>";
			echo "<td>
		          <button class='delete' onclick='deleteFilm(".$film_id.")'>DELETE</button>
		          <button class='edit' onclick='editFilm(".$film_id.")'>EDIT</button>
		         </td>";
			}
		
		function admin_view_customers_info(/*$id*/){
	     	$this->openConn();
	        $stmt=$this->dbh->prepare("SELECT utf.id,u.user_id, utf.date_buy,u.firstname,u.lastname,f.film_title,f.film_price,utf.status from user_to_film as utf,user as u, film as f where u.user_id=utf.user_id  and f.film_id=utf.film_id  ORDER BY utf.id DESC;");
	      	$stmt->execute();
	      
	     
	         
	         while($content = $stmt->fetch()){    
	           echo "<tr>";
	            echo "<td>".$content[2]."</td>";
	            echo "<td>".$content[3]."</td>";
	            echo "<td>".$content[4]."</td>";
	            echo "<td>".$content[5]."</td>";
	            echo "<td>".$content[6]."</td>";
	            echo "</tr>";         
	         }
	      
	       $this->closeConn();
	   }
	   
	   function click_if_delivered($user_id,$cash,$total_payment,$date_pay){
		
			$this->openConn();			
			$stmt3=$this->dbh->prepare("SELECT u.user_id, f.film_id from user_to_film as utf,user as u, film as f where u.user_id=utf.user_id  and f.film_id=utf.film_id and utf.status='HINDI PA NA DIDELIVER' ORDER BY utf.id DESC;");
			$stmt3->execute();
			$user_id = $stmt3->fetch();
			
			$money_change = $cash-$total_payment;
			
			$stmt2=$this->dbh->prepare("INSERT INTO payments (cash, total_payment, money_change) VALUES (?,?,?); ");
			$stmt2->bindParam(1,$cash);
			$stmt2->bindParam(2,$total_payment);
			$stmt2->bindParam(3,$money_change);
			
			$stmt2->execute();
			$payment_id= $this->dbh->lastInsertId();
		
			$stmt=$this->dbh->prepare("INSERT INTO user_to_payments (user_id, payment_id, date_pay) VALUES (?,?, ?)");
			$stmt->bindParam(1, $user_id[0]);
			$stmt->bindParam(2, $payment_id);
			$stmt->bindParam(3,$date_pay);
			$stmt->execute();
			
			
			$stmt= $this->dbh->prepare("UPDATE user_to_film set status='TAPOS NA PAGDILIVER' where user_id=?;");
			$stmt->bindParam(1,$user_id[0]);
			$stmt->execute();
			
			
			
			$this->closeConn();
		}
	    
	   function getAdminFullName($admin_username){
	      $this->openConn();
	      $stmt= $this->dbh->prepare("SELECT firstname,lastname from admin_info where admin_username=?;");
	      $stmt->bindParam(1,$admin_username);
	      $stmt->execute();
	      $this->closeConn();
	      
	      while($content = $stmt->fetch()){
	         echo "<tr>";
	            echo "<td>".$content[0]."</td>";
	            echo "<td>".$content[1]."</td>";
	         echo "</tr>";
	      }
	   }
	   
	   function getTotalPayment(){
	      $this->openConn();
			 $stmt2=$this->dbh->prepare("select user.user_id, firstname,lastname,date_buy,sum(film_price),user.address from user,film,user_to_film where user.user_id=user_to_film.user_id and film.film_id=user_to_film.film_id and user_to_film.status='TAPOS NA PAGDILIVER' group by firstname ;");
	         $stmt2->execute();
	         while($content = $stmt2->fetch()){    
	           echo "<tr>";
	            echo "<td>".$content[1]."</td>";
	            echo "<td>".$content[2]."</td>";
	            echo "<td>".$content[3]."</td>";
	            echo "<td>".$content[4]."</td>";
	            echo "<td>";
	            	echo "<p class='add_payment'>paid and delivered</p>";
	           echo "</td>";
	            echo "<td>@</td>";
	            echo "<td>".$content[5]."</td>";
	            echo "</tr>";         

	         }
	      
	      
	      $stmt = $this->dbh->prepare("select user.user_id,firstname,lastname,date_buy,sum(film_price),user.address from user,film,user_to_film where user.user_id=user_to_film.user_id and film.film_id=user_to_film.film_id and user_to_film.status='HINDI PA NA DIDELIVER' group by firstname	;");
	      $stmt->execute();
	      
	      $this->closeConn();
	         
	         while($content = $stmt->fetch()){    
	           echo "<tr>";
	            echo "<td>".$content[1]."</td>";
	            echo "<td>".$content[2]."</td>";
	            echo "<td>".$content[3]."</td>";
	            echo "<td>".$content[4]."</td>";
	            echo "<td>";
	            	echo "<button class='delivered' onclick='delivered(".$content[0].")' >NOT YET DELIVERED</button>";
	           echo "</td>";
	            echo "<td>@</td>";
	            echo "<td>".$content[5]."</td>";
	            echo "</tr>";         
	         }
	         
	   }
	   
	   //pag retrieve sa film_price


		function retrieve_film_total_payment($user_id){
		
			$this->openConn();
			$stmt=$this->dbh->prepare(" SELECT sum(film_price) from film , user,user_to_film where film.film_id=user_to_film.film_id  and user.user_id = user_to_film.user_id and user.user_id=? and user_to_film.status='HINDI PA NA DIDELIVER';");
			$stmt->bindParam(1,$user_id);
			$stmt->execute();
			$record = $stmt->fetch();
					
			echo $record[0];			   
			$this->closeConn();
		
		}
	   

		function getTotalSalesByDaTe(){
			$this->openConn();
			$stmt= $this->dbh->prepare("select user_to_payments.date_pay, sum(total_payment) from user,payments,user_to_payments where user.user_id=user_to_payments.user_id and payments.payment_id=user_to_payments.payment_id group by date_pay;");
			$stmt->execute();
			$this->closeConn();
			while($content = $stmt-> fetch()){
				echo "<tr>";
					echo "<td>".$content[0]."</td>";
					echo "<td>".$content[1]."</td>";
				echo "</tr>"; 
			}
			
			
			
		}

	   
	   function total(){
	   	$this->openConn();
	   	$stmt=$this->dbh->prepare(" select firstname,lastname,user_to_film.date_buy,sum(film_price) from user,film,user_to_film where user.user_id=user_to_film.user_id and film.film_id=user_to_film.film_id and user_to_film.status='TAPOS NA PAGDILIVER' group by firstname,date_added;");
	   	$stmt->execute();
	   	$this->closeConn();
	   	while($content = $stmt-> fetch()){
				echo "<tr>";
					echo "<td>".$content[0]."</td>";
					echo "<td>".$content[1]."</td>";
					echo "<td>".$content[2]."</td>";
					echo "<td>".$content[3]."</td>";
				echo "</tr>"; 
			}
	   }
	   
	   function admin_view_users(){
	   	$this->openConn();
	   	$stmt=$this->dbh->prepare("SELECT user_id,firstname,lastname, address, date_register FROM user;");
	   	$stmt->execute();
	   	
	   	while($content =$stmt->fetch()){
	   		echo "<tr>";
	   			echo "<td>".$content[1]."</td>";
	   			echo "<td>".$content[2]."</td>";
	   			echo "<td>".$content[3]."</td>";
	   			echo "<td>".$content[4]."</td>";
	   		echo "</tr>";
	   	}
	   	
	   	
	   }


	   	function view_payment_table(){
	   	$this->openConn();
	   	$stmt2 = $this->dbh->prepare("SELECT * from user_to_film where status='TAPOS NA PAGDILIVER'; ");
	   	$stmt2->execute();
	   	
	   	$content = $stmt2->fetch();
	   	
	   	 $stmt=$this->dbh->prepare("select  u.firstname,u.lastname, total_payment , date_pay, u.user_id from user as u, payments as p, user_to_payments as utp where u.user_id=utp.user_id and p.payment_id=utp.payment_id;");
		$stmt->execute();
			$row = $stmt->fetch();

				echo "<tr>";
					echo "<td>".$row[0]."</td>";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "<td>".$content[3]."</td>";
					echo "<td>".$row[2]."</td>";
				echo "</tr>";	
			
			$this->closeConn();

	   	}

	   	function view_payment_data(){
	   		$this->openConn();
	   		$stmt = $this->dbh->prepare("select u.firstname, u.lastname, u.address, utp.date_pay, p.cash, p.total_payment, p.money_change from user as u, payments as p, user_to_payments as utp where u.user_id=utp.user_id and p.payment_id=utp.payment_id;");
	   		$stmt->execute();

	   		while($content = $stmt->fetch()){
	   			echo "<tr>";
	   				echo "<td>".$content[0]."</td>";
	   				echo "<td>".$content[1]."</td>";
	   				echo "<td>".$content[2]."</td>";
	   				echo "<td>".$content[3]."</td>";
	   				echo "<td>".$content[4]."</td>";
	   				echo "<td>".$content[5]."</td>";
	   				echo "<td>".$content[6]."</td>";
	   			echo "</tr>";
	   		}
	   	}
			
			
   }
?>
