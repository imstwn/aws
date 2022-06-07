<?php

	require '../Files/config.php';
	require '../Files/temp.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Purchasement</title>
</head>
<body>
	<script id="theNavbar" src="../Files/nav.js"></script>
	<?php
		$id = $_GET["id_item"];
		$result = mysqli_query($conn, "SELECT * FROM item WHERE id_item = $id");
		$row = $result->fetch_row();
	?>
	<div class="container">
		<div class="row">
			<div class="col-3 px-4"><?php echo '<img width="100%" src="data:image/jpeg;base64,'.base64_encode( $row[3] ).'"/>'; ?></div>
			<div class="col-9">
				<div class="h3 my-3"><?= $row[2]; ?></div>
				<div class="h5 my-3"><?= $row[4]; ?></div>
				<div><?= $row[5]; ?></div>
			</div>
		</div>
	</div>
</body>
</html>