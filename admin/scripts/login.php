<?php

$user=$_POST['admin_user'];
$pass=$_POST['admin_pass'];
if($_COOKIE['admin_user']!=null) header("location:../index.php");
elseif($user=="" || $pass=="") header("location:../index.php");


include("../../includes/log.class.php");
$log = new log();
include("../../includes/user.class.php");
$admin = new user();
if($admin->admin_login($user, $pass)==false) header("location:../index.php?E=1");
else{
	setcookie("admin_user",$user,1000000000,'/');
	setcookie("admin_auth",$admin->admin_auth_gen($user),1000000000,'/');
	$log->admin_action($admin->admin_uid($user),'Login');
	
	header($_SERVER['HTTP_REFERER']);
}

?>