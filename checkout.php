<?php
    require_once "includes/header.php";
    require_once "includes/db.php";
?>
<?php

?>
    <main class="row checkout-section">
        <div class="card" style="margin:auto; width: 500px">
            <div class="card-header">
                <h3>Review order</h3>
            </div>
           
            <?php
                $sqlGoods = "SELECT * FROM `m_goods` WHERE `m_goods_id` = {$_GET['id']}";
                $resultGoods = $conn->query($sqlGoods);
                $sqlCard = "SELECT * FROM `m_card` 
                            LEFT JOIN `m_account`
                            ON `m_card`.`m_account_id` = `m_account`.`m_account_id`
                            LEFT JOIN `m_login`
                            ON `m_login`.`m_id` = `m_account`.`m_login_id`
                            WHERE `m_login`.`m_id` = {$_SESSION['id']}";
                $resultCard = $conn->query($sqlCard);

                if($resultGoods and $resultCard) {
                    $rowGoods = $resultGoods->fetch_assoc();
                    $rowCard = $resultCard->fetch_assoc();
                    $last4DigitCardNumber = "****-****-****-" . substr($rowCard['m_card_number'], -4);

                    $htmlBody = <<<ENDBODY
                    <img class="card-img-top product-img" src="{$rowGoods['m_goods_imagePath']}"/>
                    <div class="card col-sm-11" style="margin:auto;">
                        <div class="card-body">
                            <h5>About Product:</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><p><strong>Product Name:</strong> {$rowGoods['m_goods_name']}</p></li>
                            <li class="list-group-item"><p><strong>Price:</strong> {$rowGoods['m_goods_price']}</p></li>
                            <li class="list-group-item"><p><strong>Description:</strong> {$rowGoods['m_goods_description']}</p></li>
                        </ul>
                    </div>
                    <br>
                    <div class="card col-sm-11" style="margin:auto;">
                        <div class="card-body">
                            <h5>Card Information:</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><p><strong>Card Holder Name:</strong> {$rowCard['m_card_fname']} {$rowCard['m_card_lname']}</p></li>
                            <li class="list-group-item"><p><strong>Card Number:</strong> {$last4DigitCardNumber}</p></li>
                            <li class="list-group-item"><p><strong>Address:</strong>  {$rowCard['m_card_address']}</strong></p></li>
                        </ul>
                    </div>
                    <div style="margin:20px">
                        <button style ="background-color:gold;"><a href="index.php">Submit Order</a></button>
                    </div>
                    ENDBODY;

                    echo $htmlBody . PHP_EOL;
                }
            ?>
        </div>
    </main>

<?php
    require_once "includes/footer.php"
?>

