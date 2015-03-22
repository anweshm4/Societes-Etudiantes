<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Create Session </title>

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
			$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
			//echo"Connection Established";
			$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
			//echo'<br>'."Connection To Database Established"."<br>";
			
			include "adminnav.php";

			$sql="SELECT clubname from club";
			
		?>
		<br><br><br>
		<div class="box">
		<form name="createclub" method="POST" action="submitsession.php" class="create">
			<h2> Create Session </h2>
			<input type="text" placeholder="Session Name" name="sessionname" pattern="[A-Za-z]+" title="Only alphabets allowed" required> <br>
			<select name='selectclub'>
			<?php
				$result = mysqli_query($con, $sql);
				while($row = mysqli_fetch_assoc($result))
    			{
    				$clubname=$row['clubname'];
    				echo " <option value='$clubname'> $clubname </option>";
    			}
    		?>	
			<br>
			<input type="text" placeholder="Date in YYYY-MM-DD format" name="date" id='datepicker' pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Enter Date in YYYY-MM-DD format" required> <br>
			<br>
			<br>
			<input type="submit" value="Submit">
		</form>
	</body>
</html> 