$(document).ready(function (){

 
     $.ajax({
     
      type: "POST",
      url: "view_users_to_film_info_by_admin.php",
      success: function(data){
         $("#film4").append(data);

      },
      error: function (data){

      }
     
     });   
     
     $.ajax({
     	type: "POST",
     	url: "total.php",
     	success: function(data){
     		$("#total_table").append(data);
     	},
     	error: function(data){	

     }
     });  
      
   $.ajax({
		type: "POST",
		url: "view_film_one_to_ten.php",
		success: function(data){
			$("#film").append(data);		
		},
		error: function(data){

		}
	});
	
	 $.ajax({
		type: "POST",
		url: "view_all_film.php",
		success: function(data){

			$("#film2").append(data);		
		},
		error: function(data){

		}
	});
	
	$.ajax({
	   type: "POST",
	   url: "view_film_in_receipt.php",
	   data: {"username" : $("input[name = 'username']").val()},
	   success: function(data){
	      $("#receipt").append(data);

	   },
	   error: function(data){

	   }
	});
	
	$.ajax({
	   type: "POST",
	   url: "getUserFullName.php",
	   data: {"username" :$("input [name = 'username']").val()},
	   success: function(data){
	      $("#p_fullname").append(data);

	   },
	   error: function (data){

	   }
	});
	
	$.ajax({
	   type: "POST",
	   url: "getAdminFullName.php",
	   data: {"admin_username" :$ ("input[name = 'admin_username']").val() },
	   success: function(data){
	      $("#admin_fullname").append(data);
	   },
	   error: function(data){

	   }
	});
	
	
	
	$.ajax({
	   type: "POST",
	   url: "getTotalPayment.php",
	   success: function(data){
	      $("#user_total_payment").append(data);

	   },
	   error:function(){

	   }
	});
	
	$.ajax({
		type: "POST",
		url: "getTotalSalesByDaTe.php",
		success: function(data){
			$("#sales_by_date").append(data);
		},
		error: function(data){

		}
	});
	
	$.ajax({
		type: "POST",
		url: "view_all_film_again.php",
		success: function(data){
			$("#film3").append(data);		
		},
		error: function(data){

		}
	});
		
	$.ajax({
	   type: "POST",
	   url: "admin_view_customers_info.php",
	   success: function(data){
	      $("#customer_info").append(data);
	   },
	   error: function(data){

	   }
	});
	
 $("#choose_add").click(function(){
 
	 	$("#marry").dialog({
	 		show: {effect: "slide", direction: "left"},
	 		hide: {effect: "slide", direction: "right"},
	 		modal: true,
	 		draggable: false,
	 		resizable: true,
	 		width: 800,
	 		height: 800,
	 		buttons: {
	 			"ADD": function() {
	 				var wordObj = {
						"date_added":$("input[name='date']").val(),
						"film_title":$("input[name='film_title']").val(), 
						"thriller":$("input[name='thriller']").val(),
						"film_price":$("input[name='film_price']").val(),
						"genre":$("select[name='genre']").val(),
						"stock":$("input[name='stock']").val()
					};
		 				$.ajax({
							type: "POST",
							url: "add_film_by_admin.php",
							data: wordObj,
							success: function(data){

								$("#film2").append(data);
								$(document.location.reload(true));

							},
							error: function(data){
								alert(data);		
							}
						});	
						
						$(this).dialog("close");	
	 			},
	 			"CANCEL": function() {
		 			$(this).dialog("close");
		 		}
		 	}
	 	});
	 });
	 
	 $(".edit").click(function() {
		
	});
	 
	 
	$(".a_logout").click(function(){
		$.ajax({
			type: "POST",
			url: "logout.php",
			data: {"username":$("input[name='username']").val()},
			success: function(data){

			},
			error: function(data){

			}
		});
	});
	
	$("#btn_register").click(function(){
		var address = $("input[name='address']").val() + " " + $("#extension").val();
	    var wordObj={       
		    "firstname":$("input[name='firstname']").val(),
		    "lastname":$("input[name='lastname']").val(),
			 "username":$("input[name='entered_username']").val(), 
			 "password":$("input[name='entered_password']").val(),
			 "date_register":$("input[name='date']").val(),
			 "address": address,
		};
		alert('wew');
		alert(JSON.stringify(wordObj));
   		$.ajax({
   			type: "POST",
   			url: "add_user.php",
   			data: wordObj,
   			success: function(data){
   				$("#users").append(data);
   				alert("welcome new member "+ data);
   			},
   			error: function(data){
   				alert("error in sign up " + JSON.stringify(data) + data);
   			}
   		});	
   					
    });
    

	$("#search").keyup(function(){
			var wordObj = {"film_title":$(this).val()};
			$.ajax({
				type: "POST",
				url: "search.php",
				data: wordObj,
				success: function(data){
					console.log(data);

					$("#film2").html(data);
				},
				error: function(data){
					alert("something wrong in searching this data: ->"+data);		
				}
			});			
			
	});
		
		$.ajax({
			type: "POST",
			url: "admin_view_users.php",
			success: function(data){
				$("#users").append(data);
			},
			error: function(){
				alert("something wrong in viewing admin view users this data: ->"+data);
			}
		});
		
		$.ajax({
			type: "POST",
			url: "view_payment_table.php",

			success: function(data){
				$("#payment_table").append(data);

			},
			error: function(data){

			}
		});


		$.ajax({
			type: "POST",
			url: "view_payment_data.php",
			success: function(data){
				$("#payment_info").append(data);
			},
			error: function(data){

			}
		});
		
		
});

	function buyFilm(film_id){
	   var BuyFilm = {"film_id":film_id, 
	   		"date_buy":$("input[name='date_buy']").val(),
	   		"status":$("input[name='status']").val()
	   };
	   $.ajax({
		  type: "POST",
		  url: "click_to_buy_film.php",
		  data: BuyFilm,
		  success: function(data){

		    var obj = JSON.parse(data);
		    $("#reciept").append("<tr><td>"+ obj.firstname +"</td><td>" + obj.lastname + "</td><td>" + obj.film_title + "</td><td>" + obj.film_price + "</td></tr>");      
		  },
		  error: function(data){

		  }
	   });
	   
	   	
	}



function editFilm(film_id){
   var wordObj = {"film_id":film_id};
    $.ajax({
      type: "POST",
      url: "retrieve_film_by_admin.php",
      data: wordObj,
      success: function(data){
        var obj = JSON.parse(data);
        $("input[name = 'film_id']").val(obj.film_id);
        $("input[name = 'film_title']").val(obj.film_title);
        $("input[name = 'thriller']").val(obj.thriller);
        $("input[name = 'film_price']").val(obj.film_price);
        $("select[name= 'genre']").val(obj.genre);
         $("input[name='stock']").val(obj.stock);
      },
      error: function(data){
            alert (data);
      }
   });
	$( "#marry" ).dialog({
			show: {effect: "slide", direction: "left"},
	 		hide: {effect: "slide", direction: "right"},
			resizable: true,
			height:700,
			width: 800,	
			modal: true,
			buttons: {
				"save": function() {
					alert ("AMBOT!");
					var wordObj = {
						"film_id":$("input[name='film_id']").val(),
						"thriller":$("input[name='thriller']").val(),
						"film_title":$("input[name = 'film_title']").val(),
						"film_price":$("input[name = 'film_price']").val(),
						"genre":$("select[name='genre']").val(),
						"stock":$("input[name='stock']").val()
					};

					$.ajax({
						type: "POST",
						url: "edit_film_by_admin.php",
						data: wordObj,
						success: function(data){ 
								$(document.getElementById(wordObj.film_id)).html(data);
								$(document.location.reload(true));

						},
						error: function (data){

						}
					});	
				
				$( this ).dialog( "close" );
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			}
		});
}



function delivered(id){
	alert("wetwew!");

	var wordObj = {"user_id":id};
						   alert ("go to Add Tab!!");
							$.ajax({
							  type: "POST",
							  url: "retrieve_film_price.php",
							  data: wordObj,
							  success: function(data){

								alert("price = " + data);
								$("input[name = 'total_payment']").val(data);
								
							  },
							  error: function(data){
									alert(data);
							  }
						});
	
	$("#payment").dialog({
	 		show: {effect: "slide", direction: "left"},
	 		hide: {effect: "slide", direction: "right"},
	 		modal: true,
	 		draggable: false,
	 		resizable: true,
	 		width: 800,
	 		height: 500,
	 		buttons: {
	 			"PAY":function(){
	 				 	var obj = {
								"cash":$("input[name='cash']").val(),
								"total_payment":$("input[name='total_payment']").val(),
								"date_pay":$("input[name='date_pay']").val(),
								"user_id":id
							};
						$.ajax({
							type: "POST",
							url: "click_if_delivered.php",
							data: obj,
							success: function(data){

							},
							error: function(data){
								alert("something wrong in adding this data "+ data);
							}
						});
						$(this).dialog("close");		
	 			},
	 			"CANCEL": function() {
		 			$(this).dialog("close");
		 		}
	 			
	 		}
	 	});
}


function deleteFilm(film_id){
	var wordObj = {"film_id":film_id};
	$.ajax({
		type: "POST",
		data: wordObj,
		url: "delete_film_by_admin.php",
		success: function(data){
			$(document.getElementById(film_id)).remove(); 

		},
		error: function(){

		}
	});
	$("#delete_warning").dialog({
		show: {effect: "slide", direction: "left"},
	 		hide: {effect: "slide", direction: "right"},
	 		modal: true,
	 		draggable: false,
	 		resizable: true,
	 		width: 800,
	 		height: 500,
	 		buttons: {
	 			"DELETE":function(){
	 				var wordObj = {"film_id":film_id};
					$.ajax({
						type: "POST",
						data: wordObj,
						url: "delete_film_by_admin.php",
						success: function(data){
							$(document.getElementById(film_id)).remove(); 

						},
						error: function(){

						}
					});
					$(this).dialog("close");
	 			},
	 			"CANCEL": function(){
	 				$(this).dialog("close");
	 			}
	 		}
	});
}


function ubos(){
	$("#warning_ubos").dialog({
		show: {effect: "slide", direction: "left"},
	 		hide: {effect: "slide", direction: "right"},
	 		modal: true,
	 		draggable: false,
	 		resizable: true,
	 		width: 800,
	 		height: 500,
	 		buttons: {
	 			"OKAY": function(){
	 				$(this).dialog("close");
	 			}
	 		}
	});
}
