<!--
	 CSCI 2170: Fall 2021, Group Project
	 profile.php
	 Author: Fasih Ul Islam
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


        $value1 = $_SESSION["fname"];
        $value2 = $_SESSION["lname"];
        $value3 = $_SESSION["location"];
?>
<div class='main-banner' id='top'>
<form action="" method="POST">
<div class="card1">
  <div class="card-header1">
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
    if(isset($_POST["submit"])){
        header("Location: index.php?viewprofile=true");
        die();
    }
?>

<?php 
    $value = $row["m_seller"];

    if($value){
    $htmlbody = <<<ENDBODY
    <div class="card1" id="card1-ided">
    <div class="card-header1">
    Your Products
    </div>
    ENDBODY;

    $id = $row["m_account_id"];
    $sql = "SELECT * FROM m_goods WHERE m_account_id='$id'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        $id = $row["m_goods_id"];
        $value1 = $row["m_goods_name"];
        $value2 = $row["m_goods_type"];

        $htmlbody = $htmlbody . <<<ENDBODY
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><label>Product Name : <input type="text" value="$value1" disabled></label></li>
                <li class="list-group-item"><label>Product Type : <input type="text" value="$value3" disabled></label></li>
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

</div>

