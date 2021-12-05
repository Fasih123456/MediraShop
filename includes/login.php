<?php
include_once "db.php";

if(isset($_POST['submit'])){//if login button is clicked this if statment is excecuted
    session_start();

    $email = sanitizeData($_POST["username"]);
    $password = sanitizeData($_POST["password"]);

    $sql = "SELECT m_id,m_email,m_password FROM m_login WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "<p>Incorrect username or password.</p>";
    } else {
        $row = $result->fetch_assoc();
        
        if(password_verify($password,$row["m_password"])){
            $_SESSION["email"] = $email;
            $_SESSION["id"] = $id;
            $_SESSION['value'] = 0;

            header("Location: index.php");
            die;
        }else{
            echo "<p>Incorrect username or password.</p>";
        }
     }
}
?>

<nav id="temp-login-nav">
   <form method="post" action="">
		<div>
			<label>Username: <input type="text" name="username" autofocus></label>
		</div>
		<div>
			<label>Password: <input type="password" name="password"></label>
		</div>
		<input type="submit" name="submit" value="Login">

         <a href="index.php?register=true">Register</a>

   </form>
</nav>