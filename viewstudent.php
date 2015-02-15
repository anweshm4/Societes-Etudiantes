<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Student Records </title>
	</head>

	<body>
	<?php
		include "adminnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
		
		$sql = "SELECT s.registerno,s.name,c.clubname,s.emailid,s.joindate,s.AGP, s.CCGP FROM student s, club c where s.clubid=c.clubid order by registerno";
		$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0)
	{
    	// output data of each row
    	echo "<table class='data' border='1' cellpadding='5' cellspacing='5' width='90%'><thead> <tr><th> Register Number </th> <th> Name </th> <th> Club Name </th> <th> Email ID </th> <th> Joining Date </th> <th> Academic GP </th> <th> Co-Curricular GP </th><th> Action </th> <th> Update </th><th> Delete </th> </tr> </thead> <br><br>";
        
        while($row = mysqli_fetch_assoc($result))
    	{	
   		 	echo "<tr> <td>" . $row["registerno"]."</td>
        	<td>". $row["name"]. "</td>
        	<td>". $row["clubname"]. "</td>
        	<td>". $row["emailid"]. "</td>
        	<td>" . $row["joindate"]. "</td>
        	<td>". $row['AGP']."</td>
        	<td>". $row['CCGP']."</td>
        	<td> <a href='insertpresident.php?id=".$row['registerno']."'>Appoint President </a> </td>
        	<td> <a href='studentupdate.php?id=".$row['registerno']."'>Update </a> </td>
        	<td> <a href='deletestudent.php?id=".$row['registerno']."'>Delete </a> </td>
        	 </tr>";
	  	}
	  	
	  	echo "</table class='data'>";
	} 

	else
 	{
    	echo "0 results";
	}

?>
