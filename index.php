
<?php
require_once "includes/header.php";

require_once "includes/functions.php";

require_once "includes/db.php"
?>
<div class='main-banner' id='top'>

    <?php
    if (isset($_GET['search'])) {

        $search_value = $_GET["search"];


        $searchQuery = "SELECT COUNT(*) as itemCheck FROM m_goods WHERE m_goods_name LIKE '%$search_value%'";
        $searchResult = mysqli_query($conn, $searchQuery);

        //For debugging
        if (!$searchResult) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }

        $searchRow = mysqli_fetch_array($searchResult);

        $countSearch = $searchRow['itemCheck'];

        if ($countSearch == 0) {
            echo "<p> Nothing Found!</p>";
        } else{
            $sql= "SELECT * FROM m_goods WHERE m_goods_name LIKE '%$search_value%'";
            $result = $conn->query($sql);

            while ($row = $result->fetch_row()) {


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
                                                    <h4>".$row[3]. "</h4>
                                                    <span>" . $row['5']. "</span>
                                                    <ul class='stars'>
                                                            <li><i class='fa fa-star'></i></li>
                                                            <li><i class='fa fa-star'></i></li>
                                                            <li><i class='fa fa-star'></i></li>
                                                            <li><i class='fa fa-star'></i></li>
                                                            <li><i class='fa fa-star'></i></li>
                                                    </ul>
                                            </div>
                                    </div>
                            </div>
                            </div>";
            }

        }

    }

    ?>


</div>

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
<<<<<<< HEAD
require_once "includes/footer.php";
=======



if (isset($_POST['search'])) {
	$search_value=$_POST["search"];
	$searchQuery = "SELECT COUNT(*) as itemCheck FROM m_goods WHERE m_goods_name LIKE %'".$search_value."%'";
	$searchResult = mysqli_query($conn,$searchQuery);

	//For debugging
	if (!$searchResult) {
	printf("Error: %s\n", mysqli_error($conn));
	exit();
	}

	$searchRow = mysqli_fetch_array($searchResult);

	$countSearch = $searchRow['itemCheck'];

	if ($countSearch == 0) {
		echo "<p> Nothing Found!</p>";
	} else{
		$itemQuery = "SELECT * as items FROM m_goods WHERE m_goods_name LIKE %'".$search_value."%'";
		$itemResult = mysqli_query($conn,$itemQuery);

		if (!$itemResult) {
			printf("Error: %s\n", mysqli_error($conn));
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
>>>>>>> 42fe19be3a7d82eba19096be7c88fc1ef9eca1c2
?>