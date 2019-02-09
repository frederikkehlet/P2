<?php 
error_reporting(0);
session_start();
require 'connection.php';

$user 		= 	$_SESSION['id'];
$hverdag 	= 	$_GET["hverdag"];
$weekend 	= 	$_GET["weekend"];
$date		= 	$_GET['date'];
$club 		=   $_GET['club'];

$queryClub 	= "SELECT club FROM users WHERE id =" . "'" .$_SESSION['id'] ."'";
$resultClub = mysqli_query($connection, $queryClub);
$row = mysqli_fetch_assoc($resultClub);

if (!isset($date)) { ?>
	<script language="javascript">alert('Husk at vælge en dato og tid'); window.location.href = "Lej_en_bane.php";</script>
<?php } else {
	if (!empty($weekend)) {
	$queryWeekend = "INSERT into bookings VALUES('$user','$weekend','$date','$club')";
	$resultWeekend = mysqli_query($connection,$queryWeekend);
	} else {
		$queryWeekday = "INSERT into bookings VALUES('$user','$hverdag','$date','$club')";
		$resultWeekday = mysqli_query($connection,$queryWeekday);
	}
}
if ($user != 1) {
	header ("Location: Lej_en_bane.php");
	exit();
	} else {
	header("Location: Bane_oversigt.php");
	exit();	
}
?>