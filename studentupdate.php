<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Student Records </title>

		<link rel="stylesheet" href="css/jquery-ui.css">
		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/jquery-ui.js"></script>

		<script>
		$(function() {
		$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
		});
		</script>

	</head>

	<body>
	<?php
		include "adminnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
		
		$updateid=$_GET['id'];

		$sql = "SELECT * FROM student where registerno=".$updateid;
		$result = mysqli_query($con, $sql);

		$query="SELECT clubname from club";
		$club = mysqli_query($con, $query);

		?>
		<form name="update" method="POST" action="updatedstudent.php" class="update">
		<?php

		if (mysqli_num_rows($result) > 0)
		{
    		// output data of each row
    		echo "<table class='data'> <thead><tr><th> Register Number </th> <th> Name </th>  <th> Email ID </th> <th> Joining Date </th> <th> AGP </th> <th> CCGP </th> <th> Action </th></tr></thead>";
        
        	while($row = mysqli_fetch_assoc($result))
    		{	$name=$row['name'];
    			$president=$row['presidentid'];
   		 		echo "<input type='hidden' name='registerno' value=".$row['registerno'].">
   		 		<tr> <td>".$row['registerno']."</td>
        		<td><input type='text' name='name' pattern='[A-Za-z]+\s[A-Za-z]+' title='Only alphabets allowed' value='$name'> </td>
        		<td><input type='email' name='emailid' value=". $row["emailid"]. "></td>
        		<td><input type='text' name='joindate' pattern='[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])' id='datepicker' title='Enter Date in YYYY-MM-DD format' required value=" . $row["joindate"]. "></td>
        		<td><input type='text' placeholder='Academic Grade Point' name='agp' required pattern='[0-9]{2}' title='Enter 2 digit Academic Grade Point' value=".$row['AGP']."> </td>
				<td><input type='text' placeholder='Co-Curricular Grade Point' name='ccgp' required pattern='[0-9]{2}' title='Enter 2 digit Co-Curricular Grade Point' value=".$row['CCGP']."> </td>
			
        		<td> <input type='submit' value='Save'></td>	
        		</tr> </br>";
	  		}
	  	
	  		echo "</table class='data'>";
		}	 

		else
 		{
    		echo "0 results";
		}

	?>
	</form>
	</body>
	</html>