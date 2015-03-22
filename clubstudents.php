<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Club Students </title>
	</head>

	<body>
	<?php
		include "adminnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
		
		$updateid=$_GET['id'];

		$sql = "SELECT * FROM student where clubid=".$updateid;
		$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0)
	{
    	// output data of each row
    	echo "<table class='data'><thead> <tr><th> Register Number </th> <th> Name </th> <th> Email ID </th> <th> Joining Date </th> <th> Academic GP </th> <th> Co-Curricular GP </th><th> Action </th</tr> </thead> <br><br>";
        
        while($row = mysqli_fetch_assoc($result))
    	{	
   		 	echo "<tr> <td>" . $row["registerno"]."</td>
        	<td>". $row["name"]. "</td>
        	<td>". $row["emailid"]. "</td>
        	<td>" . $row["joindate"]. "</td>
        	<td>". $row['AGP']."</td>
        	<td>". $row['CCGP']."</td>
        	<td> <a href='appointpresident.php?id=".$row['registerno']."'>Appoint President </a> </td>
        	 </tr>";
	  	}
	  	
	  	echo "</table class='data'>";
	} 

	else
 	{
    	echo "0 results";
	}

?>

