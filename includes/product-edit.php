<!--
	 CSCI 2170: Fall 2021, Group Project
	 product-edit.php
	 Author: Adbullah Al Mukaddim
-->
<?php
include_once "acesscontrol.php";
$htmlBody = <<<ENDBODY
<div class="product-section row">
    <div class="product-header col-lg-4">
        <img class="product-img" src="{$row['m_goods_imagePath']}"/>
        <h3>{$row['m_goods_name']}</h3>
        <p>Price: \${$row['m_goods_price']}</p>
    </div>

    <div class="card col-lg-8">
        <div class="card-body">
            <h3>Edit Product</h3>
            <div class="product-edit">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Product Name:</label>
                        <input class="col-sm-8" type="text" class="form-control" name="p-name" value="{$row['m_goods_name']}">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Price:</label>
                        <input class="col-sm-3" type="text" class="form-control" name="p-price" value="{$row['m_goods_price']}">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Image:</label>
                        <input class="col-sm-4" type="file" class="form-control" name="p-image">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category:</label>
                        <select class="form-select col-sm-5" name="p-category">
                            <option value="Furniture" {$selected1}>Furniture</option>
                            <option value="Grocery" {$selected2}>Grocery</option>
                            <option value="Electronics" {$selected3}>Electronics</option>
                            <option value="Gifts" {$selected4}>Gifts</option>
                            <option value="Clothing" {$selected5}>Clothing</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Description:</label>
                        <textarea class="col-sm-8" class="form-control" row="3" name="p-description">{$row['m_goods_description']}</textarea>
                    </div>
                    <input type="hidden" name="p-accountId" value="{$row['m_account_id']}">
                    <input type="hidden" name="p-id" value="{$row['m_goods_id']}">
                    <button type="submit" class="btn btn-primary" name="editProduct">Submit</button>
                    <button type="submit" class="btn btn-danger"  name="deleteProduct">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
ENDBODY;
echo $htmlBody . PHP_EOL;

include_once "process-form.php";

?>