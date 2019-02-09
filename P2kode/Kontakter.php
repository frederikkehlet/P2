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
	<link rel="stylesheet" type="text/css" href="CSS/styles.css?v=11">
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
		<div class="main">	
			<div class="bekræft_link">
				<button onclick="window.location.href='http://localhost/P2kode/afventer.php'">Bekræft nye brugere</button> 
			</div>
			<h1>Brugere</h1>	
        		<div class="kontakt_table">
        		<?php 
        		include 'connection.php';
				$query = "SELECT * FROM users ORDER BY last_name ASC";
    			$result = mysqli_query($connection,$query);
        		?>
        		<table>
        			<thead>
        				<th>Navn</th>
        				<th>Email</th>
        				<th>Tlf nummer</th>
        				<th>Klub</th>
        			</thead>
        			<tbody>
        		 		<?php
        				 while($row = mysqli_fetch_assoc($result)) {
            			echo "<tr><td>" . $row['first_name'] . " " . $row['last_name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['number'] . "</td><td>" . $row['club'] . "</td></tr>";
        				}  
        				?> 
        			</tbody>
				</table>
        	</div>       		
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