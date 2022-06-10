<?php 
	session_start();
	require '../Files/config.php';
	include '../Files/temp.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ganti Username</title>
</head>
<body>
	<!-- NavBar start-->
	<script id="theNavbar" src="../Files/nav.js"></script>
	<!-- NavBar end -->

	<div class="container p-5">
		<div class="input-group my-2">
						<span class="input-group-text">Current Username</span>
						<input type="text" aria-label="currentUsername" name="currentUsername" id="currentUsername" class="form-control" disabled>
					</div>


		<div class="input-group my-2">
						<span class="input-group-text">New Username</span>
						<input type="text" aria-label="newUsername" name="newUsername" id="newUsername" class="form-control" >
					</div>

					<input class="btn btn-info text-white" type="submit" id="simpanEditUsn" value="Ganti Username"></input>
	</div>
	

	<script>
		$(document).ready(function(){


			$.ajax({
	                        type: 'POST',
	                        url: '../Files/config.php',
	                        data: {
	                            usn: 'set'
	                        },
	                        success: function(data){
	                        	$("#currentUsername").val(data);
	                        }
	                    });



			$('#simpanEditUsn').click(function(){
				event.preventDefault();
				var newUn = $('#newUsername').val();

				if (currUn != '' && newUn != '') {
						$.ajax({
	                        type: 'POST',
	                        url: '../Files/config.php',
	                        data: {
	                            editUsername: 'edit',
								newUn: newUn
	                        }
	                    }).done(function(data){

	                    	if (data == 'ok') {
	                    		alert('Password Changed');
		                        $("#newUsername").val('');
	                    	} 
	                    	
	                    });
				} else {
					alert('Please Fill Usernames');
				}
			});
		});
	</script>
</body>
</html>