<?php
    require_once "header.php";
    require_once "db.php";
?>

    <main style = "width: 80vw; margin: 0 auto;">
        <section id="card-form" style = "overflow: auto;">
            <h1 style = "text-align: center; margin-bottom:50px;">Pay with card</h1> 
            <form style = "width: 60vw; margin: 0 auto; text-align:center;" action="" method="post">
                <div>
                    <label><strong>First Name</strong></label>
                    <input type="text" class="fname" id="fname" name="fname" placeholder="First Name" style = "margin:10px; background-color:#D3D3D3;">
                    <label><strong>Last Name</strong></label>
                    <input type="text" class="lname" id="lname" name="lname" placeholder="Last name" style = "margin:10px; background-color:#D3D3D3;">
                </div>
                <div>
                    <label><strong>Address</strong></label>
                    <input type="text" class="address" id="address" name="address" placeholder="Address" style = "margin:10px; background-color:#D3D3D3;">
                    <label><strong>Country</strong></label>
                    <input type="text" class="country" id="country" name="country" placeholder="Country" style = "margin:10px; background-color:#D3D3D3;">
                </div>
                <div>
                    <label><strong>City</strong></label>
                    <input type="text" class="city" id="city"  name="city" placeholder="City" style = "margin:10px; background-color:#D3D3D3;">
                    <label><strong>Province</strong></label>
                    <input type="text" class="province" id="province"  name="province" placeholder="Province" style = "margin:10px; background-color:#D3D3D3;">
                    <label><strong>Postal Code</strong></label>
                    <input type="text" class="pcode" id="pcode" name="pcode" placeholder="Postal Code" style = "margin:10px; background-color:#D3D3D3;">
                </div>
                <div style>
                    <label><strong>Card Number</strong></label>
                    <input type="text" class="cnum" id="cnum" name="cnum" placeholder="Card Number" style = "margin:10px; background-color:#D3D3D3;">
                    <label><strong>Expiry Date</strong></label>
                    <input type="text" class="edate" id="edate" name="edate" placeholder="Expiry Date" style = "margin:10px; background-color:#D3D3D3;">
                    <label><strong>CVV</strong></label>
                    <input type="text" id="cvv" name="cvv" placeholder="CVV" style = "margin:10px; background-color:#D3D3D3;">
                </div>
                <input type="submit" id = "send" name = "send" value = "Save the card" Style = "float: right; background-color:#0984e3; width:200px; height:30px;">
            </form>
        </section>
    </main>
</body>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if($_POST["send"] == "Save the card"){
            $query = "SELECT * FROM m_card";
            $result = $conn->query($query);
            $Fname = $_POST["fname"];
            $Lname = $_POST["lname"];
            if($result) {
				while($row = $result->fetch_assoc()) {
                    if($Fname == $row["m_card_fname"] && $Lname == $row["m_card_lname"]) {
                        if($Cnum == $row["m_card_number"] || $CVV == $row["m_card_cvv"]) {
                            echo "<p>Already save the card</p>";
                        }else {
                            $AccountID = $row["m_account_id"];
                            $Address = $_POST["address"];
                            $Country = $_POST["country"];
                            $City = $_POST["city"];
                            $Province = $_POST["province"];
                            $Pcode = $_POST["pcode"];
                            $Cnum = $_POST["cnum"];
                            $Edate = $_POST["edate"];
                            $CVV = $_POST["cvv"];
                            $sql = "INSERT INTO m_card (`m_account_id`, `m_card_fname`, `m_card_lname`, `m_card_address`, `m_card_country`, `m_card_city`, `m_card_province`, `m_card_postal` ,`m_card_number`, `m_card_expire`, `m_card_cvv`) VALUES ('{$AccountID}', '{$Fname}', '{$Lname}', '{$Address}', '{$Country}' ,'{$City}', '{$Province}', '{$Pcode}', '{$Cnum}', '{$Edate}', '{$CVV}')";
                            /* echo $sql; */
                            $conn->query($sql);
                            header("Location: checkout.php");
                        }
                    }
                }

            }
        }
    }
?>

<?php
    require_once "footer.php"
?>