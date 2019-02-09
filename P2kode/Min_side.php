<?php 
session_start();
require 'functions.php';
if (!isset($_SESSION['id'])) {
	header("Location: Log_Ind.php");
} 
require_once 'connection.php';
$query = "SELECT * FROM users WHERE id =" . "'" . $_SESSION['id'] . "'";
$results = mysqli_query($connection,$query);
if(!$results) {
	die("could not query the database".mysqli_error());
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Min side</title>
	<link rel="shortcut icon" href="Billeder/AaBlogo.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="CSS/styles.css?v=14">
</head>
	<body>
		<div class="header"><!-- header -->
			<div class="wrapper">
				<div class="logo">
					<a href="Lej_en_bane.php"><img src="Billeder/AaBlogo.png"></a>
				</div>
				<div class="email">
					<?php echo "Logget ind: ";?>
					<a href="Min_side.php"><?php echo getUserData($_SESSION['id'],"first_name");?></a>
				</div>				
				<div class="button">
					<button  onclick="window.location.href='http://localhost/P2kode/Lej_en_bane.php'">Lej en bane</button>
					<button class="disabled" onclick="window.location.href='http://localhost/P2kode/Min_side.php'" style="background-color: #BF0D0D; border: 3px solid white; color: white; text-decoration: underline;">Min side</button>
					<button onclick="window.location.href='http://localhost/P2kode/log_out.php'">Log ud</button> 
				</div>
			</div>
		</div><!-- End header -->
		<div class="main"><!-- main -->
			<!-- KODE TIL MIN SIDE HER -->
			<div id="bookede_tider" style="text-align: center;font-size:20px;">
				<p>Bookede tider</p><hr>
					<?php
					$queryBookings1 = "SELECT DISTINCT * FROM bookings JOIN timeweekends WHERE bookings.timeID = timeweekends.timeID AND bookings.user = ". "'" . $_SESSION['id'] ."'";
					$queryBookings2 = "SELECT DISTINCT * FROM bookings JOIN time WHERE bookings.timeID = time.timeID AND bookings.user = ". "'" . $_SESSION['id'] ."'";

					$resultBookings1 = mysqli_query($connection, $queryBookings1);
					$resultBookings2 = mysqli_query($connection, $queryBookings2);

					?>
					<table>
						<thead>
							<th>Klub</th>
							<th>Dato</th>
							<th>Tid</th>
						</thead>
					<tbody>
					<?php 
					while ($row = mysqli_fetch_assoc($resultBookings1) OR $row = mysqli_fetch_assoc($resultBookings2)) {
						$newFormat = date("d/m Y", strtotime($row['date']));
					?>
					<tr>
						<td><?php echo $row["club"]; ?></td>
						<td><?php echo $newFormat; ?></td>
						<td><?php echo $row["timeiv"]; ?></td>
					</tr>				
					<?php } ?>
					</tbody>
				</table>
			</div>
			<div id="kontakt_oplysninger">
				<p style="text-align: center;font-size:20px;">Dine kontakt oplysninger</p><hr>
				<div>
					<div>
					<ul>
					<?php $row = mysqli_fetch_assoc($results); ?>
						<li><b>Navn:</b> <?php echo $row["first_name"]; ?></li><br>
						<li><b>Efternavn:</b> <?php echo $row["last_name"]; ?></li><br>
						<li><b>Email:</b> <?php echo $row["email"]; ?></li><br>
						<li><b>Tlf nummer:</b> <?php echo $row["number"]; ?></li><br>
						<li><b>Klub:</b> <?php echo $row["club"]; ?></li>
					</ul>	
					<hr>
					<div class="buttons">
						<form action="delete_data.php" method="POST" style="float:left;border:none;">
							<input type="hidden" name="deleted" value="<?php echo $row['id']; ?>">
							<input type="submit" value="Slet bruger" onclick="return confirm('Er du sikker på du vil slette din bruger?');">
						</form>
					
						<form action="edit_user.php" method="GET" style="float:right;border:none;">
							<input type="hidden" name="updated" value="<?php echo $row['id']; ?>">
							<input type="submit" value="Redigér">
						</form>
					</div>
				</div>
			</div>
		</div><!-- End main -->
	</body>
</html>
<?php 
mysqli_close($connection);
?>