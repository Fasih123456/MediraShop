
<?php
require_once "includes/header.php";

require_once "includes/functions.php";

require_once "includes/db.php"
?>
<div class='main-banner' id='top'>

    <?php
    if (isset($_GET['search'])) {

        $search_value = $_GET["search"];
        $searchType = $_GET['searchTypes'];
        $filter ="";

        if ($searchType != "" && $searchType != "All Items" ) {

            $filter=$searchType;
        }



        $searchQuery = "SELECT COUNT(*) as itemCheck FROM m_goods WHERE m_goods_name LIKE '%$search_value%' AND  m_goods_type LIKE '%$filter%'";
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
            $sql= "SELECT * FROM m_goods WHERE m_goods_name LIKE '%$search_value%' AND  m_goods_type LIKE '%$filter%'";
            $result = $conn->query($sql);

            echo "<div class='container'>
                    <div class='row'>";
            $counter = 0;

            while ($row = $result->fetch_row()) {


                if($counter == 2) {
                    $counter = 0;
                    echo "  </div></div><hr>
                        <div class='container'>
                        <div class='row'>";
                }

                echo "<div class='item'>
                                  
                                            <img src='" . $row['6']. "'>
                                      
                                            <div class='down-content'>
                                                    <h4>".$row[3]. "</h4>
                                                    <span>$" . $row['5']. "</span>
                                                     <div class='hover-content'>
                                                            <ul>
                                                            
                                                                    <li><a href='includes/product.php'> <i class='fa fa-shopping-cart'></i></a></li>
                                                            </ul>
                                                    </div>
                                            </div>
                            </div>";
                $counter++;
            }

            if($counter != 0){
                echo" </div></div><hr>";
            }

        }

    }
    else{

        $sql= "SELECT * FROM m_goods";
        $result = $conn->query($sql);

        echo "<div class='container'>
                    <div class='row'>";
        $counter = 0;

        while ($row = $result->fetch_row()) {


            if($counter == 2) {
                $counter = 0;
                echo "  </div></div><hr>
                        <div class='container'>
                        <div class='row'>";
            }

            echo "<div class='item'>
                                  
                                            <img src='" . $row['6']. "'>
                                      
                                            <div class='down-content'>
                                                    <h4>".$row[3]. "</h4>
                                                    <span>$" . $row['5']. "</span>
                                                     <div class='hover-content'>
                                                            <ul>
                                                            
                                                                    <li><a href='includes/product.php'> <i class='fa fa-shopping-cart'></i></a></li>
                                                            </ul>
                                                    </div>
                                            </div>
                            </div>";
            $counter++;
        }

        if($counter != 0){
            echo" </div></div><hr>";
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
require_once "includes/footer.php";
?>