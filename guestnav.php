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
	    	<li><a href='championshiptable'> Championship </a> </li>
	    	<li><a href="events">Events</a></li>
		</ul>
	</div>
</div>
<br>
<hr>

