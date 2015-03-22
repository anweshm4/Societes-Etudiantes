<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Sessions</title>
	</head>

	<body>
	<?php
		include "useraccesscheck.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
		
		$username=substr($username,0,3);

		$sql="SELECT clubid from mentor where mentorname like '$username%'";

		$result = mysqli_query($con, $sql);

		 while($row = mysqli_fetch_assoc($result))
    	{
    		$clubid=$row['clubid'];
    	}

		$sql="SELECT s.name, s.sessiondate, c.clubname, c.classroomid from session s NATURAL JOIN club c where clubid=$clubid";

		$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0)
	{
    	// output data of each row
    	echo "<table class='data'><thead> <tr><th> Session Name </th> <th> Session Date </th> <th> Club Name </th> <th> Venue </th> </tr> </thead> <br><br>";
        
        while($row = mysqli_fetch_assoc($result))
    	{		
        	echo "<tr><td>". $row["name"]. "</td>
        	<td>". $row["sessiondate"]. "</td>
        	<td>". $row["clubname"]. "</td>
        	<td>". $row["classroomid"]. "</td>
        	 </tr>";
	  	}
	  	
	  	echo "</table class='data'>";
	} 

	else
 	{
    	echo "0 results";
	}

?>
