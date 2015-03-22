<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Sorts+Mill+Goudy:400italic' rel='stylesheet' type='text/css'>
		<title> Club </title>
	</head>
	<?php
	include "studentnav.php";

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

		$sql="SELECT clubid, clubname from club";


		?>
		<br><br><br>
		<div class="box">
		<form name="changeclub" method="POST" action="submitclubchange.php" class="create">
			<h2> Change Club </h2>
			<select name='selectclub'>
			<?php
				$result = mysqli_query($con, $sql);
				while($row = mysqli_fetch_assoc($result))
    			{
    				if($clubid==$row['clubid'])
    				{
    				}
    				else
    				{
    					$clubname=$row['clubname'];
    					echo " <option value='$clubname'> $clubname </option>";
    				}
    			}
    		?>		
			<br>
			<input type="submit" value="Submit"> 
		</form>
	</body>
</html> 