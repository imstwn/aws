<?php 
	session_start();
	require '../Files/config.php';
	include '../Files/temp.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ganti Password</title>
</head>
<body>
	<!-- NavBar start-->
	<script id="theNavbar" src="../Files/nav.js"></script>
	<!-- NavBar end -->

	<div class="container p-5">
		<div class="input-group my-2">
						<span class="input-group-text">Old Password</span>
						<input type="password" aria-label="oldPassword" name="oldPassword" id="oldPassword" class="form-control" placeholder="********" >
					</div>


		<div class="input-group my-2">
						<span class="input-group-text">New Password</span>
						<input type="password" aria-label="newPassword" name="newPassword" id="newPassword" class="form-control" placeholder="********" >
					</div>


		<div class="input-group my-2">
						<span class="input-group-text">Confirm Password</span>
						<input type="password" aria-label="renPassword" name="renPassword" id="renPassword" class="form-control" placeholder="********" >
					</div>

					<input class="btn btn-info text-white" type="submit" id="simpanEditPass" value="Ganti Password"></input>
	</div>
	

	<script>
		$(document).ready(function(){
			$('#simpanEditPass').click(function(){
				event.preventDefault();
				var oldPass = $('#oldPassword').val();
				var newPass = $('#newPassword').val();
				var renPass = $('#renPassword').val();

				if (oldPass != '' && newPass != '' && renPass != '') {
					if (newPass == renPass) {
						$.ajax({
	                        type: 'POST',
	                        url: '../Files/config.php',
	                        data: {
	                            editPassword: 'editPass',
								oldPass: oldPass,
								newPass: newPass
	                        }
	                    }).done(function(data){

	                    	if (data == 'ok') {
	                    		alert('Password Changed');
		                        $("#oldPassword").val('');
		                        $("#newPassword").val('');
		                        $("#renPassword").val('');
	                    	} else if (data == 'notok') {
	                    		alert('Wrong Password');
	                    	}
	                    	
	                    });
					} else {
						alert("Passwords ain't Same");
					}
				} else {
					alert('Please Fill Password');
				}
			});
		});
	</script>
</body>
</html>