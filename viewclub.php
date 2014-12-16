	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Student Records </title>
	</head>

	<body>
	<?php
		include "nav.php";
		$con=mysqli_connect("localhost","root","") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
		?>
		<?php
		$sql = "SELECT * FROM club";
$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0)
	{
    	// output data of each row
    	echo "<table border='1' cellpadding='5' cellspacing='5' width='90%'> <tr><th>Club ID </th> <th> Club Name </th> <th> Class Room </th>  </th> </tr>";
        
        while($row = mysqli_fetch_assoc($result))
    	{	
   		 	echo "<tr> <td>" . $row["clubid"]."</td>
        	<td>". $row["clubname"]. "</td>
        	<td>". $row["classroomid"]. "</td>
        	 </tr> </br>";
	  	}
	  	
	  	echo "</table>";
	} 

	else
 	{
    	echo "0 results";
	}

?>
