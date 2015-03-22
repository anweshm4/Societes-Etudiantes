<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Event Records </title>
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
		
		$updateid=$_GET['id'];

		$sql = "SELECT * FROM event where eventid=".$updateid;
		$result = mysqli_query($con, $sql);

		?>
		<form name="update" method="POST" action="updatedevent.php" class="update">
		<?php

		if (mysqli_num_rows($result) > 0)
		{
    		// output data of each row
    		echo "<table class='data'> <thead><tr><th> Event Name </th>  <th> Venue </th> <th> Date </th><th> Registration Type </th> <th> Registration Fees </th> <th> Action </th></tr></thead>";
        
        	while($row = mysqli_fetch_assoc($result))
    		{	$eventname=$row['eventname'];
    			$venue=$row['venue'];
    			$registrationfees=$row['registrationfees'];
   		 		echo "<input type='hidden' name='eventid' value=$updateid>
   		 		<tr> 
        		<td><input type='text' name='eventname' pattern='[A-Za-z]+\s[A-Za-z]+' title='Only alphabets allowed' value='$eventname'> </td>
        		<td><input type='text' name='venue'  title='Only alphabets allowed' value='$venue'> </td>
        		<td><input type='text' name='date' pattern='[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])' id='datepicker' title='Enter Date in YYYY-MM-DD format' required value=".$row["date"]."></td>
        		<td><select name='registrationtype'>
					<option value='Open to All'> Open to All </option>
					<option value='Members Only'> Members Only </option> 
			</select></td>
			<td><input type='text' placeholder='Registration Fees' name='registrationfees' pattern='[0-9]{3}'' value=$registrationfees required> </td>
        		<td> <input type='submit' value='Save'></td>	
        		</tr> </br>";
	  		}
	  	
	  		echo "</table class='data'>";
		}	  

		else
 		{
    		echo "0 results";
		}

	?>
	</form>
	</body>
	</html>