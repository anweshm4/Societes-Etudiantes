<?php
	$con=mysqli_connect("localhost","root","") or die("not connected");
	echo"Connection Established";
	$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
	echo'<br>'."Connection To Database Established"."<br>";


  	$delete_id = $_GET['id'];
	$sql="DELETE FROM student WHERE registerno=".$delete_id;
	$result=mysqli_query($con, $sql);
	header('Location: viewrecord.php');
?>