<?php
	require_once "includes/header.php";
    require_once "includes/db.php";
	require_once "includes/functions.php";
?>

	<main id="homepg-main-content">

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

