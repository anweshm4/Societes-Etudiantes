<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<!-- jQuery library (served from Google) -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<!-- bxSlider Javascript file -->
		<script src="js/jquery.bxslider.min.js"></script>
		<!-- bxSlider CSS file -->
		<link href="css/jquery.bxslider.css" rel="stylesheet" />
		
		<script src="js/slidercall.js"></script>
			
		<title> Home Page </title>

	</head>

	<body>
		<iframe src="loginform.html"  width="30%" height="90%" frameborder="0"> </iframe>	
		<ul class="bxslider">
  			<li><img src="images/pic1.jpg" /></li>
  			<li><img src="images/pic2.jpeg" /></li>
  			<li><img src="images/pic3.jpg" /></li>
  			<li><img src="images/pic4.jpeg" /></li>
		</ul>

		<?php
			include "adminnav.php";
		?>
	</body>
</html>
