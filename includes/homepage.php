<!--
	 CSCI 2170: Fall 2021, Group Project
	 homepage.php
	 Author: Nathaniel Wilson and Dorian Germain Zambo Zambo
-->
<div class='main-banner' id='top'>

    <?php
    include_once "acesscontrol.php";
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


                if($counter == 3) {
                    $counter = 0;
                    echo "  </div></div><hr>
                        <div class='container'>
                        <div class='row'>";
                }

               
                echo "<div class='item'><a href='product.php?id=" . $row[0]. "'>
                        <img src='" . $row['6']. "' alt='" . $row['3']. "'>
                            <div class='down-content'>
                                <h4>".$row[3]. "</h4>
                                    <span>$" . $row['5']. "</span>
                                        <div class='hover-content'>
                                            <ul>       
                                              <li> <i class='fa fa-shopping-cart'></i></a></li>
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


            if($counter == 3) {
                $counter = 0;
                echo "  </div></div><hr>
                        <div class='container'>
                        <div class='row'>";
            }

          
            echo "<div class='item'><a href='product.php?id=" . $row[0]. "'>
            <img src='" . $row['6']. "' alt='" . $row['3']. "'>
                <div class='down-content'>
                    <h4>".$row[3]. "</h4>
                        <span>$" . $row['5']. "</span>
                            <div class='hover-content'>
                                <ul>       
                                  <li> <i class='fa fa-shopping-cart'></i></a></li>
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