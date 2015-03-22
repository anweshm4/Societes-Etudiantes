<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Session Records </title>

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

		$sql = "SELECT * FROM session where sessionid=".$updateid;
		$result = mysqli_query($con, $sql);

		?>
		<form name="update" method="POST" action="updatedsession.php" class="update">
		<?php

		if (mysqli_num_rows($result) > 0)
		{
    		// output data of each row
    		echo "<table class='data'> <thead><tr><th> Session ID </th> <th> Name </th> <th> Date <th> Action </th></tr></thead>";
        
        	while($row = mysqli_fetch_assoc($result))
    		{	$name=$row['name'];
   		 		echo "<input type='hidden' name='sessionid' value=".$row['sessionid'].">
   		 		<tr> <td>".$row['sessionid']."</td>
        		<td><input type='text' name='name' pattern='[A-Za-z]+\s[A-Za-z]+' title='Only alphabets allowed' value='$name'> </td>
        		<td><input type='text' name='sessiondate' pattern='[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])' id='datepicker' title='Enter Date in YYYY-MM-DD format' required value=".$row["sessiondate"]. "></td>
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