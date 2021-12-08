<?php 
/*  This code was taken from Assigment 4 solution
    Author: Raghav Sampangi
    Date Accessed: 6 Dec
*/
// Access control
	$currentDirectory = getcwd();
	$accessPreventPattern = "/.*includes$/i";
	$accessAttemptFromIncludesFolder = preg_match($accessPreventPattern, $currentDirectory);
	if (!isset($_SESSION['logged-in']) && $accessAttemptFromIncludesFolder) {
		header("Location: ../index.php");
		die();
	}
?>