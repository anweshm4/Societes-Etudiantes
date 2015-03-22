<?php
include "guestnav.php";
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta charset="utf-8">
		<link href="css/loginform.css" rel='stylesheet' type='text/css' />
			<link rel="stylesheet" href="css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		
	
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
		<script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
</head>
<body>
 <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 

	 <!-----start-main---->
	 <div class="main">
		<div class="login-form">
			<h1>Login</h1>
					<div class="head">
						<img src="images/user.png" alt=""/>
					</div>
				<form action='includes/process_login.php' method='POST' name='login_form'>
						<input type="text" name='email' id='email' placeholder='Email - ID'>
						<input type="password" name="password" id='password' placeholder='password'>
						<div class="submit">
							<input type="button" id='submitbutton' onclick="regformhash(this.form, this.form.email,this.form.password);"  value="LOGIN" >
					</div>	
					<p><a href="#">Forgot Password ?</a></p>
				</form>
			 <!-----//end-main---->
	
</body>
</html>