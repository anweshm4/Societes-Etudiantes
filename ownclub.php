<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Sorts+Mill+Goudy:400italic' rel='stylesheet' type='text/css'>
		<title> Club </title>
	</head>
	<?php

    include_once 'includes/db_connect.php';
    include_once 'includes/functions.php';

    $con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
    //echo"Connection Established";
    $db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
    //echo'<br>'."Connection To Database Established"."<br>";


    sec_session_start();
    $username=$_SESSION['username'];

    $sql="SELECT s.clubid FROM student s JOIN user u WHERE u.email = s.emailid AND username LIKE '$username'";
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($result))
        {
            $clubid=$row['clubid'];
        }

	include "studentnav.php";

	$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
		

		$sql = "SELECT clubname, logo FROM club where clubid=".$clubid;
		$result = mysqli_query($con, $sql);

		 while($row = mysqli_fetch_assoc($result))
    	{
    		$image=$row['logo'];
    		$clubname=$row['clubname'];
    	}
    	echo "<div class='clubheading'>";
    	echo "<p class='clubheader'> $clubname <hr class='clubhr'> </p> </div>";

		echo "<img class='clublogo' src=$image>";

		$sql="SELECT c.classroomid, m.mentorname from club c NATURAL JOIN mentor m where c.clubid=$clubid";

		$result = mysqli_query($con, $sql);


		while($row = mysqli_fetch_assoc($result))
    	{
    		$classroom=$row['classroomid'];
    		$mentorname=$row['mentorname'];
    	}

    	$sql="SELECT s.name from student s NATURAL JOIN president p where p.clubid=$clubid";

    	$result = mysqli_query($con, $sql);


    	while($row = mysqli_fetch_assoc($result))
    	{
    		$presidentname=$row['name'];
    	}

    	echo "<table class='clubdata'> <br> <br><br><br>";
    	echo "<thead> <tr> <th> Position </th> <th> Name </th> </tr> </thead>";
    	echo "<tr> <td> Mentor </td> <td> $mentorname </td> </tr>";
    	echo "<tr> <td> President </td> <td> $presidentname </td> </tr>";
    	echo "<tr> <td> Classroom </td> <td> $classroom </td> </tr>";

    	echo "</table>";

    	$sql="SELECT s.name, s.sessiondate, m.mentorname from session s NATURAL JOIN mentor m where s.clubid=$clubid";

    	$result = mysqli_query($con, $sql);

    	echo "<br><table class='sessiondata'>";
    	echo "<thead> <tr> <th> Session Number </th> <th> Date </th> <th> Session Name </th> <th> Mentored By </th> </tr> </thead>";
    	$id=1;

    	while($row = mysqli_fetch_assoc($result))
    	{
    		$sessionname=$row['name'];
    		$mentorname=$row['mentorname'];
    		$sessiondate=$row['sessiondate'];

    		echo "<tr> <td> $id  </td> <td> $sessiondate <td> $sessionname </td> <td> $mentorname </td> </tr>";
    		
    		$id++;
    	}
    	echo "</table>";


	?>