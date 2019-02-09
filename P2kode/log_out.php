<?php  
session_start();
session_destroy();
$_SESSION = array();
header("Location: Log_Ind.php");
?>