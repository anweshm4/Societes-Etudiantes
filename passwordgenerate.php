<head>
<script src="js/sha512.js"></script>

<body>

<?php

$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";

$sql="SELECT id, username from user where id>5";
$result=mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result))
{
	echo $username=$row['username'];
	echo "<br>";
	echo $id=$row['id'];
	echo "<br>";
	echo $username= preg_replace('/\s+/', '', $username);
	echo "<br>";
	echo $username=strtolower($username);
	echo "<br>";
	echo $password = hash('sha512', $username);
	echo "<br>";
	echo strlen($password);
	echo "<br>";
	echo $password= preg_replace('/\s+/', '', $password);
	echo "<br>";
	echo strlen($password);
	echo "<br>";
	echo $password = hash('sha512', $password . 'f9aab579fc1b41ed0c44fe4ecdbfcdb4cb99b9023abb241a6db833288f4eea3c02f76e0d35204a8695077dcf81932aa59006423976224be0390395bae152d4ef');
	echo "<br>";
	echo strlen($password);
	echo "<br>";
	echo $password= preg_replace('/\s+/', '', $password);
	echo "<br>";
	echo strlen($password);
	echo "<br>";
	$query="UPDATE user set password='$password' where id=$id";
	$res=mysqli_query($con, $query);
    echo "<hr>";   
}

   		 
