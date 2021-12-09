<!--
	 CSCI 2170: Fall 2021, Group Project
	 product-edit.php
	 Author: Adbullah Al Mukaddim
-->
<?php
include_once "acesscontrol.php";
    include_once "db.php";
    include_once "header.php";

        $id = $_SESSION["id"];

        $sql = "SELECT * FROM m_account WHERE m_login_id=$id";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $_SESSION["fname"] = $row["m_account_fname"];
        $_SESSION["lname"] = $row["m_account_lname"];
        $_SESSION["location"] = $row["m_account_location"];


        $firstName = $_SESSION["fname"];
        $lastname = $_SESSION["lname"];
        $location = $_SESSION["location"];
?>
<div class='main-banner' id='top'>
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
            $sql = "UPDATE m_account SET m_account_location='$location' WHERE m_login_id='$id'";
            $conn->query($sql);
            $updated = true;
        }
        header("Location: index.php?profile=true");
    }
?>


<p>Please Enter the values which you would like to have changed, leave fields blank if you would not like to change them.</p>
<form action="" method="POST">
<div class="card1" id="profile-edit">
  <div class="card-header1">
    Featured
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><label>Origional First Name : <input type="text" name="fname" value="<?php echo $firstName ?>" disabled></label></li>
    <li class="list-group-item"><label>Origional Last Name : <input type="text" name="lname" value="<?php echo $lastname ?>" disabled></label></li>
    <li class="list-group-item"><label>Origional Location : <input type="text" name="Location" value="<?php echo $location ?>" disabled></label></li>
    <li class="list-group-item"><label>New First Name : <input type="text" name="newfname" placeholder="first name"></label></li>
    <li class="list-group-item"><label>New Last Name : <input type="text" name="newlname" placeholder="last name"></li>
    <li class="list-group-item">New Location : <input type="text" name="newLocation" placeholder="Location"></label></li>
    <li class="list-group-item"> <input type="submit" name="submit" value="Confirm Edit"></li>
  </ul>
</div>
</form>


</div>
