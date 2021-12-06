<?php
    require_once "header.php";
    require_once "db.php";
?>
<?php

?>
    <main style = "width: 80vw; margin: 0 auto;">
        <section id="card-form" style = "overflow: auto;">
            <h1 style = "text-align: center; margin-bottom:50px;">Review order</h1>
            <form action="" method="post">
                <input type = "submit" value = "Submit Order" style = "background-color:gold;">
            </form>
            <?php
            /* if(isset($_GET["id"])) { */
                $idNum = $_GET["id"];
                $sql = "SELECT * FROM m_goods, m_card";
                $result = $conn->query($sql);
                if($result) {
                    $row = $result->fetch_assoc();
                    echo "<section>";
                    echo "<p><strong>" . $row['m_goods_name'] . "</strong></p>";
                    echo "<p>" . $row['m_goods_description'] . "</p>";
                    echo "</section>";
                    echo "<section>";
                    echo "<p style = 'float:left;'>" . $row['m_card_address'] . "</p>";
                    echo "<p style = 'float:right;'>" . $row['m_goods_price'] . "</p>";
                    echo "</section>";
                }
            /* } */
            ?>
        </section>
    </main>

<?php
    require_once "footer.php"
?>

