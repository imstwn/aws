<?php

if (!isset($_SESSION)) 
	{ 
	    session_start(); 
	} 

	require '../Files/config.php';
	require '../Files/temp.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Users</title>
</head>
<body>
	<script id="theNavbar" src="../Files/nav.js"></script>


	<div class="container mt-4">
		<div class="text-center">
			<button class="btn btn-outline-success w-100" id="addUser" data-bs-toggle="modal" data-bs-target="#addUserModal">Add User</button>
		</div>

		<div>
			<table class="table table-striped" id="tableUsers">
			<thead>
				<tr class="text-center">
					<th scope="col" width="1">ID</th>
					<th scope="col" width="3">Username</th>
					<th scope="col">Email</th>
					<th scope="col" width="1">Password</th>
					<th scope="col" width="15%">Action</th>
				</tr>
			</thead>
			<?php
			global $conn; 
			$res = mysqli_query($conn,getUsers());
			while ($rows = mysqli_fetch_assoc($res)) {
				// code...
			?>

			<tr id="<?php echo $rows['id'] ?>">
				<td class="text-center" id="idUser"><?php echo $rows['id_user'] ?></td>
				<td class="text-center"><?php echo $rows['username'] ?></td>
				<td class="text-center"><?php echo $rows['email'] ?></td>
				<td class="text-center"><?php echo $rows['password'] ?></td>
				<td class="text-center">
					<button type="button" class="btn btn-success btn-sm" id="accBtn">
						<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-check-lg d-flex align-items-center" viewBox="0 0 16 16">
							<path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
						</svg>
					</button>
					<a class="btn btn-primary" id="seeBtn" data-bs-toggle="modal" href="#seeUserModal" role="button">
						<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-eye d-flex align-items-center" viewBox="0 0 16 16">
							<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
							<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
						</svg>
					</a>
					<button type="button" class="btn btn-danger btn-sm" id="decBtn">
						<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-x-lg d-flex align-items-center" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
							<path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
						</svg>
					</button>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
	</div>
	<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="userModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModal">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
				<div class="form-floating my-2">
					<input type="email" class="form-control" id="emailRegister" placeholder="name@example.com">
					<label for="emailRegister">Email Address</label>
				</div>
				<div class="form-floating my-2">
				<select class="form-select" id="userRole">
					<option value="1">User</option>
					<option value="0">Admin</option>
				</select>
				<label for="userRole">Pilih Role</label>
			</div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="addNow">Add</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="seeUserModal" tabindex="-1" aria-labelledby="seeUser" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="seeUser"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<div class="form-floating my-2">
					<input type="text" class="form-control" id="usernameUser" placeholder="name@example.com">
					<label for="usernameUser">Username</label>
				</div>
				<div class="form-floating my-2">
					<input type="email" class="form-control" id="emailUser" placeholder="name@example.com">
					<label for="emailUser">Email Address</label>
				</div>
				<div class="form-floating my-2">
					<input type="password" class="form-control" id="passwordUser" placeholder="name@example.com">
					<label for="passwordUser">Password</label>
				</div>
				<div class="form-floating my-2">
				<select class="form-select" id="roleUser">
					<option value="2">User</option>
					<option value="1">Admin</option>
				</select>
				<label for="roleUser">Pilih Role</label>
			</div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="updateUser">Update</button>
      </div>
    </div>
  </div>
</div>



	<script>
		$(document).ready(function(){
			$('#addUser').click(function(){
				
				$('#addNow').click(function(){
				var email = $('#emailRegister').val();
				var role = $('#userRole').val();
					if (email != '') {
						$.ajax({
							type: "POST",
							url: "../Files/config.php",
							data: {
								addUser: 'new',
								email: email,
								role: role
							},cache: false,
				   	success: function(data){
				   			alert('Add User Success');
				   			window.location.reload();   		
				  		
				   	},
				   	error: function(xhr, status, error) {
				   		console.error(xhr);
				   	}
						});
					}
				});
			});


			$('#tableUsers').on('click','#accBtn', function(){
				
				var row = $(this).closest("tr");
				var idItem = row.find("#idItem").text();
				alert('a');


				// $.ajax({
				// 	url: '../Files/config.php',
				// 	method: 'POST',
				// 	data: {
				//  		deleteItem: 'del',
				//  		idItem: idItem
				//     	},
				//     	cache: false,
				//     	success: function(data){
				//     		if (data == 'ok') {
				//     			alert('Deleted');
				//     			location.reload();
				//     		} else {
				//     			alert('Error');
				//     		}
				//     	},
				//     	error: function(xhr, status, error) {
				//     		console.error(xhr);
				//     	}
				//     });
			});


			$('#tableUsers').on('click','#seeBtn', function(){
				
				var row = $(this).closest("tr");
				var idUser = row.find("#idUser").text();
				
				$.ajax({
					url: '../Files/config.php',
					method: 'POST',
					data: {
				 		seeUserAcc: 'see',
				 		idUser: idUser
				    	},
				    	cache: false,
				    	success: function(data){
				    		event.preventDefault();
				    		var det = data.split(',');
				    		$('#seeUser').html(det[0]);
				    		
				    		$('#usernameUser').val(det[0]);
				    		$('#emailUser').val(det[1]);
				    		$('#passwordUser').val(det[2]);
				    		$('#roleUser').val(det[3]);
				    		
				    	},
				    	error: function(xhr, status, error) {
				    		console.error(xhr);
				    	}
				    });

						$('#updateUser').click(function(){
								var usernameUser = $('#usernameUser').val();
				    		var emailUser = $('#emailUser').val();
				    		var passwordUser = $('#passwordUser').val();
				    		var roleUser = $('#roleUser').val();

				    		$.ajax({
									url: '../Files/config.php',
									method: 'POST',
									data: {
										idUser: idUser,
					 					updateUser: 'update',
										usernameUser: usernameUser,
										emailUser: emailUser,
										passwordUser: passwordUser,
										roleUser: roleUser
				 						
					    				},
					    				cache: false,
					    				success: function(data){
				   								if (data == 'ok') {
				   									alert('Updated');
				   									location.reload();
				   								}	else {
				   									alert(data);
				   								}
				  		
				   						}	,	
					    				error: function(xhr, status, error) {
					    					console.error(xhr);
					    				}
					   			 });
				});
			});

			$('#tableUsers').on('click','#decBtn', function(){
				
				var row = $(this).closest("tr");
				var idUser = row.find("#idUser").text();

				$.ajax({
					url: '../Files/config.php',
					method: 'POST',
					data: {
				 		deleteUser: 'del',
				 		idUser: idUser
				    	},
				    	cache: false,
				    	success: function(data){
				    		if (data == 'ok') {
				    			alert('Deleted');
				    			location.reload();
				    		} else {
				    			alert('Error');
				    		}
				    	},
				    	error: function(xhr, status, error) {
				    		console.error(xhr);
				    	}
				    });
			});
		});
	</script>

</body>
</html>