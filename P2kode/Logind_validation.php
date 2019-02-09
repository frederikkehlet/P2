<?php 
// start the session
session_start(); 
$email 		= htmlentities($_POST['email']); 
$password 	= htmlentities($_POST['password']);

// connect to db
require_once 'connection.php';

$query = "SELECT * FROM users WHERE email = '$email'";
$results = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($results);
$hash_password = $row['password'];
$hash = password_verify($password, $hash_password);

if ($hash == 0) {
	header("Location: Logind_failed.php");
	exit();
} else {
	if (isset($email) && isset($password)) {
		if (!empty($email) && !empty($password)) {
			$query = "SELECT * FROM users WHERE email = '$email' AND password = '$hash_password'";
			$results = mysqli_query($connection,$query);
			$row = mysqli_fetch_assoc($results);
			$_SESSION['id'] = $row['id'];
		
			if (mysqli_num_rows($results) > 0) {
				if ($_SESSION['id'] != 1) {
	   				header("Location: Lej_en_bane.php");
	   				exit();
	   			} else {
	   				header("Location: Bane_oversigt.php");
	   				exit();
	   			}
			} else {
				header("Location: Logind_failed.php");
				exit();
			}
		}
	}
}
mysqli_close($connection);
?>