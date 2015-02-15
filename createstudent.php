<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Create Student Records </title>
		<link rel="stylesheet" href="css/jquery-ui.css">
		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/jquery-ui.js"></script>

		<script>
		$(function() {
		$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
		});
		</script>

	</head>

	<body>
		
		<?php
			include "adminnav.php";

			$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
			//echo"Connection Established";
			$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
			
			$sql="SELECT clubname from club";
		?>
		<br><br><br>
		<div class="box">
		<form name="createrecord" method="POST" action="submitform.php" class="create">
			<h2> Create Student Record </h2>
			<input type="text" placeholder="Register Number" name="registerno" required pattern="[0-9]{7}" title="Please Enter 7 digit Register Number"><br>
			<input type="text" placeholder="Full Name" name="name" pattern="[A-Za-z]+\s[A-Za-z]+" title="Only alphabets allowed" required> <br>
			<select name='selectclub'>
			<?php
				$result = mysqli_query($con, $sql);
				while($row = mysqli_fetch_assoc($result))
    			{
    				$clubname=$row['clubname'];
    				echo " <option value='$clubname'> $clubname </option>";
    			}
    		?>		
			<input type="email" placeholder="Email ID" name="emailid" required> <br>
			<input type="text" placeholder="Date in YYYY-MM-DD format" name="date" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" id="datepicker" title="Enter Date in YYYY-MM-DD format" required> <br>
			<input type="text" placeholder="Academic Grade Point" name="agp" required pattern="[0-9]{2}" title="Enter 2 digit Academic Grade Point"> <br>
			<input type="text" placeholder="Co-Curricular Grade Point" name="ccgp" required pattern="[0-9]{2}" title="Enter 2 digit Co-Curricular Grade Point"> <br>
			<br>
			<input type="submit" value="Submit"> 
		</form>
	</body>
</html> 