<?php 
session_start();
require_once 'connection.php';
require 'functions.php';
if(isset($_GET['updated'])) {
	$id = $_GET['updated'];
	$query = "SELECT * FROM users WHERE id = '$id'";

	$results = mysqli_query($connection, $query);
	if(!$results) {
		die("Could not query the database".mysqli_error());
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS/styles.css?v=10">
	</head>
	<body>
	<div class="header"><!-- header -->
			<div class="wrapper">
				<div class="logo">
					<a href="Lej_en_bane.php"><img src="Billeder/AaBlogo.png"></a>
				</div>
				<div class="email">
					<?php echo "Logget ind: ";?>
					<a href="Min_side.php"><?php echo getUserData($_SESSION['id'],"first_name");?> (admin)</a>
				</div>				
				<div class="button">
					<button  onclick="window.location.href='http://localhost/P2kode/Bane_oversigt.php'">Baneoversigt</button>
					<button  onclick="window.location.href='http://localhost/P2kode/Kontakter.php'" >Brugere</button>
					<button class="disabled" onclick="window.location.href='http://localhost/P2kode/Min_side_admin.php'" style="background-color: #BF0D0D; border: 3px solid white; color: white; text-decoration: underline;">Min side</button>
					<button onclick="window.location.href='http://localhost/P2kode/log_out.php'">Log ud</button> 
				</div>
			</div>
		</div><!-- End header -->
		<div>
			<a href="Min_side_admin.php" style="float:left;margin-left: 5%;color:#bf0d0d;"> Gå tilbage til kontaktoplysninger</a>
		</div>
		<form action="update.php" method="GET" style="border:none;margin-top: 100px;margin-left:50%;">
			<tabel>
				<?php $row = mysqli_fetch_row($results); ?>
				<tr>
					<th>Fornavn</th>
					<td>
						<input type="text" name="first_name" value="<?php echo $row[0]; ?>"><br>
					</td>
				</tr>
				<tr>
					<th>Efternavn</th>
					<td>
						<input type="text" name="last_name" value="<?php echo $row[1]; ?>"><br>
					</td>
				</tr>
				<tr>
					<th>Email</th>
					<td>
						<input type="email" name="email" value="<?php echo $row[2]; ?>"><br>
					</td>
				</tr>
				<tr>
					<th>Tlf nummer</th>
					<td>
						<input type="text" name="number" minlength="8" maxlength="8" value="<?php echo $row[4]; ?>"><br>
					</td>
				</tr>
				<tr>
					<th>Klub</th>
					<td>
						<input type="text" name="club" value="<?php echo $row[5]; ?>">
					</td>
				</tr>
				<tr><br>
					<td>
						<input type="hidden" name="act_update" value="act_update">
						<input type="submit" value="Opdatér" onclick="alert('Dine oplysninger er nu opdateret');">
					</td>
				</tr>
			</tabel>
		</form>
	</body>
</html>
<?php 
mysqli_close($connection);
?>