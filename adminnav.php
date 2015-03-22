<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>

<div class="top">
	<div class="header">
		<span> Soci&eacute;t&eacute;s &eacute;tudiantes </span>
	</div>

	<div class="nav">

		<ul class="menu">
	    	<li><a href="home">Home</a></li>

	    	<li class="active"><a href="#">Create</a>
	        	<ul class="submenu">
	            	<li><a href="createstudent">Student</a></li>
	            	<li><a href="creatementor">Mentor</a></li>
	            	<li><a href="createclub">Club</a></li>
					<li><a href="createsession">Session</a></li>
					<li><a href="createevent">Event</a></li>
					
	        	</ul>
	    	</li>

	    	<li><a href="#">View </a>
	        	<ul class="submenu">
	            	<li><a href="viewstudent">Students </a></li>
	            	<li><a href="viewpresident">Presidents </a></li>
	            	<li><a href="viewmentor">Mentors </a></li>
					<li><a href="viewguestlecturer">Guest Lecturers </a></li>
	            	<li><a href="viewclub">Clubs</a></li>
					<li><a href="viewsession">Sessions</a></li>
					<li><a href="viewevent">Events</a></li>
	            	<li><a href="championshiptable">Championship </a></li>

	        	</ul>
	    	</li>

	    	
	    	<?php
	    	    if (login_check($mysqli) == true) {
	    	    	$username=$_SESSION['username'];
					echo "<li><a href='includes/logout.php'> $username - Logout </a> </li>";
        		} 

        		else {
                    echo "<li><a href='login'> Login </a> </li>";
                }
			?> 

	    	
		</ul>
	</div>
</div>
<br>
<hr>

