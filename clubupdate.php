<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Updating Club Records </title>
	</head>

	<body>
	<?php
		include "nav.php";
		$con=mysqli_connect("localhost","root","") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
		
		$updateid=$_GET['id'];

		$sql = "SELECT * FROM club where clubid=".$updateid;
		$result = mysqli_query($con, $sql);

		?>
		<form name="update" method="POST" action="updatedclub.php" class="update">
		<?php

		if (mysqli_num_rows($result) > 0)
		{
    		// output data of each row
    		echo "<table border='1' cellpadding='5' cellspacing='5' width='90%'> <thead><tr><th> Club ID </th> <th> Club Name </th> <th> Class Room ID <th> Action </th></tr></thead>";
        
        	while($row = mysqli_fetch_assoc($result))
    		{	
   		 		echo "<input type='hidden' name='clubid' value=".$row['clubid'].">
   		 		<tr> <td>".$row['clubid']."</td>
        		<td><input type='text' placeholder='Club Name' name='clubname' pattern='[A-Za-z]+' title='Only alphabets allowed' value=".$row["clubname"]. "></td>  
				<td><input type='text' placeholder='Class Room' name='classroomid' pattern='[0-9]{3}' value=".$row["classroomid"]. "> </td>
	
        		<td> <input type='submit' value='Save'></td>	
        		</tr> </br>";
	  		}
	  	
	  		echo "</table>";
		}	 

		else
 		{
    		echo "0 results";
		}

	?>
	</form>
	</body>
	</html>