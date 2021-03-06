<!--
	 CSCI 2170: Fall 2021, Group Project
	 header.php
	 Author: Nathaniel Wilson and Dorian Germain Zambo Zambo
-->
<?php
include_once "acesscontrol.php";
	include_once "includes/db.php";
	session_start();
    $_SESSION["value"] = 5;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Merdia Search Engine</title>

	<!-- Link to the main CSS file for the page -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styles.css">

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

	<!-- Link to jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->


<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a class="navbar-brand" href="index.php" style="margin-top: .8cm;">Merida Shop</a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">

                        <li class='nav-item'>
                            
						<?php 
                        $hasQuestionMark = strpos($_SERVER['REQUEST_URI'],'?') !== false;
                        $productView = strpos($_SERVER['REQUEST_URI'],'product.php') !== false;

                        $isempty = 1;

                        if(!empty($hasQuestionMark)){
                            $isempty = 0;
                        }

                        if(isset($_GET['search']) or isset($_GET['searchTypes']) or !empty($productView)){
                            $isempty = 1;
                        }



                        if(isset($_SESSION["id"]) && $isempty == 1){?>
                            <form class="form-inline my-2 my-lg-0" method="GET">
                                <select list="searchTypes" name="searchTypes" id="searchTypes" placeholder="Filter">
                                    <option value="All Items">All</option>
                                    <?php

                                    $sql= "SELECT DISTINCT m_goods_type FROM m_goods";
                                    $result = $conn->query($sql);

                                    while ($row = $result->fetch_row()) {
                                        echo"<option value='" . $row[0]. "'>" . $row[0]. "</option>";

                                    }
                                    ?>

                                </select>
                                <input class="form-control mr-lg-2" type="text" placeholder="Search" name="search" id ='search'>
                                <button name="searchSubmit" class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </li>

						

                        <li class='nav-item'><a class='nav-link' href='index.php?profile=true'>View Profile</a></li>
						<li class='nav-item'><a class='nav-link' href='includes/logout.php'>Logout</a></li>
						<?php }?>
                    </ul>

                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>

</header>
