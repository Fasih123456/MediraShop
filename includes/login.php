<!--
	 CSCI 2170: Fall 2021, Group Project
	 login.php
	 Author: Fasih Ul Islam
-->

<div class='main-banner' id='top'>

<?php
include_once "acesscontrol.php";
include_once "db.php";
include_once "functions.php";

if(isset($_POST['submit'])){//if login button is clicked this if statment is excecuted
    session_start();

    $email = sanitizeData($_POST["username"]);
    $password = sanitizeData($_POST["password"]);

    $sql = "SELECT m_id,m_email,m_password FROM m_login WHERE m_email = '$email'";

    
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "<p class='error'>Incorrect username or password.</p>";
    } else {
        $row = $result->fetch_assoc();
        
        if(password_verify($password, $row["m_password"])){//if hashed passwords are being used then change this to password_verify($password, $row["e_password"])
            $_SESSION["email"] = $email;
            $_SESSION["id"] = $row["m_id"];


            //first name,location and last name are also available in another file as session values.
            header("Location: index.php");
            die;
        }else{

            echo "<p class='error'>Incorrect username or password.</p>";
        }
     }
}
?>

<form method="post" action="">
<div class="card card1">
  <div class="card-header card-header1">
  Enter Your Login Information!
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><label>Username: <input type="text" name="username" autofocus></label></li>
    <li class="list-group-item"><label>Password: <input type="password" name="password"></label></label></li>
    <li class="list-group-item"><input type="submit" name="submit" value="Login"><input type="submit" name="register" value="Register" id="register-button"></li>
  </ul>
</div>
</form>
</div>

<?php
    if(isset($_POST["register"])){
        header("Location: index.php?register=true");
        die();
    }
?>