<?php

$user=$_POST['user'];
$pass=$_POST['pass'];
if($_COOKIE['user']!=null) header("location:index.php");
elseif($user=="" || $pass=="") header("location:index.php");

include("../../includes/user.class.php");
$admin = new user();
if($admin->admin_login($user, $pass)==false) header("location:index.php?E=1");
else{
	setcookie('user',$user,'','/','hosting.zarkov.net');
	setcookie('user',$user,'','/','hosting.zarkov.net');
	header($_SERVER['HTTP_REFERER']);
}

?>