<?php 
session_start();
$id = $_SESSION['id'];
require_once 'connection.php';
if(isset($_GET['act_update'])) {
	$first_name 	= 	$_GET['first_name'];
	$last_name		= 	$_GET['last_name'];
	$email			= 	$_GET['email'];
	$number			=	$_GET['number'];
	$club			=	$_GET['club'];

	$insert_query = "UPDATE users SET first_name ="."'".$first_name."'".", last_name ="."'".$last_name."'".", email ="."'".$email."'".", number ="."'".$number."'".", club ="."'".$club."'"." WHERE id = "."'".$id."'";

	$results = mysqli_query($connection, $insert_query);

	if(!$results) {
		echo $insert_query;
		die("Database insert problem".mysqli_connect_error());
	} else {
		if ($id != 1) {
			header ("Location: Min_side.php");
			exit();
		} else {
			header("Location: Min_side_admin.php");
			exit();
		}		
	}
}

mysqli_close($connection);
?>