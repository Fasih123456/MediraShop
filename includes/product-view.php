<!--
	 CSCI 2170: Fall 2021, Group Project
	 product-view.php
	 Author: Adbullah Al Mukaddim
-->
<div class='main-banner' id='top'>
<?php
include_once "acesscontrol.php";
$htmlBody = <<<ENDBODY
<div class="product-section row">
    <div class="product-header col-lg-4">
        <img class="product-img" src="{$row['m_goods_imagePath']}" alt="{$row['m_goods_name']}"/>
        <h3>{$row['m_goods_name']}</h3>
        <p>Price: \${$row['m_goods_price']}</p>
        <button>Add to cart</button>
        <button><a href='{$buyLink}'>Buy</a></button>
        {$editButton}
    </div>

    <div class="product-details col-lg-8">
        <div class="product-about card" >
            <div class="card-header">
                About this product
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Seller: {$row['m_account_fname']} {$row['m_account_lname']}</li>
                <li class="list-group-item">Category: {$row['m_goods_type']}</li>
                <li class="list-group-item">Description: {$row['m_goods_description']}</li>
            <ul>
        </div>
        
        <div class="product-rating card" >
            <div class="card-header">
                Write a review
            </div>
            <form action="index.php">
                <div class="form-group">
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <input type="submit" value="Submit"/>
            </form>
            
        </div>							

        <div class="product-review card">
            <div class="card-header">
                Reviews
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">@ZhunYu: great product!</li>
                <li class="list-group-item">@Abdullah: Love it!</li>
                <li class="list-group-item">@Fasih: I would buy it again.</li>
                <li class="list-group-item">@Dorian: I would recommmend.</li>
            <ul>
        </div>	
    </div>
</div>
ENDBODY;

echo $htmlBody . PHP_EOL;
?>
</div>