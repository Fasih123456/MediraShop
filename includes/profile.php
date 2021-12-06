<?php
    include_once "db.php";
    include_once "header.php";

    echo "<h1>Account Information</h1>";



        $id = $_SESSION["id"];

        $sql = "SELECT * FROM m_account WHERE m_account_id=$id";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        echo "<section class='profile'>" . PHP_EOL;
        echo "<p class='fixed-text'>" . "Name"  . "</p>" . "<p>" . $row["m_account_fname"] . " " . $row["m_account_lname"] . "</p>" . PHP_EOL;
        echo "<p class='fixed-text'>" . "Location"  . "</p>" . "<p>" . $row["m_account_location"] . "</p>" . PHP_EOL;
        echo "</section>" . PHP_EOL;

        echo "<button>Orders</button>";
        echo "<button>Buy Again</button>";
        echo "<button>Cart</button>";
    

?>