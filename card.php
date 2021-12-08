<?php
    require_once "includes/header.php";
    require_once "includes/db.php";
?>

    <main class="row checkout-section top-space">
        <div class="card" style="margin:auto; width: 500px">
            <div class="card-header">
                <h3>Enter Card Information</h3>
            </div>

            <?php
                $sql = "SELECT * FROM `m_account`
                            LEFT JOIN `m_login`
                            ON `m_login`.`m_id` = `m_account`.`m_login_id`
                            WHERE `m_login`.`m_id` = {$_SESSION['id']}";
                $result = $conn->query($sql);
                

                if($result) {
                    $row = $result->fetch_assoc();

                    $htmlBody = <<<ENDBODY
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label><strong>First Name</strong></label>
                                    <input type="text" class="form-control" name="fname" style="background-color:#D3D3D3;" required>
                                    <label><strong>Last Name</strong></label> 
                                    <input type="text" class="form-control" name="lname" style="background-color:#D3D3D3;" required>
                                </div>
                                <div  class="form-group">
                                    <label><strong>Street</strong></label>
                                    <input type="text" class="form-control" name="address" style="background-color:#D3D3D3;" required>
                                    <label><strong>Country</strong></label>
                                    <input type="text" class="form-control" name="country" style="background-color:#D3D3D3;" required>
                                    <label><strong>City</strong></label>
                                    <input type="text" class="form-control" name="city" style="background-color:#D3D3D3;" required>
                                    <label><strong>Province</strong></label>
                                    <input type="text" class="form-control" name="province" style="background-color:#D3D3D3;" required>
                                    <label><strong>Postal Code</strong></label>
                                    <input type="text" class="form-control" name="pcode" style="background-color:#D3D3D3;" required>
                                </div>
                                <div class="form-group">
                                    <label><strong>Card Number</strong></label>
                                    <input type="text" class="form-control" name="cnum" style="background-color:#D3D3D3;" required>
                                    <label><strong>Expiry Date</strong></label>
                                    <input type="date" class="form-control" name="edate" style="background-color:#D3D3D3;" required>
                                    <label><strong>CVV</strong></label>
                                    <input type="text" class="form-control" name="cvv" style="background-color:#D3D3D3;" required>
                                </div>
                                <div style="margin:20px">
                                    <input type="hidden" name="accountId" value="{$row['m_account_id']}">
                                    <input type="submit" name="send" value="Save the card" Style = "float: right; background-color:#0984e3; width:200px; height:30px;">
                                    <button style ="background-color:gold;"><a href="index.php">Submit Order</a></button>
                                </div>
                            </form>
                        </div>
                        
                    ENDBODY;

                    echo $htmlBody . PHP_EOL;
                }
            ?>
        </div>
    </main>
</body>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if($_POST["send"] == "Save the card"){
            $Fname = $_POST["fname"];
            $Lname = $_POST["lname"];
            $AccountID = $_POST["accountId"];
            $Address = $_POST["address"];
            $Country = $_POST["country"];
            $City = $_POST["city"];
            $Province = $_POST["province"];
            $Pcode = $_POST["pcode"];
            $Cnum = $_POST["cnum"];
            $Edate = $_POST["edate"];
            $CVV = $_POST["cvv"];
            $sql = "INSERT INTO m_card (`m_account_id`, `m_card_fname`, `m_card_lname`, `m_card_address`, `m_card_country`, `m_card_city`, `m_card_province`, `m_card_postal` ,`m_card_number`, `m_card_expire`, `m_card_cvv`) VALUES ('{$AccountID}', '{$Fname}', '{$Lname}', '{$Address}', '{$Country}' ,'{$City}', '{$Province}', '{$Pcode}', '{$Cnum}', '{$Edate}', '{$CVV}')";            
            $conn->query($sql);
        
            header("Location: checkout.php?id=" . $_GET['pId']);
        }
    }
?>

<?php
    require_once "includes/footer.php"
?>