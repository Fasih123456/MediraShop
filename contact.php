<?php
require_once "includes/header.php";

require_once "includes/functions.php";

require_once "includes/db.php"
?>

<div class='main-banner' id='top'>
    <form method="post" action="">
        <div class="card card1">
        <div class="card-header card-header1">
        Contact Us
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><label>Email: <input type="email" name="email" autofocus></label></li>
            <li class="list-group-item"><label>Message: </label></li>
            <textarea row="10" style="margin:10px; border-color:lightgrey" name="msg"></textarea>
            <li class="list-group-item"><input type="submit" name="submit" value="Submit"></li>
        </ul>
        <p>
            <?php 
            if(isset($_POST['submit'])){ 
                echo "Your message has been sent! Your ref number is " . hash("crc32",$_POST['msg']) . "<br><a href='index.php'>Go back to homepage</a>";
            } ?>
        </p>
        </div>
    </form>
</div>

<?php
require_once "includes/footer.php";
?>