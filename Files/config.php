<?php

	if (!isset($_SESSION)) 
	{ 
	    session_start(); 
	} 
//account
// 7nY3cA!e8S imstwn
// 2hG}jf@]G2 bud

//most used password
//G+kMgX.:v6

// db connection
	$conn = mysqli_connect("localhost", "root", "", "aws");

	function randomPass()
	{
		$comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$shfl = str_shuffle($comb);
		$pwd = substr($shfl,0,8);
		return $pwd;
	}

	function getNama($id)
	{
		global $conn;
		$sql = "SELECT name_item FROM item WHERE id_item='$id'";
		$res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($res);
		return $row['name_item'];
	}

	function getImage($id)
	{
		global $conn;
		$sql = "SELECT img_item FROM item WHERE id_item='$id'";
		$res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($res);
		return $row['img_item'];
	}


	if (isset($_POST['registerForm']) && $_POST['registerForm'] == 'register') {
		$username = $_POST['username'];
		$email = $_POST['email'];
		if (mysqli_fetch_assoc(mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'"))) {
			echo "usernameExist";
		} elseif (mysqli_fetch_assoc(mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'"))) {
			echo "emailExist";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "emailFormat";
		} else {
			$password = password_hash(randomPass(), PASSWORD_DEFAULT);
			mysqli_query($conn, "INSERT INTO users (username,email,PASSWORD,ROLE) VALUES ('$username','$email','$password','2')");
			echo "goReg";
		}

	}

	if (isset($_POST['loginForm']) && $_POST['loginForm'] == 'login') {
		$username = $_POST['username'];
		$password = $_POST['pass'];

		$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
		if (mysqli_num_rows($result) == 1) {
			$rowUs = mysqli_fetch_assoc($result);
			if (password_verify($password, $rowUs["password"])) {
	 			$_SESSION["ID_USER"] = $rowUs["id_user"];
	 			if ($rowUs['role'] == 2) {
	 				echo 'user';
	 			} elseif ($rowUs['role'] == 1) {
	 				echo 'admin';
	 			}
	 		} else {
	 			echo "wrong";
	 		}
		}

	}

	if (isset($_POST['pembelian'])) {
		$a = $_POST['a'];
		$alamat = $_POST['alamat'];
		$item = $_POST['item'];

		$ID = $_SESSION["ID_USER"];
		
		$itemsql = "SELECT * FROM item WHERE id_item = '$item'";

		$pr = mysqli_query($conn, $itemsql);

		$row2 = mysqli_fetch_row($pr);
		$base_pay = $row2[4];

		$total = $base_pay * $amount;

		$transql = "INSERT INTO `transaction` (`id_user`, `id_item`, `amount`, `address`, `total`, date) VALUES ('$ID','$item','$amount','$address','$total', NOW())";

		$end = mysqli_query($conn, $transql);
		if (!$end) {
			# code...
			echo "ok";
		} else {
			echo "gagal";
		}
	}
?>