<?php

$pass=$_POST['pass'];
$pass_enc=sha1(mysql_real_escape_string($pass."pyrosine"));
$email=mysql_real_escape_string($_POST['email']);
$auth=md5(time());

include("../../includes/cfg_ini.class.php");
$cfg = new ini();
$cfg->add('root', 'pass', $pass_enc);

$mysql=$cfg->get("mysql");
mysql_connect($mysql[server],$mysql[user],$mysql[pass]);
mysql_select_db($mysql[database]);

mysql_query("insert into admins (user,pass,auth,email,level) values ('root','$pass_enc','$auth','$email',5)");
include("../../includes/log.class.php");
$log = new log();
$log->admin_action(mysql_insert_id(),null,'Registration');



header("location:../../admin/scripts/finish_setup.php");

?>