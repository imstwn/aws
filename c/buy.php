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
	<title>Purchasement</title>
	//<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
	<script id="theNavbar" src="../Files/nav.js"></script>
	<?php
		$id = $_GET["id_item"];
		$result = mysqli_query($conn, "SELECT * FROM item WHERE id_item = $id");
		$row = $result->fetch_row();
	?>
	<div class="container mt-5">
		<div class="row">
			<div class="col-3 px-4"><?php echo '<img width="100%" src="data:image/jpeg;base64,'.base64_encode( $row[3] ).'"/>'; ?></div>
			<div class="col-9">
				<div class="h3 my-3"><?= $row[2]; ?></div>
				<div class="h5 my-3"><?= $row[4]; ?></div>
				<input class="btn btn-outline-success my-3" data-bs-toggle="modal" data-bs-target="#buyModal" name="buy" type="submit" id="buy" value="Buy Now">
				<div><?= $row[5]; ?></div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="buyModalLabel">Beli <?= $row[2]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<p id="idItem"><?php echo $row[1] ?></p>
        <div>Amount : <input id="amount" type="number" name="amount"></div>
        <div class="form-floating my-3">
  <textarea class="form-control" placeholder="Masukkan Alamat disini" id="alamatPembeli" style="height: 100px"></textarea>
  <label for="alamatPembeli">Alamat</label>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success" id="buyNow">Beli Sekarang</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#buyNow').click(function(){
			var a = $('#amount').val();
			var alamat = $('#alamatPembeli').val();
			var item = $('#idItem').text();

			if (a != '' && alamat != '') {
				$.ajax({
					url: '../Files/config.php',
					method: 'POST',
					data: {
						pembelian: 'beli',
						a: a,
						alamat: alamat,
						item: item
				   	},
				   	cache: false,
				   	success: function(data){
				   		if (data == 'ok') {
				   			alert('Pembelian Berhasil');
				   			window.location.href = 'product.php';
				   		} else {
				   			alert('Terjadi Kesalahan');
				  		}
				   	},
				   	error: function(xhr, status, error) {
				   		console.error(xhr);
				   	}
				});
			} else {
				alert('Harap Masukkan Jumlah dan Alamat');
			}
		});
	});
</script>
</body>
</html>
