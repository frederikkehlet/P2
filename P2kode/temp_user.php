<?php  
require_once 'connection.php';
if (isset($_GET['confirmed'])) {
	$email = $_GET['confirmed'];
	$query = "SELECT * FROM temp_users WHERE email= '$email'";

	$results = mysqli_query($connection,$query);
	if (!$results) {
		die("Kunne ikke forbinde til databasen".mysqli_error());
	}
	$row = mysqli_fetch_row($results);
	$first_name 	= 	$row[0];
	$last_name 	= 	$row[1];
	$email		= 	$row[2];
	$password		=	$row[3];
	$number		=	$row[4];
	$club		=	$row[5];

	$query2 	= "INSERT INTO users VALUES('$first_name','$last_name','$email','$password','$number','$club','')";
	$results2	= mysqli_query($connection,$query2);

	if (!$results2) {
		die("Kunne ikke forbinde til databasen".mysqli_error());
	}

	$query3 	= "DELETE FROM temp_users WHERE email='$email'";
	$results3 	= mysqli_query($connection,$query3);

	if (!$results3) {
		die("Kunne ikke slette bruger fra database".mysqli_error());
	}

	header("Location: afventer.php");
}
?>