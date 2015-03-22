<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Student Records </title>
	</head>

	<body>
	<?php
		include "adminnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
		
		$updateid=$_GET['id'];

		$sql = "SELECT * FROM mentor where mentorid=".$updateid;
		$result = mysqli_query($con, $sql);

		?>
		<form name="update" method="POST" action="updatedmentor.php" class="update">
		<?php

		if (mysqli_num_rows($result) > 0)
		{
    		// output data of each row
    		echo "<table class='data'> <thead><tr><th> Mentor ID </th> <th> Name </th> <th> Email ID </th> <th> Action </th></tr></thead>";
        
        	while($row = mysqli_fetch_assoc($result))
    		{	$name=$row['mentorname'];
   		 		echo "<input type='hidden' name='mentorid' value=".$row['mentorid'].">
   		 		<tr> <td>".$row['mentorid']."</td>
        		<td><input type='text' name='name' pattern='[A-Za-z]+\s[A-Za-z]+' title='Only alphabets allowed' value='$name'> </td>
        		<td><input type='email' name='emailid' value=". $row["emailid"]. "></td>
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