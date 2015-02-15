	<!DOCTYPE HTML>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Club Records </title>
	</head>

	<body>
	<?php
		include "adminnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
		
		$sql = "SELECT c.clubid, c.clubname, s.name, m.mentorname, c.classroomid FROM club c JOIN mentor m ON c.clubId=m.clubId JOIN president p ON p.clubID = c.clubID JOIN student s on p.registerno=s.registerno";
				$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0)
	{
    	// output data of each row
    	echo "<table class='data'><thead> <tr><th>Club ID </th> <th> Club Name </th><th> President Name </th><th> Mentor Name </th> <th> Class Room </th> <th> View Students </th><th> Update </th> <th> Delete </th> </tr> </thead> <br><br>";
        while($row = mysqli_fetch_assoc($result))
    	{	
   		 	echo "<tr> <td>" . $row["clubid"]."</td>
        	<td>". $row["clubname"]. "</td>
        	<td>". $row["name"]. "</td>
	        <td>".$row["mentorname"]. "</td>
        	<td>". $row["classroomid"]. "</td>
        	<td> <a href='clubstudents.php?id=".$row['clubid']."'>View Students </a> </td>
        	<td> <a href='clubupdate.php?id=".$row['clubid']."'>Update </a> </td>
        	<td> <a href='deleteclub.php?id=".$row['clubid']."'>Delete </a> </td>
        	</tr>";
        }	

	  	echo "</table class='data'>";
	} 

	else
 	{
    	echo "0 results";
	}

?>
