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

	function getUsername($id)
	{
		global $conn;
		$sql = "SELECT username FROM users WHERE id_user='$id'";
		$res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($res);
		return $row['username'];
	}

	function getImage($id)
	{
		global $conn;
		$sql = "SELECT img_item FROM item WHERE id_item='$id'";
		$res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($res);
		return $row['img_item'];
	}

	function getTime()
	{
		global $conn;
		$sql = "SELECT date FROM transaction WHERE id_tr=LAST_INSERT_ID()";
		$res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($res);
		return $row['date'];
	}

	function countUsers() {
		global $conn;

		$sql = "SELECT * FROM users";
		$result = mysqli_query($conn, $sql);
		$amount = mysqli_num_rows($result);
		return $amount;
	}

	function countItems() {
		global $conn;

		$sql = "SELECT * FROM item";
		$result = mysqli_query($conn, $sql);
		$amount = mysqli_num_rows($result);
		return $amount;
	}

	function countTrans() {
		global $conn;

		$sql = "SELECT * FROM transaction";
		$result = mysqli_query($conn, $sql);
		$amount = mysqli_num_rows($result);
		return $amount;
	}

	function getUsers()
	{
		$sql = "SELECT * FROM users";
		return $sql;
	}

	function getItems()
	{
		$sql = "SELECT * FROM item";
		return $sql;
	}

	function getTrans()
	{
		$sql = "SELECT * FROM transaction";
		return $sql;
	}

	function sendEmail($email,$name,$password)
	{
		$to      = $email; // Send email to our user
		$subject = 'Login'; // Give the email a subject 
		$message = '
		 
		Thanks for register!
		Your account has been created, you can login with the following password.
		 
		------------------------
		Username: '.$name.'
		Password: '.$password.'
		------------------------

		You can change password in CHANGE PASSWORD Page.
		 
		'; // Our message above including the link
		                     
		mail($to, $subject, $message); // Send our email
	}

	function sendRec($id,$id_item,$email,$base,$total)
	{
		$to      = $email; // Send email to our user
		$subject = 'Thank You for Your Purchasement'; // Give the email a subject 
		$message = '

		Hi, '.getUsername($id).'
		 
		You have bought our smartphone from our website!
		'. '<img width="150px" src="data:image/jpeg;base64,'.base64_encode(getImage($id_item)).'"/>' .'
		
		 
		--------------------------------------
		Product: '.getNama($id_item).'
		Price: '.$base.' x '.$total.' = '.$base*$total.'
		Purchasement Time: '.getTime($id_item).'
		--------------------------------------

		 
		'; // Our message above including the link
		                     
		mail($to, $subject, $message); // Send our email
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
			$pass = randomPass();
			$password = password_hash($pass, PASSWORD_DEFAULT);
			mysqli_query($conn, "INSERT INTO users (username,email,PASSWORD,ROLE) VALUES ('$username','$email','$password','2')");
			sendEmail($email,$username,$pass);
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
	 			$_SESSION["EMAIL"] = $rowUs["email"];
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
		
		$itemsql = "SELECT * FROM item WHERE code_item = '$item'";

		$pr = mysqli_query($conn, $itemsql);

		$row2 = mysqli_fetch_row($pr);
		$id_item = $row2[0];
		$base_pay = $row2[4];

		$total = $base_pay * $a;

		$transql = "INSERT INTO `transaction` (`id_user`, `id_item`, `amount`, `address`, `total`, date) VALUES ('$ID','$id_item','$a','$alamat','$total', NOW())";

		$end = mysqli_query($conn, $transql);
		
			
			sendRec($ID,$id_item,$_SESSION["EMAIL"],$base_pay,$total);
			
		echo 'ok';
	}

	if (isset($_POST['editPassword'])) {
		// if ($_POST['editPassword'] == 'editPass') {
				$oldPass = $_POST['oldPass'];
				$newPass = $_POST['newPass'];
				$id = $_SESSION["ID_USER"];

			$res = mysqli_query($conn,"SELECT password FROM users WHERE id_user='$id'");
			$row = mysqli_fetch_assoc($res);
			if (password_verify($oldPass,$row['password'])) {
				$ps = password_hash($newPass, PASSWORD_DEFAULT);
				
				$result = mysqli_query($conn,"UPDATE users SET password='$ps' WHERE id_user='$id'");
				if ($result) {
						echo 'ok';
				} else {
				echo "notok";
				}
			} 
		// }
	}
?>