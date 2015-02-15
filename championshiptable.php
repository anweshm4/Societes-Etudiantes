<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Championship table </title>
	</head>

	<body>
	<?php
		include "studentnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
		// Academic GP + Co-curricular GP of all students / total number of students
		
		$result=mysqli_query($con, "SELECT clubid , sum(AGP + CCGP) as Total from student group by clubid;") or die("Error");
		$rank=1;
		echo "<table class='data'> <thead> <tr><th>Club Name </th> <th> Average </th><th> Rank </th></tr> </thead> <br><br>";
	    
	    while($row = mysqli_fetch_assoc($result))
	    {	
	    	$total=$row["Total"];
	    	$clubid=$row['clubid'];

	   		$query=mysqli_query($con, "SELECT c.clubname, count(s.registerno)as studentno from club c NATURAL JOIN student s where c.clubid=$clubid;")or die("Error");
	        	
	        while($row = mysqli_fetch_assoc($query))
	    	{
	    		$clubname=$row['clubname'];
	   			echo "<tr> <td> $clubname </td>";	
				$studentno=$row['studentno'];
				$avg=($total/$studentno);
				echo "<td> $avg </td> </tr>";
			}
		}				
	  		echo "</table>";
	?>