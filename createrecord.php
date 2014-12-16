<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Create Student Records </title>

	</head>

	<body>
		
		<?php
			include "nav.php";
			
		?>
		<br><br><br>
		<h2> Create Student Record </h2>
		<div class="box">
		<form name="createrecord" method="POST" action="submitform.php">
			<input type="text" placeholder="Register Number" name="registerno" required pattern="[0-9]{7}" title="Please Enter 7 digit Register Number"><br>
			<input type="text" placeholder="Full Name" name="name" pattern="[A-Za-z]+\s[A-Za-z]+" title="Only alphabets allowed" required> <br>
			<input type="text" placeholder="Hobby Club ID" name="hobbyid" required pattern="[0-9]{2}" title="Enter 2 digit Hobby ID Club"> <br>
			<input type="email" placeholder="Email ID" name="emailid" required> <br>
			<input type="text" placeholder="Date in YYYY-MM-DD format" name="date" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Enter Date in YYYY-MM-DD format" required> <br>
			<input type="text" placeholder="Academic Grade Point" name="agp" required pattern="[0-9]{2}" title="Enter 2 digit Academic Grade Point"> <br>
			<input type="text" placeholder="Co-Curricular Grade Point" name="ccgp" required pattern="[0-9]{2}" title="Enter 2 digit Co-Curricular Grade Point"> <br>
			<input type="submit" value="Submit"> 
			<input type="reset" value="Reset">
		</form>
	</body>
</html> 