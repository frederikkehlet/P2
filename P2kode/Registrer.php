<!DOCTYPE html>
<html>
<head>
	<title>Registrer</title>
	<link rel="shortcut icon" href="Billeder/AaBlogo.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="CSS/styles.css?v=6">
</head>
	<body>
		<div class="header">
			<div class="wrapper">
				<div class="logo">
					<a href="Log_Ind.php"><img src="Billeder/AaBlogo.png"></a>
				</div>
				<div class="button">
					<button onclick="window.location.href='http://localhost/P2kode/Log_Ind.php'">Log ind</button>
				</div>
			</div>
		</div>
		<div class="main">
		<h1>Opret ny bruger</h1>
		<div class="form">
			<form action="Registrer.php" method="post" role="form" autocomplete="off">
				<br>
				<!-- Fornavn -->
				<label for="fornavn"><span class="asterisk">*</span>Fornavn: </label>
				<input type="text" name="first_name" placeholder="Fornavn" required="required" autofocus="on"><br>
				
				<!-- Efternavn -->
				<label for="efternavn"><span class="asterisk">*</span>Efternavn: </label>
				<input type="text" name="last_name" placeholder="Efternavn" required="required"><br>

				<!-- Email -->
				<label for="email"><span class="asterisk">*</span>Email: </label>
				<input type="email" name="email" placeholder="Email" required="required" style="text-transform: none;"><br>
				<!-- Password -->
				<label for="password"><span class="asterisk">*</span>Password: </label>
				<input type="password" name="password" placeholder="Password" required="required" style="text-transform: none;"><br>

				<!-- Tlf nummer -->
				<label for="nummer"><span class="asterisk">*</span>Tlf nummer: </label>
				<input type="text" name="number" placeholder="Tlf nummer" required="required" minlength="8" maxlength="8"><br>

				<!-- Klub/organisation -->
				<label for="klub/organisation"><span class="asterisk">*</span>Klub: </label>
				<input type="text" name="club" placeholder="Klub" required="required">
				<div class="check">
					<p>Jeg har læst og accepteret <a href="https://docs.google.com/spreadsheets/d/1xHCuqPx4H1kEMsFdgYOdNJhMwvxf31TeBkXVS5lJe1c/edit#gid=273458402" class="acceptLink" target="_blank">betingelserne</a>  (åbnes i ny fane)</p>
					<div class="input">
						<input type="checkbox" required="required">
					</div>
				</div>
				<div class="submit">
					<input type="submit" value="Opret">
				</div>
			</form>
			</div>
			<div class="Regtekst">
			<?php 
				error_reporting(0);
				require_once 'process_input.php';
				?>
				<p> Bemærk: <img src="Billeder/Udråbstegn.png" style="width:20px;height:20px;"><br><br>
				Din bruger skal godkendes af <br>
				administratoren før den aktiveres. <br>
				Du vil modtage en besked over den <br>
				indtastede email adresse når <br>
				brugeren er blevet godkendt.
				</p>
			</div>
		</div> <!-- End main div -->
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
<?php
// Close connect
mysqli_close($connection);
?>