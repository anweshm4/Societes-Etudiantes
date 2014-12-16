<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Student Records </title>
	</head>

	<body>
	<?php
		include "nav.php";
		$con=mysqli_connect("localhost","root","") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
		
		$sql = "SELECT * FROM student";
$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0)
	{
    	// output data of each row
    	echo "<table border='1' cellpadding='5' cellspacing='5' width='90%'> <tr><th> Register Number </th> <th> Name </th> <th> Club ID </th> <th> Email ID </th> <th> Joining Date </th> <th> Academic GP </th> <th> Co-Curricular GP </th><th> Update </th><th> Delete </th> </tr>";
        
        while($row = mysqli_fetch_assoc($result))
    	{	
   		 	echo "<tr> <td>" . $row["registerno"]."</td>
        	<td>". $row["name"]. "</td>
        	<td>". $row["clubid"]. "</td>
        	<td>". $row["emailid"]. "</td>
        	<td>" . $row["joindate"]. "</td>
        	<td>". $row['AGP']."</td>
        	<td>". $row['CCGP']."</td>
        	<td> <a href='update.php?id=".$row['registerno']."'>Update </a> </td>
        	<td> <a href='delete.php?id=".$row['registerno']."'>Delete </a> </td>
        	 </tr> </br>";
	  	}
	  	
	  	echo "</table>";
	} 

	else
 	{
    	echo "0 results";
	}

?>
