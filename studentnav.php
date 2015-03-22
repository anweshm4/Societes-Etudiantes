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

	    	<li><a href="#">View </a>
	        	<ul class="submenu">
	      			<li><a href="ownclub.php">Your Club </a></li>  	
	            	<li><a href="clubs">Other Clubs </a></li>
	            	<li><a href="championshiptable">Championship </a></li>
	  	        </ul>
	    	</li>
	    	<li><a href="changeclub">Change Club </a>
	    	<li><a href="events">Events  </a>
	        
	    	
	    	<?php
	    	    if (login_check($mysqli) == true) {
	    	    	$username=$_SESSION['username'];
					echo "<li><a href='includes/logout.php'>  Logout </a> </li>";
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

