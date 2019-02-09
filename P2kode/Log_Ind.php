<!DOCTYPE html>
<html>
<head>
	<title>Log ind</title>
	<link rel="shortcut icon" href="Billeder/AaBlogo.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="CSS/styles.css?v=8">
</head>
	<body>	
		<div class="header">
			<div class="wrapper">
				<div class="logo">
					<a href="Log_Ind.php"><img src="Billeder/AaBlogo.png"></a>
				</div>
				<div class="button">
					<button onclick="window.location.href='http://localhost/P2kode/Registrer.php'">Opret ny bruger</button> 
				</div>
			</div>
		</div>
		<div class="main">
			<h1>Velkommen til AaB banebooking</h1>
			<h2>Log ind for at begynde</h2>
			<div class="form">
				<form role="form" action="Logind_validation.php" method="post">
						<br>
						<label for="email">Email: </label>
						<input type="email" required="required" autofocus="on" name="email" style="text-transform: none;"><br>
						<label for="password">Password: </label>
						<input type="password" required="required" name="password" style="text-transform: none;">
						<input type="submit" class="submit" value="Log ind">
				</form>
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