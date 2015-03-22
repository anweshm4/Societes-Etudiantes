<?php
	$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
	//echo"Connection Established";
	$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
	//echo'<br>'."Connection To Database Established"."<br>";


	if(isset($_GET[date]))
		{
			$date=$_GET[date];
		}
	else
	{
		echo "Not Working";
	}

	$sql = "SELECT c.clubname, e.eventname, e.venue, e.registrationtype, e.registrationfees FROM event e NATURAL JOIN club c where date='$date'";
	$result = mysqli_query($con, $sql);

	 while($row = mysqli_fetch_assoc($result))
    {
    	$clubid =$row['clubname'];
    	$eventname = $row['eventname'];
    	$venue= $row['venue'];
    	$timing="4:00 PM onwards";
    	$registrationtype= $row['registrationtype'];
    	$registrationfees=$row['registrationfees'];    	
		echo "<p> Event Name :<b> $eventname </b></p>";
		echo "<p> Hosted By : The $clubid Club</p>";
		echo "<p> Venue : $venue</p>";
		echo "<p> Timing : $timing </p>";
		echo "<p> Registration Type : $registrationtype</p>";
		echo "<p> Registration Fees : Rs. $registrationfees</p>";

		
		
    
    }


?>