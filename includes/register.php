<?php
    include_once "db.php";

    if(isset(($_POST['register']))){
        verifyPassword();
    }
    
    function verifyPassword(){
        $password = sanitizeData($_POST["password"]);

        //No regex pattern has been added yet.

        //No password reentry has been added yet.

        hashPassword($password);
    }

    function hashPassword($password){
        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
        userType($hashedPassword);
    }

    function userType($hashedPassword){
        $usertype = $_POST["usertype"];

		if($usertype != "admin" && $usertype != "user" && $usertype != "seller"){//if drop box/check box is used then this code can be deleted
			echo "<p>Invalid user type</p>";
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
        
        $sql = "INSERT INTO m_account  (m_account_fname, m_account_lname, m_login_id, m_account_location, m_seller) VALUES ('$fname','$lname','$value','$accountLocation','$uservalue')";
		$sql2 = "INSERT INTO m_login (m_id, m_email, m_password) VALUES ('$value','$email','$hashedPassword')";

        $_SESSION["value"] = $_SESSION["value"] + 1;

        //db.php was not working here for some reason
        $host = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "merida";
        
        $conn = new mysqli($host, $username, $password, $dbname);
        $conn->query($sql);
        $conn->query($sql2);

        header("Location: index.php");
        //header("Location: index.php?login=true");
        die();
     }

?>

<nav id="temp-login-nav">
   <form method="post" action="">
		<div>
			<label>FirstName: <input type="text" name="fname" autofocus required></label>
		</div>
		<div>
			<label>LastName: <input type="text" name="lname" required></label>
		</div>
        <div>
			<label>Email Address: <input type="email" name="username" autofocus required></label>
		</div>
		<div>
			<label>Password: <input type="password" name="password" required></label>
		</div>
        <div>
			<label>Location: <input type="text" name="location" autofocus required></label>
		</div>
		<div>
			<label>User type: <input type="dropdown" name="usertype" required></label>
		</div>
		<input type="submit" name="register" value="register">
   </form>
</nav>