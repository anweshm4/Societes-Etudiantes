<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Championship Table </title>
	</head>

	<body>
	<?php
		include "nav.php";
		$con=mysqli_connect("localhost","root","") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
		// Academic GP + Co-curricular GP of all students / total number of students
		
		$result=mysqli_query($con, "SELECT s.name, c.clubname, (s.AGP + s.CCGP) as Total from student s JOIN club c order by Total desc;") or die("Error");
		$rank=1;
		if (mysqli_num_rows($result) > 0)
		{
    	// output data of each row
    	echo "<table border='1' cellpadding='5' cellspacing='5' width='90%'><thead> <tr><th>Club Name </th> <th> Total </th><th> Rank </th></tr> </thead> <br><br>";
        while($row = mysqli_fetch_assoc($result))
    	{	
   		 	echo "<tr> <td>" . $row["name"]."</td>
   		 	<td>". $row["Total"]. "</td>
        	</tr>";
        }	

	  	echo "</table>";
	} 

	else
 	{
    	echo "0 results";
	}
