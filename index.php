<?php
	require_once "includes/header.php";

	require_once "includes/functions.php";
?>

	<main id="homepg-main-content">
		Currently At index.php!
	</main>

<?php

if(isset($_GET['login'])){
	include "includes/login.php";
}

if(isset($_GET['register'])){
	include "includes/register.php";
}

if(isset($_GET['profile'])){
	include "includes/profile.php";
}

	require_once "includes/footer.php";
?>