<?php
	require_once "includes/header.php";

	require_once "includes/functions.php";

	require_once "includes/db.php"
?>

	<main id="homepg-main-content">
		Currently At index.php!
	</main>

<?php

if(isset($_GET['login'])){
	include "includes/login.php";
}

if(isset($_GET['register'])){
	include "includes/register.php";
}

if(isset($_GET['profile'])){
	include "includes/profile.php";
}



if (isset($_POST['search'])) {
	$search_value=$_GET["search"];
	$searchQuery = "SELECT COUNT(*) as itemCheck FROM m_goods WHERE m_goods_name LIKE %'".$search_value."%'";
	$searchResult = mysqli_query($dbconn,$searchQuery);

	//For debugging
	if (!$searchResult) {
	printf("Error: %s\n", mysqli_error($dbconn));
	exit();
	}

	$searchRow = mysqli_fetch_array($result);

	$countSearch = $searchRow['itemCheck'];

	if ($countSearch == 0) {
		echo "<p> Nothing Found!</p>";
	} else{
		$itemQuery = "SELECT * as items FROM m_goods WHERE m_goods_name LIKE %'".$search_value."%'";
		$itemResult = mysqli_query($dbconn,$itemQuery);

		if (!$itemResult) {
			printf("Error: %s\n", mysqli_error($dbconn));
			exit();
			}

		
    while($row = mysqli_fetch_array($itemResult)) {
        echo "<div class='container'>
				<div class='row'>
						<div class='col-lg-4'>
								<div class='item'>
										<div class='thumb'>
												<div class='hover-content'>
														<ul>
																<li><a href='single-product.html'><i class='fa fa-eye'></i></a></li>
																<li><a href='single-product.html'><i class='fa fa-star'></i></a></li>
																<li><a href='single-product.html'><i class='fa fa-shopping-cart'></i></a></li>
														</ul>
												</div>
										</div>
										<div class='down-content'>
												<h4>" . $row['m_goods_name']. "</h4>
												<span>" . $row['m_goods_price']. "</span>
												<ul class='stars'>
														<li><i class='fa fa-star'></i></li>
														<li><i class='fa fa-star'></i></li>
														<li><i class='fa fa-star'></i></li>
														<li><i class='fa fa-star'></i></li>
														<li><i class='fa fa-star'></i></li>
												</ul>
										</div>
								</div>
						</div'";
      }

    }

	}


	require_once "includes/footer.php";
?>