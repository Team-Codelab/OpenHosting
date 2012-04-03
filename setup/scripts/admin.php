<?php

include("../../includes/cfg_ini.class.php");
$mysql=parse_ini_file("../../includes/cfg.ini",true);
mysql_connect($c["mysql"]["server"],$c["mysql"]["user"],$c["mysql"]["pass"]);
mysql_select_db($c["mysql"]["database"]);

$pass=$_POST['pass'];
$pass_enc=sha1(mysql_real_escape_string($pass."pyrosine"));
$email=mysql_real_escape_string($_POST['email']);
$auth=md5(time());

$cfg = new ini();
$cfg->add('root', 'pass', $pass_enc);
$cfg->add('root', 'email', $email);

mysql_query("insert into admins (user,pass,auth,email,level) values ('root','$pass_enc','$auth','$email',5)");
include("../../includes/log.class.php");
$log = new log();
$log->admin_action(mysql_insert_id(),null,'Registration');



header("location:../../setup/index.php");

?>