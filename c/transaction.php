<?php

	require '../Files/config.php';
	require '../Files/temp.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Transaction</title>
</head>
<body>
	<script id="theNavbar" src="../Files/nav.js"></script>

	<div class="container">
		<?php
						$us = $_SESSION['ID_USER'];
						$query = mysqli_query($conn, "SELECT * FROM transaction WHERE id_user=$us");


						while ($data = mysqli_fetch_assoc($query))
					{ ?>
						
	<div class="card text-dark my-3">
				<div class="row g-0">
					<div class="col-md-2 my-auto">
						<div class="d-flex justify-content-center">
							<?php echo '<img width="50px" src="data:image/jpeg;base64,'.base64_encode(getImage( $data['id_item'])).'"/>'; ?>
						</div>
						
					</div>
					<div class="col-md-10">
						<div class="card-body">
							<h3 class="card-title"><?= getNama($data['id_item']); ?></h5>
							<p class="card-text">Total Belanja<br><?= $data["total"]; ?></p>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</body>
</html>