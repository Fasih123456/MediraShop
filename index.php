
<?php
require_once "includes/header.php";

require_once "includes/functions.php";

require_once "includes/db.php"
?>


<?php

if(isset($_SESSION["id"])){
	include "includes/homepage.php";
}else{
	include "includes/login.php";
}

/*
if(isset($_GET['login']) || !isset($_SESSION["id"])){
	include "includes/login.php";
}*

if(isset($_GET['register'])){
    include "includes/register.php";
}

if(isset($_GET['profile'])){
    include "includes/profile.php";
}*/
require_once "includes/footer.php";
?>
