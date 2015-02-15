<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Create Mentor Record</title>

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
		<form name="createrecord" method="POST" action="submitmentor.php" class="create">
			<h2> Create Mentor</h2>
			<input type="text" placeholder="Full Name" name="mentorname" pattern="[A-Za-z]+\s[A-Za-z]+" title="Only alphabets allowed" required> <br>
			<input type="email" placeholder="Email ID" name="emailid" required> <br>
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
			<input type="submit" value="Submit"> 
		</form>
	</body>
</html> 