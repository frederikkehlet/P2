<?php
require_once "connection.php";

$sqlDate = $output;
$query = "SELECT DISTINCT timeID,time.timeiv from time WHERE timeID NOT IN (SELECT timeID from bookings WHERE date= '$sqlDate')";

$results = mysqli_query($connection, $query);

?>
<select>
<?php while ($row = mysqli_fetch_assoc($results)) { ?>
      
   <option><?php echo $row['timeiv']."<br>"; ?></option>
 
<?php } ?>
</select>
