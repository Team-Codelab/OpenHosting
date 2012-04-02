<?php

//// Auth module for admins.
//// We dont redirect to a login page so that we can use http headers to redirect to the desired page.


$admin_user=$_COOKIE["admin_user"];
$admin_auth=$_COOKIE["admin_auth"];
include("../includes/user.class.php");

if($admin_user==null || $admin_auth==null) print_login();
else{
	$admin = new user();
	if($admin->admin_auth($admin_user, $admin_auth)==false) print_login();
}
function print_login(){
	$nomenu=1; include("../includes/header.php");
	echo("<div style='width:100%;height:100%;'>
		<div style='margin-right: auto; margin-left: auto; border: 1px dotted; width:300px; height:300px; top: 50%;'>
			<div><img src='../../images/banner.jpg' width=256 height=64></div>
			<div style='margin-right: auto; margin-left: auto;'>
				<h3>Admin Logon</h3><form method='post' action='scripts/login.php'>
				Username: <input type='text' name='admin_user'><br>
				Password: <input type='password' name='admin_pass'><p>
				<input type='submit' value='Log me in'>
			</div>
		</form></div>
	</div>");
	exit();
}
?>