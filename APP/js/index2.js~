$(function(){

					$("#div_film2").show();
					
					
					
					$("#btn_horror").click(function(){
						var obj = {
							"genre":$("#btn_horror").val()
						};
							$.ajax({
								type: "POST",
								url: "select_horror.php",
								data: obj,
								success: function(data){
									$("#film2").empty().html(data);
								},
								error: function(data){
									alert("something is wrong! in this data->"+data);
								}
							});	
					});
					
					$("#btn_romance").click(function(){
						var obj = {
							"genre":$("#btn_romance").val()
						};
							$.ajax({
								type: "POST",
								url: "select_romance.php",
								data: obj,
								success: function(data){
									$("#film2").empty().html(data);
								},
								error: function(data){
									alert("something is wrong! in this data->"+data);
								}
							});	
					});
					
					$("#btn_action").click(function(){
						var obj = {
							"genre":$("#btn_action").val()
						};
							$.ajax({
								type: "POST",
								url: "select_action.php",
								data: obj,
								success: function(data){
									$("#film2").empty().html(data);
								},
								error: function(data){
									alert("something is wrong! in this data->"+data);
								}
							});	
					});
					
					$("#btn_comedy").click(function(){
						var obj = {
							"genre":$("#btn_comedy").val()
						};
							$.ajax({
								type: "POST",
								url: "select_comedy.php",
								data: obj,
								success: function(data){
									$("#film2").empty().html(data);
								},
								error: function(data){
									alert("something is wrong! in this data->"+data);
								}
							});	
					});
					
					$("#btn_view_all").click(function(){
						$.ajax({
							type: "POST",
							url: "view_all_film.php",
							success: function(data){
								$("#film2").empty().append(data);
							},
							error: function(data){
								alert(data);
							}
						});
					});


		        	

					
});
