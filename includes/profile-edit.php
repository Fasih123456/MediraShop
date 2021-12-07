<?php   
	session_start();
    include_once "db.php";

    include_once "functions.php";
    $value1 = $_SESSION["fname"];
    $value2 = $_SESSION["fname"];
    $value3 = $_SESSION["location"];




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Merdia Search Engine</title>

	<!-- Link to the main CSS file for the page -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/styles.css">

	<!-- Link to jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
</head>
<body>
	<!-- Header/banner for web page -->
	<header>
		<h1><a href="../index.php">Merida Shop</a></h1>
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
<div class="card" id="profile-edit">
  <div class="card-header">
    Featured
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><label>Origional First Name : <input type="text" name="fname" value="<?php echo $value1 ?>" disabled></label></li>
    <li class="list-group-item"><label>Origional Last Name : <input type="text" name="lname" value="<?php echo $value2 ?>" disabled></label></li>
    <li class="list-group-item"><label>Origional Location : <input type="text" name="Location" value="<?php echo $value3 ?>" disabled></label></li>
    <li class="list-group-item"><label>New First Name : <input type="text" name="newfname" placeholder="first name"></label></li>
    <li class="list-group-item"><label>New Last Name : <input type="text" name="newlname" placeholder="last name"></li>
    <li class="list-group-item">New Location : <input type="text" name="newLocation" placeholder="Location"></label></li>
    <li class="list-group-item"> <input type="submit" name="submit" value="Confirm Edit"></li>
  </ul>
</div>
</form>

<?php

    if(isset($_POST["submit"])){
        $fname = sanitizeData($_POST["newfname"]);
        $lname = sanitizeData($_POST["newlname"]);
        $location = sanitizeData($_POST["newLocation"]);
        $updated = false;

        $id = $_SESSION["id"];
        if(!empty($fname)){
            $sql = "UPDATE m_account SET m_account_fname='$fname' WHERE m_login_id='$id'";
            $conn->query($sql);
            $updated = true;
        }

        if(!empty($lname)){
            $sql = "UPDATE m_account SET m_account_lname='$lname' WHERE m_login_id='$id'";
            $conn->query($sql);
            $updated = true;
        }

        if(!empty($location)){
            $sql = "UPDATE m_account SET m_account_lname='$location' WHERE m_login_id='$id'";
            $conn->query($sql);
            $updated = true;
        }

        if($updated){
            header("Location: ../index.php");
            die();
        }
        
    }

    include_once "footer.php";
?>