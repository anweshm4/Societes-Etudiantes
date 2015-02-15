<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Create Club </title>

	</head>

	<body>
		
		<?php
			include "adminnav.php";
			
		?>
		<br><br><br>
		<div class="box">
		<form name="createclub" method="POST" action="submitclub.php" class="create">
			<h2> Create Club </h2>
			<input type="text" placeholder="Club Name" name="clubname" pattern="[A-Za-z]+" title="Only alphabets allowed" required> <br>
			<input type="text" placeholder="Class Room" name="classroomid" pattern="[0-9]{3}"required> <br>
			<br>
			<input type="submit" value="Submit">
		</form>
	</body>
</html> 