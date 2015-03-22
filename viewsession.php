<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
				<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Sorts+Mill+Goudy:400italic' rel='stylesheet' type='text/css'>
		<title> Sessions</title>
	</head>

	<body>
	<?php
		include "adminnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
		echo "<div class='clubheading'>";
    	echo "<p class='clubheader'> Session Report <hr class='clubhr'> </p> </div>";

		
		$sql = "SELECT s.sessionid, s.name, s.sessiondate, m.mentorname, c.clubname FROM session s NATURAL JOIN mentor m NATURAL JOIN club c order by c.clubname";
		$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0)
	{
    	// output data of each row
    	echo "<br><br><br><br><table class='data'><thead> <tr><th> Session Name </th> <th> Session Date <th> Mentor Name </th> <th> Club Name </th> <th> Update </th> <th> Delete </th> </tr> </thead> <br><br>";
        
        while($row = mysqli_fetch_assoc($result))
    	{		
        	echo "<tr><td>". $row["name"]. "</td>
        	<td>". $row["sessiondate"]. "</td>
        	<td>". $row["mentorname"]. "</td>
        	<td>". $row["clubname"]. "</td>
        	<td> <a href='sessionupdate.php?id=".$row['sessionid']."'>Update </a> </td>
        	<td> <a href='deletesession.php?id=".$row['sessionid']."'>Delete </a> </td>
        	 </tr>";
	  	}
	  	
	  	echo "</table class='data'>";
	} 

	else
 	{
    	echo "0 results";
	}

?>
