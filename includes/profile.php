<?php
    include_once "db.php";
    include_once "header.php";

        $id = $_SESSION["id"];

        $sql = "SELECT * FROM m_account WHERE m_login_id=$id";

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
<div class="card1">
  <div class="card-header">
  Account Information
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><label>Name : <input type="text" value="<?php echo $value1 . " " . $value2?>" disabled></label></li>
    <li class="list-group-item"><label>Location : <input type="text" value="<?php echo $value3?>" disabled></label></li>
    <li class="list-group-item"><input type="submit" name="submit" value="Edit Account Information"></li>
  </ul>
</div>
</form>

<?php 
    $value = $row["m_seller"];

    if($value){
    $htmlbody = <<<ENDBODY
    <div class="card1">
    <div class="card-header">
    Your Sucessful Products
    </div>
    ENDBODY;

    $id = $row["m_account_id"];
    $sql = "SELECT * FROM m_goods WHERE m_account_id='$id'";
    $result = $conn->query($sql);
    $id = $row["id"];
    while($row = $result->fetch_assoc()){
        $htmlbody = $htmlbody . <<<ENDBODY
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><label>Name : <input type="text" value="$value1 $value2" disabled></label></li>
                <li class="list-group-item"><label>Location : <input type="text" value="$value3" disabled></label></li>
                <li class="list-group-item"><a href=product.php?id='$id'>Go To your product</a></li>
            </ul>
        ENDBODY;
    }

    $htmlbody = $htmlbody . <<<ENDBODY
    </div>
    ENDBODY;

    echo $htmlbody . PHP_EOL;
    }
?>

