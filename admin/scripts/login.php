<?php

$user=$_POST['admin_user'];
$pass=$_POST['admin_pass'];
if($_COOKIE['admin_user']!=null) header("location:index.php");
elseif($user=="" || $pass=="") header("location:index.php");

include("../../includes/user.class.php");
$admin = new user();
if($admin->admin_login(user, $pass)==false) header("location:index.php?E=1");
else{
	setcookie('admin_user',$user,'','/','hosting.zarkov.net');
	setcookie('admin_user',$user,'','/','hosting.zarkov.net');
	header($_SERVER['HTTP_REFERER']);
}

?>