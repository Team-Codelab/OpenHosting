<?php

$pass=$_POST['pass'];
$pass_enc=sha1(mysql_real_escape_string($pass."pyrosine"));
$email=mysql_real_escape_string($_POST['email']);
$auth=md5(time());

mysql_query("insert into admins (user,pass,auth,email,level) values ('root',$pass,$auth,$email,5)");
include("../../includes/log.class.php");
$log = new log();
$log->admin_action(mysql_insert_id(),null,'Registration');
include("../../includes/ini.class.php");



header("../../admin/scripts/finish_setup.php");

?>