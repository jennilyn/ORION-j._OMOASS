  $(document).ready(function(){
	            $("#payment").hide();
	            $("#d2").hide();
	            $("#d3").hide();
	            $("#p1").click(function(){
	                $("#table_user").slideDown(200);
	                $("#d2").hide();
	                $("#d3").hide();
	                $("#home").hide();
	            });
	               $("#p2").click(function(){
	                $("#d2").slideDown(200);
	                $("#table_user").hide();
	                $("#d3").hide();
	                $("#home").hide();
	            });
	            $("#cust").click(function(){
	                $("#d3").slideDown(200);
	                $("#table_user").hide();
	                $("#d2").hide();
	                $("#home").hide();
	            });
	            
	            
	     
									
				$("#user_total_payment").hide();
				$("#sales_by_date").hide();
				$("#total_table").hide();
				$("#payment_table").hide();
				$("#payment_info").hide();
					
				$("#option1").click(function(){
					$("#sales_by_date").hide();
					$("#total_table").hide();
					$("#payment_table").hide();
					$("#payment_info").hide();
					$("#user_total_payment").slideDown();
				});
				$("#option2").click(function(){
					$("#total_table").hide();
					$("#payment_table").hide();
					$("#user_total_payment").hide();
					$("#payment_info").hide();
					$("#sales_by_date").slideDown();
				});
				$("#option3").click(function(){
					$("#user_total_payment").hide();
					$("#payment_table").hide();
					$("#sales_by_date").hide();
					$("#payment_info").hide();
					$("#total_table").slideDown();
				});
				$("#option4").click(function(){
					$("#sales_by_date").hide();
					$("#user_total_payment").hide();
					$("#total_table").hide();
					$("#payment_table").slideDown();
					$("#payment_info").slideDown();
					
				});
							
	            
	            function change(){
								 var data_object = {
								   		"cash":$("input[name = 'cash']").val(),
								   		"total_payment":$("input[name = 'total_payment' ]").val(),
								   		"change_p":$("input[name = 'change_p']").val() - $("input[name = 'total_payment' ]").val()
								};
								   						
								var change = $("input[name = 'cash']").val() - $("input[name = 'total_payment' ]").val();

								alert(change);
							}
							$(document).ready(function(){
								$("#btn").click(function(){
									$("#p2").html(change());
								});
							});

	               
	        });
