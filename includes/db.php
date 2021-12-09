<!--
	 CSCI 2170: Fall 2021, Group Project
	 db.php
	 Author: Nathaniel Wilson
-->
<?php
include_once "acesscontrol.php";
/*
 *	db.php
 *	Connects to the Database on localhost.
 */
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "merida";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error:" . $conn->connect_error);
}

?>