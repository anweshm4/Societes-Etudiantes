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

    	$sql="SELECT clubname from club where clubid=$clubid";

    	$result = mysqli_query($con, $sql);

		 while($row = mysqli_fetch_assoc($result))
    	{
    		$clubname=$row['clubname'];
    	}


		echo "<div class='clubheading'>";
    	echo "<p class='clubheader'>$clubname Club's Guest Lecturer Report <hr class='clubhr'> </p> </div>";
		
		$sql = "SELECT name, emailid, designation, institute, yearsofexperience, contact, clubid FROM guest_lecturer where clubid=$clubid";
		$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0)
	{
    	// output data of each row
    	echo "<br><br><br><br><table class='data'><thead> <tr><th> Name </th> <th> Email ID </th> <th> Designation </th><th> Institute </th> <th> Years of Experience </th> <th> Contact No. </th>  </tr> </thead> <br><br>";
        
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
