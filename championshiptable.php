<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Championship Table </title>
	</head>

	<body>
	<?php
		include "nav.php";
		$con=mysqli_connect("localhost","root","") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
		// Academic GP + Co-curricular GP of all students / total number of students
		?>

		<h2> Championship Table </h2>

		<table name="championshiptable">
			<tr>
				<th> Club ID </th>
				<th> Club Name </th>
				<th> Points </th>
			</tr>
			<tr>
				<td> 2 </td>	
				<td> 



		</td>
		</tr>
		</table>

		<?php 
		$value=mysqli_query($con, "Select AGP, CCGP from student where clubid=4") or die("Error");
		$i=0;
		while($row = mysqli_fetch_assoc($value))
		{
			
			$AGP[i]=(int) $row['AGP'];
			var_dump($AGP);
			$CCGP[i]=(int) $row['CCGP'];
			echo $totalGP[i]=$AGP[i]+$CCGP[i];
			
		}