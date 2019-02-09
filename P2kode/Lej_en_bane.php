<?php 
session_start();
require 'functions.php';
if(!isset($_SESSION['id'])) {
	header("Location: Log_Ind.php");
} 
error_reporting(0);
/** date_default_timezone_set-funktionen sætter 
* tidszonen som alle date/time funktioner gør
* brug af
* Dansk tidszone: 'Europe/Copenhagen' **/
date_default_timezone_set('Europe/Copenhagen');
/** Bruges til at linke til tidligere og næste måned.
* Når linkene bliver klikket på passeres det gennem en 
* $_GET funktion **/
if (isset($_GET['ym'])) {
	$ym = $_GET['ym'];
} else {
	// Nuværende måned
	$ym = date('Y-m');
}

$timestamp = strtotime($ym, "-01");
if ($timestamp === false) {
	$timestamp = time();
}

// Linkene til selve tidligere og næste måned
$prev_month = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next_month = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp )));

// Antal dage i måneden
$day_count = date('t', $timestamp);

// Dags dato
$today = date('Y-m-j', time());

// Titel
$html_title = date("M Y", $timestamp);

$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 0, date('Y', $timestamp)));

$weeks 	= array();
$week 	= '';

$week .= str_repeat('<td></td>', $str);

for ($day = 1; $day <= $day_count; $day++, $str++) {
	$date = $ym.'-'.sprintf("%02d",$day); 
	if ($today == $date) {
		$week .= '<td class="today"><button type="submit" value="submit" id="button"><a href="Lej_en_bane.php?ym='.$ym.'&date='.$date.'">'.sprintf("%02d", $day);
	} else {
		$week .= '<td><button type="submit" value="submit" id="button"><a href="Lej_en_bane.php?ym='.$ym.'&date='.$date.'">'.sprintf("%02d", $day);
	}
	$week .= '</a></button></td>';

	if ($str % 7 == 6 || $day == $day_count) {

		if($day == $day_count) {
			$week .= str_repeat('<td></td>', 6 - ($str % 7));
		}

		$weeks[] = '<tr>'.$week.'</tr>';
		$week = '';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lej en bane</title>
	<link rel="shortcut icon" href="Billeder/AaBlogo.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="CSS/styles.css?v=10">
	<style>
		.main {
			width: 100%;
		}
		#calendar {
			width: 75%;		
		}
		#calendar table {
			table-layout: fixed;
		}
		#calendar table td {
			padding: 15px 15px;
		}
		#calendar table td button {
			padding-left: 25px;
			width: 50px;
		}
		#calendar table td button a:hover {
			text-decoration: underline;
			color: #bf0d0d;
		}
		#dateChosen {
			position: absolute;
			left: 940px;
			bottom: 300px;
			width: 20%;
			color: #bf0d0d;
			font-size: 20px;
		}
		.submitBooking {
			background-color: #bf0d0d;
			width: 120px;
			padding: 8px 0;
			border-radius: 100px;
			border: 1px solid #bf0d0d;
			font-size: 15px;
			color:white;
			text-decoration: none;
		}
		.submitBooking:hover {
			background-color: white;
			color:#bf0d0d;
			border:1px solid #bf0d0d;
			cursor: pointer;
		}
		a {
			text-decoration: none;
			color: grey;
		}
		#output {
			color: blue;
		}
		select {
			width: 150px;
			text-align: center;
		}
	</style>
</head>
	<body>
		<div class="header">
			<div class="wrapper">
				<div class="logo">
					<a href="Lej_en_bane.php"><img src="Billeder/AaBlogo.png"></a>
				</div>
				<div class="email">
					<?php echo "Logget ind: ";?>
					<a href="Min_side.php"><?php echo getUserData($_SESSION['id'],"first_name"); ?></a>
				</div>
				<div class="button">
					<button class="disabled" onclick="window.location.href='http://localhost/P2kode/Lej_en_bane.php'" style="background-color: #BF0D0D; border:3px solid white; color: white; text-decoration: underline;">Lej en bane</button>
					<button onclick="window.location.href='http://localhost/P2kode/Min_side.php'">Min side</button>
					<button onclick="window.location.href='http://localhost/P2kode/log_out.php'">Log ud</button>
				</div>
			</div>
		</div>
		<div class="main">
			<div id="calendar">
				<h2><a href="?ym=<?php echo $prev_month; ?>">&lt;</a>
				<?php echo $html_title; ?>
				<a href="?ym=<?php echo $next_month; ?>">&gt;</a></h2>
				<table border="1">
					<tr>
						<th>Mandag</th>
						<th>Tirsdag</th>
						<th>Onsdag</th>
						<th>Torsdag</th>
						<th>Fredag</th>
						<th>Lørdag</th>
						<th>Søndag</th>
					</tr>
					<?php 
						foreach ($weeks as $week) {
							echo $week;
						}
					?>
				</table>
			</div>
			<br>
			<div id="dateChosen">
			<hr>
				<?php  
				global $output;
				$output = $_GET['date'];
				$weekinfo = strtotime("$output");
				global $weekday;
				$weekday = date('l',$weekinfo);
            	include 'test1.php';
				?>
				<hr>
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