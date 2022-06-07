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
	<title>Product</title>
</head>
<body>
	<script id="theNavbar" src="../Files/nav.js"></script>

	<div class="container mt-4">
		<?php 

			$query = mysqli_query($conn, "SELECT * FROM item");
			while ($data = mysqli_fetch_assoc($query)) {
		?>
		<a href="buy.php?id_item=<?=$data['id_item'];?>" style="text-decoration: none">
			<div class="card text-dark my-3">
				<div class="row g-0">
					<div class="col-md-4 my-3">
						<div class="d-flex justify-content-center">
							<?php echo '<img width="150px" src="data:image/jpeg;base64,'.base64_encode( $data['img_item'] ).'"/>'; ?>
						</div>
						
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h3 class="card-title"><?= $data["name_item"]; ?></h5>
							<div><?= $data["price_item"]; ?></div>
							<p class="card-text"><?= $data["desc_item"]; ?></p>
						</div>
					</div>
				</div>
			</div>
		</a>
	<?php } ?>
	</div>
</body>
</html>