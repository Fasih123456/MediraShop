<?php
    include_once "db.php";
    include_once "header.php";

    echo "<h1>Account Information</h1>";



        $id = $_SESSION["id"];

        $sql = "SELECT * FROM m_account WHERE m_account_id=$id";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $_SESSION["fname"] = $row["m_account_fname"];
        $_SESSION["lname"] = $row["m_account_lname"];
        $_SESSION["location"] = $row["m_account_location"];


        $value1 = $_SESSION["fname"];
        $value2 = $_SESSION["fname"];
        $value3 = $_SESSION["location"];
?>

        <form action="includes/profile-edit.php" method="POST">
            <div><label>Name : <input type="text" value="<?php echo $value1 . " " . $value2?>"></label></div>
            <div><label>Location : <input type="text" value="<?php echo $value3?>"></label></div>
        
            <input type="submit" name="submit" value="edit">
        </form>
