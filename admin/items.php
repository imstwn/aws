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
	<title>Items</title>
</head>
<body>
	<script id="theNavbar" src="../Files/nav.js"></script>

	<div class="container mt-4">
		<div class="text-center">
			<button class="btn btn-outline-success w-100" data-bs-toggle="modal" data-bs-target="#addItemModal" onclick="window.location.href = 'add-item.php'">Add Item</button>
		</div>

		<div>
			<table class="table table-striped" id="tableItems">
			<thead>
				<tr class="text-center">
					<th scope="col" width="1">ID</th>
					<th scope="col" width="3">Code</th>
					<th scope="col">Name</th>
					<th scope="col" width="1">Price</th>
					<th scope="col" width="1">Merk</th>
					<th scope="col" width="15%">Action</th>
				</tr>
			</thead>
			<?php
			global $conn; 
			$res = mysqli_query($conn,getItems());
			while ($rows = mysqli_fetch_assoc($res)) {
				// code...
			?>

			<tr id="<?php echo $rows['id'] ?>">
				<td class="text-center" id="idItem"><?php echo $rows['id_item'] ?></td>
				<td class="text-center"><?php echo $rows['code_item'] ?></td>
				<td class="text-center"><?php echo $rows['name_item'] ?></td>
				<td class="text-center"><?php echo $rows['price_item'] ?></td>
				<td class="text-center"><?php echo $rows['merk_item'] ?></td>
				<td class="text-center">
					<a class="btn btn-primary" id="seeBtn" data-bs-toggle="modal" href="#seeItemModal" role="button">
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

		<div class="modal fade" id="seeItemModal" tabindex="-1" aria-labelledby="seeItem" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="seeItem"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form method="post" enctype="multipart/form-data">
      		<div class="row g-2">
      			
      				<div class="col-4">
      				<div class="form-floating">
  <input type="text" class="form-control" id="codeItem" placeholder="SP102">
  <label for="code">Code Item</label>
</div>
      			</div>
      			<div class="col-8">
      				<div class="form-floating">
  <input type="text" class="form-control" id="namaItem" placeholder="Samsung">
  <label for="nama">Name Item</label>
</div>
      			</div>
      			<div class="col-6">
      				<div class="form-floating">
  <input type="text" class="form-control" id="merkItem" placeholder="Merk Item">
  <label for="merk">Merk Item</label>
</div>
      			</div>
      			<div class="col-6">
      				<div class="form-floating">
  <input type="number" class="form-control" id="priceItem" placeholder="Price Item">
  <label for="price">Price Item</label>
</div>
      			</div>
      			<div class="col-12">
      				<div class="form-floating">
  <textarea class="form-control" placeholder="Description" id="descItem" style="height: 160px"></textarea>
  <label for="desc">Description</label>
</div>
      			</div>
      			
      		</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-bs-target="#seeSeeItem" data-bs-toggle="modal" data-bs-dismiss="modal">Image</button>
        <button type="submit" class="btn btn-success" name="setItem" id="setItem">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="seeSeeItem" aria-hidden="true" aria-labelledby="seeImageMod" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
      	<div id="theImg"></div>
        
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#seeItemModal" data-bs-toggle="modal" data-bs-dismiss="modal" id="backItem">Back</button>
      </div>
    </div>
  </div>
</div>

<script>
	
	$('#tableItems').on('click','#seeBtn', function(){
				
				var row = $(this).closest("tr");
				var idItem = row.find("#idItem").text();
				//var idPend = row.find("#idPendaftaran").text();

				$.ajax({
					url: '../Files/config.php',
					method: 'POST',
					data: {
				 		seeItemNow: 'see',
				 		idItem: idItem
				    	},
				    	success: function(data){
				    		event.preventDefault();
				    		var det = data.split(',');
				    		$('#seeItem').html(det[1]);
				    		$('#codeItem').val(det[0]);
				    		$('#namaItem').val(det[1]);
				    		$('#priceItem').val(det[2]);
				    		$('#merkItem').val(det[3]);
				    		$('#descItem').val(det[4]);
				    		
				    	},
				    	cache: false,
				    	error: function(xhr, status, error) {
				    		console.error(xhr);
				    	}
				    });	

				$('#seeSeeItem').click(function(){

					$.ajax({
						url: '../Files/config.php',
						method: 'POST',
						data: {
					 		seeImageNow: 'see',
				 			idItem: idItem
					    	},
					    	cache: false,
					    	success: function(data){
				   					$('#theImg').html(data); 		
				  		
				   			}	,	
					    	error: function(xhr, status, error) {
					    		console.error(xhr);
					    	}
					    });

					    $('#backItem').click(function(){
								$('#theImg').html('');
							});
				});

				$('#setItem').click(function(){
								var codeItem = $('#codeItem').val();
				    		var namaItem = $('#namaItem').val();
				    		var priceItem = $('#priceItem').val();
				    		var merkItem = $('#merkItem').val();
				    		var descItem = $('#descItem').val();	

				    		$.ajax({
									url: '../Files/config.php',
									method: 'POST',
									data: {
										idItem: idItem,
					 					updateItem: 'update',
										codeItem: codeItem,
										namaItem: namaItem,
										priceItem: priceItem,
										merkItem: merkItem,
										descItem: descItem
				 						
					    				},
					    				cache: false,
					    				success: function(data){
				   								if (data == 'ok') {
				   									alert('Updated');
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

	$('#tableItems').on('click','#decBtn', function(){
				
				var row = $(this).closest("tr");
				var idItem = row.find("#idItem").text();


				$.ajax({
					url: '../Files/config.php',
					method: 'POST',
					data: {
				 		deleteItem: 'del',
				 		idItem: idItem
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

</script>



</body>
</html>