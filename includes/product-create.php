<?php 
$htmlBody = <<<ENDBODY
<div class="product-section">
    <div class="card">
        <div class="card-body">
            <h3>Create Product</h3>
            <div class="product-edit">
                <form action="includes/process-form.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Product Name:</label>
                        <input class="col-sm-8 form-control" type="text" name="p-name">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Price:</label>
                        <input class="col-sm-3 form-control" type="text" name="p-price">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Image:</label>
                        <input class="col-sm-4 form-control" type="file" name="p-image">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category:</label>
                        <select class="form-select col-sm-5" name="p-category">
                            <option value="Furniture">Furniture</option>
                            <option value="Grocery">Grocery</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Gifts">Gifts</option>
                            <option value="Clothing">Clothing</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Description:</label>
                        <textarea class="col-sm-8" class="form-control" row="3" name="p-description"></textarea>
                    </div>
                    <input type="hidden" name="p-accountId" value="{$row['m_account_id']}">
                    <button type="submit" class="btn btn-primary" name="createProduct">Create</button>
                    <button type="submit" class="btn btn-danger">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
ENDBODY;
echo $htmlBody . PHP_EOL;
?>