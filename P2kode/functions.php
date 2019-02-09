<?php
// This function will echo one specified piece of user info from the db
function getUserData($id,$info) {
    // Include the file that connects to the database
    include 'connection.php';

    // Then we put the email of the logged-in user into a variable $email
    $_SESSION['id'] = $id;

    // Then we query the db and select every information about the logged-in user
    $sql = "SELECT * FROM users WHERE id= '$id'";
    $result = $connection->query($sql);
    
        // If there are results in the db, output the specified $info
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo $row["$info"];
        }  
    }
}
?>