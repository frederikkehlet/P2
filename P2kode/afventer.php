<?php 
session_start();
require_once 'functions.php';
if (!isset($_SESSION['id'])) {
	header("Location: Log_Ind.php");
} 
if ($_SESSION['id'] != 1) {
	header("Location: Lej_en_bane.php");
	exit();
} 
?>
<!DOCTYPE html>
<html lang="da">
<head>
	<title>Kontakter</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="Billeder/AaBlogo.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="CSS/styles.css?v=10">
</head>
	<body>
		<div class="header">
			<div class="wrapper">
				<div class="logo">
					<a href="Bane_oversigt.php"><img src="Billeder/AaBlogo.png"></a>
				</div>
				<div class="email">
					<?php echo "Logget ind: "; ?>
					<a href="Bane_oversigt.php"><?php echo getUserData($_SESSION['id'],"first_name");?> (admin)</a>
				</div>
				<div class="button">
					<button  onclick="window.location.href='http://localhost/P2kode/Bane_oversigt.php'">Bane oversigt</button> 
					<button class="disabled" onclick="window.location.href='http://localhost/P2kode/Kontakter.php'" style="background-color: #BF0D0D; border: 3px solid white;color:white; text-decoration: underline;">Brugere</button>
					<button onclick="window.location.href='http://localhost/P2kode/Min_side_admin.php'">Min side</button>
					<button onclick="window.location.href='http://localhost/P2kode/log_out.php'">Log ud</button> 
				</div>
			</div>
		</div>
		<?php  
			include 'connection.php';
			$query = "SELECT * FROM temp_users";
			$results = mysqli_query($connection, $query);
			if(!$results) {
				die("Kunne ikke forbinde til databasen".mysqli_error());
			}
			?>
			<div class="main">
			<div class="bekræft_link">
				<button onclick="window.location.href='http://localhost/P2kode/Kontakter.php'">Tilbage</button> 
			</div>
			<h1>Bekræft nye brugere</h1>
			<table>
				<thead>
					<th>Navn</th>
					<th>Email</th>
					<th>Tlf nummer</th>
					<th>Klub</th>
					<th></th>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_assoc($results)) { ?>
					<tr>
						<td><?php echo $row["first_name"] . " ". $row["last_name"]; ?></td>
						<td><?php echo $row["email"]; ?></td>
						<td><?php echo $row["number"]; ?></td>
						<td><?php echo $row["club"]; ?></td>
						<td>
							<form action="temp_user.php" method="GET">
								<input type="submit" value="Bekræft bruger">
								<input type="hidden" name="confirmed" value="<?php echo $row["email"]; ?>">
							</form>
						</td>
					</tr>				
				<?php } ?>
				</tbody>
			</table>
			</div>
		<footer class="footer">
			<div class="info">
				<div class="float-left">
					<ul>
						<li><b>Kontakt</b></li>
						<li>Email: kamp@aabaf1885.dk</li>
						<li><a href="https://docs.google.com/spreadsheets/d/1xHCuqPx4H1kEMsFdgYOdNJhMwvxf31TeBkXVS5lJe1c/edit#gid=273458402" target="_blank">Regler og betingelser</a></li>
					</ul>
				</div>
				<div class="float-right">
					<ul>
						<li><b>AaB A/S</b></li>
						<li>Hornevej 2</li>
						<li>9220 Aalborg Øst</li>
					</ul>
				</div>				
			</div>
		</footer>
	</body>
</html>