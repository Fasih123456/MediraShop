<!--
	 CSCI 2170: Fall 2021, Group Project
	 index.php
	 Author: Adbullah Al Mukaddim
-->
<?php
require_once "includes/header.php";

require_once "includes/functions.php";

require_once "includes/db.php"
?>


<?php

if(isset($_SESSION["id"])){

	if(isset($_GET['profile'])){
		include "includes/profile.php";
	}else if(isset($_GET['viewprofile'])){
		include "includes/profile-edit.php";
	}
	else{
		include "includes/homepage.php";
	}
}else{
	if(isset($_GET['register'])){
		include "includes/register.php";
	}else{
	include "includes/login.php";
	}
}




require_once "includes/footer.php";
?>
