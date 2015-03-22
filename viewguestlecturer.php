<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Sorts+Mill+Goudy:400italic' rel='stylesheet' type='text/css'>
		
		<title> Guest Lecturer Records </title>
	</head>

	<body>
	<?php
		include "adminnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";

		echo "<div class='clubheading'>";
    	echo "<p class='clubheader'> Guest Lecturer Report <hr class='clubhr'> </p> </div>";
		
		$sql = "SELECT gl.name, gl.emailid, gl.designation, gl.institute, gl.yearsofexperience, gl.contact, gl.clubid, c.clubname FROM guest_lecturer gl, club c where gl.clubid=c.clubid order by gl.glid";
		$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0)
	{
    	// output data of each row
    	echo "<br><br><br><br><table class='data'><thead> <tr><th> Name </th> <th> Email ID </th> <th> Designation </th><th> Institute </th> <th> Years of Experience </th> <th> Contact No. </th> <th> Club Name </th> </tr> </thead> <br><br>";
        
        while($row = mysqli_fetch_assoc($result))
    	{	
   		 	echo "<tr> <td>" . $row["name"]."</td>	
        	<td>". $row["emailid"]. "</td>
        	<td>". $row["designation"]. "</td>
        	<td>". $row["institute"]. "</td>
        	<td>". $row["yearsofexperience"]. "</td>
        	<td>". $row["contact"]. "</td>
        	<td>". $row["clubname"]. "</td>
        	 </tr>";
	  	}
	  	
	  	echo "</table class='data'>";
	} 

	else
 	{
    	echo "0 results";
	}

?>
