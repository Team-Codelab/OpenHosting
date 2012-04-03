<?php

$user=$_POST['user'];
$pass=$_POST['pass'];
if($_COOKIE['user']!=null) header("location:index.php");
elseif($user=="" || $pass=="") header("location:index.php");

include("../../includes/user.class.php");
$user = new user();
if($user->login($user, $pass)==false) header("location:index.php?E=1");
else{
	setcookie("user",$user,1000000000,'/');
	setcookie("auth",$user->auth_gen($user),1000000000,'/');
	$log->action($user->uid($user),'Login');
	
	header("location:".$_SERVER['HTTP_REFERER']);
}

?>