<?php
include_once "acesscontrol.php";
    require_once "db.php";
	require_once "functions.php";

if (isset($_POST['createProduct'])) {

    include_once "product-processing.php";
    
    $querySQL = "INSERT INTO `m_goods` (
        `m_account_id`,
        `m_goods_type`,
        `m_goods_name`,
        `m_goods_description`,
        `m_goods_price`,
        `m_goods_imagePath`) 
        VALUES (
            {$pAccountId}, 
            '{$pCategory}', 
            '{$pName}', 
            '{$pDescription}', 
            {$pPrice}, 
            '{$pImagePath}'
        )";
    echo $querySQL;
    $conn->query($querySQL);

    header("Location: ../index.php");

}
if (isset($_POST['editProduct'])) {
    include_once "product-processing.php";
    
    $querySQL = "UPDATE `m_goods`
        SET
        `m_account_id` = {$pAccountId},
        `m_goods_type` = '{$pCategory}',
        `m_goods_name` = '{$pName}',
        `m_goods_description` = '{$pDescription}',
        `m_goods_price` = {$pPrice},
        `m_goods_imagePath` = '{$pImagePath}'
        WHERE `m_goods_id` = {$_POST['p-id']}";
    echo $querySQL;
    $conn->query($querySQL);

    header("Location: ../index.php");
}

if (isset($_POST['deleteProduct'])){
    $querySQL = "DELETE FROM `m_goods`
        WHERE `m_goods_id` = {$_POST['p-id']}";
    echo $querySQL;
    $conn->query($querySQL);

    header("Location: ../index.php");
}

?>