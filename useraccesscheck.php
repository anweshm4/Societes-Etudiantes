<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
//echo"Connection Established";
$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
//echo'<br>'."Connection To Database Established"."<br>";


sec_session_start();
$username=$_SESSION['username'];

$sql="SELECT useraccess from user where username like '$username'";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result))
    {
    	$useraccess=$row['useraccess'];
    }

if (login_check($mysqli) == true)
{
	if($useraccess=="admin")
    	include "adminnav.php";

	else if($useraccess=="student")
	{
    	include "studentnav.php";
	}
	else if($useraccess=="mentor")
	{
    	include "mentornav.php";
	}
	else
		header('Location:login');
}
else
	header('Location:loginerror');
?>