
<!--
	 CSCI 2170: Fall 2021, Group Project
	 footer.php
	 Author: Dorian Germain Zambo Zambo
-->
<?php
include_once "acesscontrol.php";
?>
	<!-- Footer for the web page -->
		 <!-- ***** Footer Start ***** -->
	 <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2022 Merida Shop, Ltd. All Rights Reserved. 
                        
                        <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a>

                        <br>Distributed By: <a href="https://themewagon.com" target="_blank" title="free & premium responsive templates">ThemeWagon</a></p>
                        <ul>
                            <li><a href="contact.php"><h3>Contact Us</h3></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

	<script src="js/scripts.js"></script>
	    <!-- jQuery -->
			<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/accordions.js"></script>
<script src="assets/js/datepicker.js"></script>
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script> 
<script src="assets/js/slick.js"></script> 
<script src="assets/js/lightbox.js"></script> 
<script src="assets/js/isotope.js"></script> 

<!-- Global Init -->
<script src="assets/js/custom.js"></script>

<script>

		$(function() {
				var selectedClass = "";
				$("p").click(function(){
				selectedClass = $(this).attr("data-rel");
				$("#portfolio").fadeTo(50, 0.1);
						$("#portfolio div").not("."+selectedClass).fadeOut();
				setTimeout(function() {
					$("."+selectedClass).fadeIn();
					$("#portfolio").fadeTo(50, 1);
				}, 500);
						
				});
		});

</script>

</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
