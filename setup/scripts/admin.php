<?php

$pass=$_POST['pass'];
$pass_enc=sha1(mysql_real_escape_string($pass."pyrosine"));
$email=mysql_real_escape_string($_POST['email']);
$auth=md5(time());

include("../../includes/cfg_ini.class.php");
$cfg = new ini();
$cfg->add('root', 'pass', $pass_enc);

$mysql=parse_ini_file("/home/site/main/~pyros/OpenHosting/includes/cfg.ini",true);
mysql_connect($mysql[mysql][server],$mysql[mysql][user],$mysql[mysql][pass]);
mysql_select_db($mysql[mysql][database]);

mysql_query("insert into admins (user,pass,auth,email,level) values ('root',$pass,$auth,$email,5)");
include("../../includes/log.class.php");
$log = new log();
$log->admin_action(mysql_insert_id(),null,'Registration');



header("location:../../admin/scripts/finish_setup.php");

?>