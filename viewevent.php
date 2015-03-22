<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Event Records </title>
	</head>

	<body>
	<?php
		include "adminnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
		
		$sql = "SELECT e.eventid, e.eventname, c.clubname, e.venue, e.date, e.registrationtype, e.registrationfees FROM event e NATURAL JOIN club c";
		$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0)
	{
    	// output data of each row
    	echo "<table class='data'><thead> <tr><th> Event Name </th> </th> <th> Club Name </th><th> Venue </th> <th> Date </th><th> Registration Type </th> <th> Registration Fees </th> <th> Update </th> <th> Delete </th> </tr> </thead> <br><br>";
        
        while($row = mysqli_fetch_assoc($result))
    	{	
   		 	echo "<tr> <td>" . $row["eventname"]."</td>	
        	<td>". $row["clubname"]. "</td>
        	<td>". $row["venue"]. "</td>
        	<td>". $row["date"]. "</td>
        	<td>". $row["registrationtype"]. "</td>
        	<td>". $row["registrationfees"]. "</td>
        	<td> <a href='eventupdate.php?id=".$row['eventid']."'>Update </a> </td>
        	<td> <a href='deleteevent.php?id=".$row['eventid']."'>Delete </a> </td>
        	 </tr>";
	  	}
	  	
	  	echo "</table class='data'>";
	} 

	else
 	{
    	echo "0 results";
	}

?>
