<?php 
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
$html_title = date("M. Y", $timestamp);

$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 0, date('Y', $timestamp)));

$weeks 	= array();
$week 	= '';

$week .= str_repeat('<td></td>', $str);

for ($day = 1; $day <= $day_count; $day++, $str++) {
	$date = $ym.'-'.$day; 
	if ($today == $date) {
		$week .= '<td class="today"><button type="submit" value="submit" id="button"><a href="calendartest.php?ym='.$ym.'&date='.$date.'">'.$day;
	} else {
		$week .= '<td><button type="submit" value="submit" id="button"><a href="calendartest.php?ym='.$ym.'&date='.$date.'">'.$day;
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
<html lang="da">
	<head>
		<link rel="shortcut icon" href="img/favicon.png">
		<link rel="stylesheet" href="CSS/calendarstyles.css">
		<title></title>
		<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	</head>
	<body>
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
		<div id="dateChosen">
				<?php  
				global $output;
				$output = $_GET['date'];
				$weekinfo = strtotime("$output");
				global $weekday;
				$weekday = date('l',$weekinfo);
            include 'test.php';
				?>
		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="script.js"></script>
	</body>
</html>
