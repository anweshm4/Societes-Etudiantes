<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Mentor Records </title>
	</head>

	<body>
	<?php
		include "adminnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
		
		$sql = "SELECT m.mentorid, m.mentorname, m.emailid, c.clubname FROM mentor m, club c where m.clubid=c.clubid";
		$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0)
	{
    	// output data of each row
    	echo "<table class='data'><thead> <tr><th> Name </th> <th> Email ID </th> <th> Club Name </th><th> Update </th> <th> Delete </th> </tr> </thead> <br><br>";
        
        while($row = mysqli_fetch_assoc($result))
    	{	
   		 	echo "<tr> <td>" . $row["mentorname"]."</td>	
        	<td>". $row["emailid"]. "</td>
        	<td>". $row["clubname"]. "</td>
        	<td> <a href='mentorupdate.php?id=".$row['mentorid']."'>Update </a> </td>
        	<td> <a href='deletementor.php?id=".$row['mentorid']."'>Delete </a> </td>
        	 </tr>";
	  	}
	  	
	  	echo "</table class='data'>";
	} 

	else
 	{
    	echo "0 results";
	}

?>
