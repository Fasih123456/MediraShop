<!--
	 CSCI 2170: Fall 2021, Group Project
	 functions.php
	 Author: Fasih Ul Islam
-->
<?php
include_once "acesscontrol.php";
    //sanitizing the data
	function sanitizeData($data)
	{
		$cleanData = trim($data);
		$cleanData = stripslashes($cleanData);
		$cleanData = htmlspecialchars($cleanData);
	
		return $cleanData;
	}

?>