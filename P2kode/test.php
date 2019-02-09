<?php
require "connection.php";

$sqlDate = $output;
$query = "SELECT DISTINCT timeID,time.timeiv FROM time WHERE timeID NOT IN (SELECT timeID FROM bookings WHERE date= '$sqlDate')";

$query2 = "SELECT DISTINCT timeID,timeweekends.timeiv FROM timeweekends WHERE timeID NOT IN (SELECT timeID FROM bookings WHERE date= '$sqlDate')";

$results = mysqli_query($connection, $query); 
$results2 = mysqli_query($connection, $query2);

// Bruges til at udskrive det "rigtige" tidsformat: dato/måned/år 
if(isset($output)) {
	$newFormat = date("d/m Y", strtotime($output));
}	
?>
<form action="bookingprocess.php" method="GET" id="form">
Du har valgt: <?php echo "<span style='font-weight:bold;font-size:25px;'>".$newFormat."</span>" ?><input type="hidden" name="date" value="<?php echo $output ?>"><br><br>
Vælg tid:
<?php if ($weekday == "Saturday" || $weekday == "Sunday") { ?>
	<select name="weekend" required>
	<option disabled selected value>Vælg en tid</option>   
	<?php while ($row = mysqli_fetch_assoc($results2)) { ?>   
	   <option value="<?php echo $row['timeID']; ?>"><?php echo $row['timeiv']; ?></option><br>
	<?php } ?>
	</select>
	<?php } else { ?>
		<select name="hverdag" required>
		<option disabled selected value>Vælg en tid</option> 
	<?php while ($row = mysqli_fetch_assoc($results)) { ?>     
	   <option value="<?php echo $row['timeID']; ?>"><?php echo $row['timeiv']; ?></option><br>
	<?php } ?>
	</select>
	<?php } ?>
	<input type="text" name="club" required placeholder="Indtast holdnavn" style="margin-top:10%;">
</form><br>
<button class="submitBooking" type="submit" form="form" value="Submit" onclick="return confirm('Er du sikker på du vil booke den valgte tid?')";>Book tid</button>
<?php 
mysqli_close($connection);
?>
