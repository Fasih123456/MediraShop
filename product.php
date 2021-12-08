<?php
    require_once "includes/db.php";
	require_once "includes/header.php";
	require_once "includes/functions.php";
?>

	<main id="product-main-content">
	<?php
		if(isset($_GET['id'])){
			$querySQL = "SELECT * FROM `m_goods` 
						LEFT JOIN `m_account` 
						ON `m_goods`.`m_account_id` = `m_account`.`m_account_id`
						RIGHT JOIN `m_login`
						ON `m_account`.`m_login_id` = `m_login`.`m_id`
						WHERE `m_goods`.`m_goods_id` = {$_GET['id']}";

			$result = $conn->query($querySQL);
			if ($result->num_rows > 0) {    
				$row = $result->fetch_assoc();

				$selected1 = $selected2 = $selected3 = $selected4 = $selected5 = "";
				switch ($row['m_goods_type']) {
					case "Furniture":
						$selected1 = "selected";
						break;
					case "Grocery":
						$selected2 = "selected";
						break;
					case "Electronics":
						$selected3 = "selected";
						break;
					case "Gifts":
						$selected4 = "selected";
						break;
					case "Clothing":
						$selected5 = "selected";
						break;
				}
				
				
				if(isset($_GET['edit'])){
					include_once "includes/product-edit.php";
				}
				else{
					$editButton = "" . PHP_EOL;
					if(isset($_SESSION['id'])){
						if($_SESSION['id'] == $row['m_id']){
							$editButton = "<button><a href='product.php?id={$row['m_goods_id']}&edit=True'>Edit</a></button>" . PHP_EOL;
						}
					}
					
					$buyLink = "card.php?pId=" . $_GET['id'];
					$querySQL = "SELECT * FROM `m_card` 
								LEFT JOIN `m_account`
								ON `m_account`.`m_account_id`= `m_card`.`m_account_id`
								INNER JOIN `m_login`
								ON `m_account`.`m_login_id`= `m_login`.`m_id`
								WHERE `m_login`.`m_id` = {$_SESSION['id']}";			
					$result = $conn->query($querySQL);
					if ($result->num_rows > 0) {
						$buyLink = "checkout.php?id={$_GET['id']}";
					}

					include_once "includes/product-view.php";
					
				}
			}
			else{
				echo "<p>No products to show</p>";
			}   
		
		}
		else if(isset($_GET['create'])){
			$querySQL = "SELECT * FROM `m_account` 
						RIGHT JOIN `m_login`
						ON `m_account`.`m_login_id` = `m_login`.`m_id`
						WHERE `m_login`.`m_id` = {$_SESSION['id']}";

			$result = $conn->query($querySQL);
			$row = $result->fetch_assoc();

			include_once "includes/product-create.php";

		}	
	?>
	</main>

<?php
	require_once "includes/footer.php";
?>

