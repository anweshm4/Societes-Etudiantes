<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Submit Form </title>
	</head>

	<body>

	<?php
		include "adminnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
		echo "<br>";

		echo $name=$_POST['name'];
		echo $clubname=$_POST['selectclub'];
		echo $emailid=$_POST['emailid'];
		echo $joindate=$_POST['date'];
		echo $agp=$_POST['agp'];
		echo $ccgp=$_POST['ccgp'];
		$Message="Already Existing Email-ID! Please Enter Values Again";
		$query="SELECT emailid from student";

		$res = mysqli_query($con, $query);
		while($row1 = mysqli_fetch_assoc($res))
    	{
    		$existingemailid=$row1['emailid'];
    		$existingemailid= preg_replace('/\s+/', '', $existingemailid);
    		$emailid= preg_replace('/\s+/', '', $emailid);
			
			if($existingemailid==$emailid)
    		{
    			echo "<br><br> Matched";
    			header("Location:createstudent.php?Message=" . urlencode($Message));
    			exit(0);
    		}
    	}
    	
		$sql="SELECT clubid from club where clubname='$clubname'";
		$result = mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result))
    		{
    			echo $clubid= $row['clubid'];
    		}

		$query=" INSERT INTO student (name, clubid, emailid, joindate, AGP, CCGP) VALUES ('$name',$clubid,'$emailid','$joindate', $agp, $ccgp);";
		mysqli_query($con, $query) or die(mysqli_error());
		header('Location: viewstudent');
	?>
