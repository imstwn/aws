<?php

if (!isset($_SESSION)) 
	{ 
	    session_start(); 
	} 

	require '../Files/config.php';
	require '../Files/temp.php';

if(isset($_POST['addItemBtn'])) {
    if (!empty($_POST['nama']) && !empty($_POST['code']) && !empty($_POST['price']) && !empty($_POST['desc']) && !empty($_POST['merk'])) {
    	# code...
    	$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
    	$code = $_POST["code"];
   		$name = $_POST["nama"];
    	$price = $_POST["price"];
    	$desc = $_POST["desc"];
    	$merk = $_POST["merk"];

    	$query = "INSERT INTO `item`(`code_item`, `name_item`, `img_item`, `price_item`, `desc_item`, `merk_item`) VALUES ('$code','$name','$image','$price','$desc','$merk')";
    	$res = mysqli_query($conn, $query);

    	if (!$res) { // Error handling
    	echo "<script>alert('Failed');</script>";

    	} else {
	    	# code...
	    	echo "<script>alert('Successfully Added');</script>";
	    	header('Location: items.php');
	    }
	} else {
		echo "<script>alert('Fill Inputs');</script>";
	}
}
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
		
    	<form method="post" enctype="multipart/form-data">

      		<div class="row g-2">
      			
      				<div class="col-4">
      				<div class="form-floating">
  <input type="text" class="form-control" id="code" name="code" placeholder="SP102">
  <label for="code">Code Item</label>
</div>
      			</div>
      			<div class="col-8">
      				<div class="form-floating">
  <input type="text" class="form-control" id="nama" name="nama" placeholder="Samsung">
  <label for="nama">Name Item</label>
</div>
      			</div>
      			<div class="col-12">
      				<div class="input-group">
  <label class="input-group-text" for="image">Upload</label>
  <input type="file" class="form-control" name="image" id="image">
</div>
      			</div>
      			<div class="col-6">
      				<div class="form-floating">
  <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk Item">
  <label for="merkItem">Merk Item</label>
</div>
      			</div>
      			<div class="col-6">
      				<div class="form-floating">
  <input type="number" class="form-control" id="price" name="price" placeholder="Price Item">
  <label for="priceItem">Price Item</label>
</div>
      			</div>
      			<div class="col-12">
      				<div class="form-floating">
  <textarea class="form-control" placeholder="Description" id="desc" name="desc" style="height: 100px"></textarea>
  <label for="descItem">Description</label>
</div>
      			</div>
      			
      		</div>


        <button type="submit" class="btn btn-success" name="addItemBtn">Add</button>

      </form>

</div>
</body>
</html>