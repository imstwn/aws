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
			<button class="btn btn-outline-success w-100" data-bs-toggle="modal" data-bs-target="#addItemModal">Add Item</button>
		</div>

		<div>
			<table class="table table-striped" id="tablePendaftaran">
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
				<td class="text-center"><?php echo $rows['id_item'] ?></td>
				<td class="text-center"><?php echo $rows['code_item'] ?></td>
				<td class="text-center"><?php echo $rows['name_item'] ?></td>
				<td class="text-center"><?php echo $rows['price_item'] ?></td>
				<td class="text-center"><?php echo $rows['merk_item'] ?></td>
				<td class="text-center">
					<button type="button" class="btn btn-primary btn-sm" id="seeBtn" data-bs-toggle="modal" data-bs-target="#detailPendaftaran">
						<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-eye d-flex align-items-center" viewBox="0 0 16 16">
							<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
							<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
						</svg>
					</button>
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




		<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="itemModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="itemModal">Add Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      		<div class="row g-2">
      			<div class="col-4">
      				<div class="form-floating">
  <input type="text" class="form-control" id="codeItem" placeholder="SP102">
  <label for="codeItem">Code Item</label>
</div>
      			</div>
      			<div class="col-8">
      				<div class="form-floating">
  <input type="text" class="form-control" id="nameItem" placeholder="Samsung">
  <label for="nameItem">Name Item</label>
</div>
      			</div>
      			<div class="col-12">
      				<div class="input-group">
  <label class="input-group-text" for="inputGroupFile01">Upload</label>
  <input type="file" class="form-control" id="inputGroupFile01">
</div>
      			</div>
      			<div class="col-6">
      				<div class="form-floating">
  <input type="text" class="form-control" id="merkItem" placeholder="Merk Item">
  <label for="merkItem">Merk Item</label>
</div>
      			</div>
      			<div class="col-6">
      				<div class="form-floating">
  <input type="text" class="form-control" id="priceItem" placeholder="Price Item">
  <label for="priceItem">Price Item</label>
</div>
      			</div>
      			<div class="col-12">
      				<div class="form-floating">
  <textarea class="form-control" placeholder="Description" id="floatingTextarea2" style="height: 100px"></textarea>
  <label for="floatingTextarea2">Description</label>
</div>
      			</div>
      		</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="addItemBtn">Add</button>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function(){
		$('#addItemBtn').click(function(){
			console.log('click');
		});
	});
</script>

</body>
</html>