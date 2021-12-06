<?php   
    include_once "db.php";

    include_once "functions.php";
    $value1 = $_SESSION["fname"];
    $value2 = $_SESSION["fname"];
    $value3 = $_SESSION["location"];

?>

<?php
	include_once "includes/db.php";
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

			<nav class="primary-nav">
				<a href="#">Place Holder</a>
				<a href="../index.php?profile=true">View Profile</a>
				<a href="logout.php">Logout</a>
			</nav>
			<main id="homepg-main-content" class="pg-main-content">
			</main>


<p>Please Enter the values which you would like to have changed, leave fields blank if you would not like to change them.</p>
<form action="" method="POST">
    <div><label>Origional First Name : <input type="text" name="fname" value="<?php echo $value1 ?>" disabled></label></div>
    <div><label>Origional Last Name : <input type="text" name="lname" value="<?php echo $value2 ?>" disabled></div>
    <div><label>Origional Location : <input type="text" name="Location" value="<?php echo $value3 ?>" disabled></label></div>
    <div><label>New First Name : <input type="text" name="newfname" placeholder="first name"></label></div>
    <div><label>New Last Name : <input type="text" name="newlname" placeholder="last name"></label></div>
    <div><label>New Location : <input type="text" name="newLocation" placeholder="Location"></label></div>
    <input type="submit" name="submit" value="Confirm Edit">
</form>

<?php

    if(isset($_POST["submit"])){
        $fname = sanitizeData($_POST["newfname"]);
        $lname = sanitizeData($_POST["newlname"]);
        $location = sanitizeData($_POST["newLocation"]);

        $id = $_SESSION["id"];
        if(!empty($fname)){
            $sql = "UPDATE m_account SET m_account_fname='$fname' WHERE m_login_id='$id'";
            $conn->query($sql);
        }

        if(!empty($lname)){
            $sql = "UPDATE m_account SET m_account_lname='$lname' WHERE m_login_id='$id'";
            $conn->query($sql);
        }

        if(!empty($location)){
            $sql = "UPDATE m_account SET m_account_lname='$location' WHERE m_login_id='$id'";
            $conn->query($sql);
        }

    }
?>