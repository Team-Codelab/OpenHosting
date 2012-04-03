<?php

include("../../includes/cfg_ini.class.php");
$c=parse_ini_file("../../includes/cfg.ini",true);
mysql_connect($c["mysql"]["server"],$c["mysql"]["user"],$c["mysql"]["pass"]);
mysql_select_db($c["mysql"]["database"]);

$pass=$_POST['pass'];
$pass_enc=sha1(mysql_real_escape_string($pass."pyrosine"));
$email=mysql_real_escape_string($_POST['email']);
$auth=md5(time());

$cfg = new ini();
$cfg->add('../../includes/cfg.ini', 'root', 'pass', $pass_enc);
$cfg->add('../../includes/cfg.ini', 'root', 'email', $email);

mysql_query("insert into admins (user,pass,auth,email,level) values ('root','$pass_enc','$auth','$email',5)");
$uid=mysql_insert_id();

include("../../includes/log.class.php");
$log = new log();
$log->admin_action($uid,'Registration');

$status=fopen("../status.php",'w');
fwrite($status,'<?php $status=2 ?>');
fclose($status);
header("location:../index.php");

?>