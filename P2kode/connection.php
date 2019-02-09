<?php 
$connection = mysqli_connect('localhost', 'root','','userdb');
if(!$connection) {
	die("Kan ikke forbinde til databasen".mysqli_connect_error());
}
?>