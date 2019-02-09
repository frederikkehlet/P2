<?php 
// First we require the file that connects to the database
require_once 'connection.php';

// Then we put the user's input into variables
$first_name 	= 	htmlentities($_POST['first_name']);
$last_name 		= 	htmlentities($_POST['last_name']);
$email 			= 	htmlentities($_POST['email']);
$password 		= 	htmlentities($_POST['password']);
$number 		= 	htmlentities($_POST['number']);
$club 			= 	htmlentities($_POST['club']);

// Then we check if every input has been filled out (it's not empty)
if (isset($first_name) && isset($last_name) && isset($email) && isset($password) && isset($number) && isset($club)) {
	if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password) && !empty($number) && !empty($club)) {

		// First we query the database to see if the email already exists
		$query_email = "SELECT email FROM users WHERE email='$email'";
		$email_results = mysqli_query($connection, $query_email);

		// If the email already exists, echo that it already exists
		if (mysqli_num_rows($email_results) != 0) {
			echo "<p style='color:red;display:inline-block;padding-top:6%;font-size:20px;'>Email findes allerede</p>";
		} 
		// If it does not, insert all the user's input into the database
		else {
			$encrypted_password = password_hash($password, PASSWORD_DEFAULT);
			$query = "INSERT INTO temp_users VALUES('$first_name','$last_name','$email','$encrypted_password','$number','$club')";
			$results = mysqli_query($connection,$query);
			if($results) { 
				header("Location: confirm.php"); exit();
			} else {
				die("Kunne ikke registrere din bruger");
			}
		}				
	}	
}
// Close connection to the database
mysqli_close($connection);
?>