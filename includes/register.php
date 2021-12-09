<!--
	 CSCI 2170: Fall 2021, Group Project
	 register.php
	 Author: Fasih Ul Islam
-->
<div class='main-banner' id='top'>
<?php
include_once "acesscontrol.php";
include_once "header.php";
    include_once "db.php";

    if(isset(($_POST['register']))){
        verifyPassword();
    }
    
    function verifyPassword(){
        $password = sanitizeData($_POST["password"]);

        $validRegexPattern = "((?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*\W))";

        //No password reentry has been added yet.

        $value = preg_match($validRegexPattern,$password);

        if($value == 0){//meaning regex pattren is not valid
			echo "<p class='error'>Password is not strong enough</p>";
            echo "<p class='error'>Enter a password with at least 1 captial letter, 1 small letter, 1 special character and 1 letter, Ex:Post@123 </p> ";
		}else{
            hashPassword($password);
        }

       
    }

    function hashPassword($password){
        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
        userType($hashedPassword);
    }

    function userType($hashedPassword){
        $usertype = $_POST["usertype"];

		if($usertype != "buyer" && $usertype != "seller"){//if drop box/check box is used then this code can be deleted
			echo "<p class='error'>Invalid user type, user must either be a seller or user</p>";
		}else{
            $uservalue = 0;
            if($usertype == "seller"){
                $uservalue = 1;
            }
			submitinfo($uservalue,$hashedPassword);
		}
    }

     function submitinfo($uservalue,$hashedPassword){
        $fname = sanitizeData($_POST["fname"]);
        $lname = sanitizeData($_POST["lname"]);
        $email = sanitizeData($_POST["username"]);
        $accountLocation = sanitizeData($_POST["location"]);



        $value = $_SESSION["value"];
        echo $_SESSION["value"];
        echo $value;
        $sql = "INSERT INTO m_account  (m_account_fname, m_account_lname, m_login_id, m_account_location, m_seller) VALUES ('$fname','$lname','$value','$accountLocation','$uservalue')";
		$sql2 = "INSERT INTO m_login (m_id, m_email, m_password) VALUES ('$value','$email','$hashedPassword')";

        

        //db.php was not working here for some reason
        $host = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "merida";
        
        echo $sql;
        echo $sql2;

        $conn = new mysqli($host, $username, $password, $dbname);
        $conn->query($sql2);
        $conn->query($sql);
        $_SESSION["value"] = $_SESSION["value"] + 1;

        header("Location: index.php?login=true");
        die();
     }

?>

<form method="post" action="">
<div class="card card1">
  <div class="card-header card-header1">
  Enter Your Registration Information!
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><label>FirstName: <input type="text" name="fname" autofocus required></label></li>
    <li class="list-group-item"><label>LastName: <input type="text" name="lname" required></label></li>
    <li class="list-group-item"><label>Email Address: <input type="email" name="username" autofocus required></label></li>
    <li class="list-group-item"><label>Password: <input type="password" name="password" required></label></li>
    <li class="list-group-item"><label>Location: <input type="text" name="location" autofocus required></label></li>
    <li class="list-group-item"><label>User type: 
        <select name="usertype">
            <option value="seller">Seller</option>
            <option value="buyer">Buyer</option>
        </select>
    </label></li>
    <li class="list-group-item"><input type="submit" name="register" value="Register"></li>
  </ul>
</div>
</form>
</div>