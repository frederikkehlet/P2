<?php 
session_start();
require_once 'connection.php';
if (isset($_POST['deleted'])) {
	$id = $_POST['deleted'];
	$query = "DELETE FROM users WHERE id=" . "'" . $id . "'";

	$results = mysqli_query($connection,$query);
	if ($results) {
		header("Location: Registrer.php");
		exit();
	} else {
		die("Could not query the database".mysqli_error());
	}
}
mysqli_close($connection);
?>