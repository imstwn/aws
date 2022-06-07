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
		$password = $_POST['password'];
		
		$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
		if (mysqli_num_rows($result) === 1) {
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
?>