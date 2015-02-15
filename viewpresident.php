<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> President Records </title>
	</head>

	<body>
	<?php
		include "adminnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
		
		$sql = "SELECT p.presidentid, s.name, c.clubname FROM president p, student s, club c where p.clubid=c.clubid and p.registerno=s.registerno order by p.presidentid";
		$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0)
	{
    	// output data of each row
    	echo "<table class='data'><thead> <tr><th> President Name </th> <th>Club Name </th></tr> </thead> <br><br>";
        
        while($row = mysqli_fetch_assoc($result))
    	{	
   		 	echo "<tr> <td>" . $row["name"]."</td>	
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
