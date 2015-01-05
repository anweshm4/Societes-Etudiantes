<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Create Mentor Record</title>

	</head>

	<body>
		
		<?php
			include "nav.php";
			
		?>
		<br><br><br>
		<div class="box">
		<form name="createrecord" method="POST" action="submitmentor.php" class="create">
			<h2> Create Mentor</h2>
			<input type="text" placeholder="Mentor ID" name="mentorid" required pattern="[0-9]{3}" title="Please Enter 3 digit Mentor ID"><br>
			<input type="text" placeholder="Full Name" name="mentorname" pattern="[A-Za-z]+\s[A-Za-z]+" title="Only alphabets allowed" required> <br>
			<input type="email" placeholder="Email ID" name="emailid" required> <br>
			<input type="text" placeholder="Hobby Club ID" name="clubid" required pattern="[0-9]{2}" title="Enter 2 digit Hobby ID Club"> <br>
			<br>
			<input type="submit" value="Submit"> 
		</form>
	</body>
</html> 