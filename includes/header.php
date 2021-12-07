<?php
	require_once "includes/db.php";
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Merdia Search Engine</title>

	<!-- Link to the main CSS file for the page -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styles.css">

	<!-- Link to jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
</head>
<body>
	<!-- Header/banner for web page -->
	<header>
		<h1><a href="index.php">Merida Shop</a></h1>
	</header>
	<?php if (!isset($_SESSION["email"])) { //when user is not logged in?>
			<nav class="primary-nav">
				<a href="index.php?login=true">Login/Register</a>

			</nav>
		<?php } else {
			 
		?>
			<nav class="primary-nav">
				<a href="#">Place Holder</a>
				<a href="index.php?profile=true">View Profile</a>
				<a href="includes/logout.php">Logout</a>
			</nav>
			<main id="homepg-main-content" class="pg-main-content">
			</main>
		<?php } ?>