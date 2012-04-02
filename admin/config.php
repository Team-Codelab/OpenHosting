<?php

$admin_user=$_COOKIE["admin_user"];
$admin_auth=$_COOKIE["admin_auth"];

if($admin_user==null || $admin_auth==null) print_login();
else{
	include("../includes/user.class.php");
	$admin = new user();
	if($admin->admin_auth($admin_user, $admin_auth)==false) print_login();
}
function print_login(){
	$nomenu=1; include("../includes/header.php");
	echo("<div style='width:100%;height:100%;'>
		<div><h3>Admin Logon</h3><form method='post' action='scripts/login.php'>
			Username: <input type='text' name='admin_user'><br>
			Password: <input type='password' name='admin_pass'><br>
			<input type='submit' value='Log me in'>
		</form></div>
	</div>");
	exit();
}
$nomenu=1; include("../includes/header.php");
echo("testing...................");

?>