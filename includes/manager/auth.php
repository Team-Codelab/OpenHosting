<?php

//// Auth module for the manager.
//// We dont redirect to a login page so that we can use http headers to redirect to the desired page.

$user=$_COOKIE["user"];
$auth=$_COOKIE["auth"];
include("../includes/user.class.php");

if($user==null || $auth==null) print_login();
else{
	$user = new user();
	if($user->auth($user, $auth)==false) print_login();
}
function print_login(){
	$nomenu=1; include("../includes/header.php");
	echo("<div style='width:100%;height:100%;'>
		<div><h3>Logon</h3><form method='post' action='scripts/login.php'>
			Username: <input type='text' name='admin_user'><br>
			Password: <input type='password' name='admin_pass'><br>
			<input type='submit' value='Log me in'>
		</form></div>
	</div>");
	exit();
}
?>