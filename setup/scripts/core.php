<?php

include("../../includes/cfg_ini.class.php");
$cfg=new ini();
include("../../includes/log.class.php");
$log=new log();

$cfg->add('../../includes/cfg.ini', 'core', 'title', $_POST['title']);
$log->admin_action(1, 'Set core value: title: '.$_POST['title']);

$status=fopen("../status.php",'w');
fwrite($status,'<?php $status=3 ?>');
fclose($status);
header("location:../../admin/index.php");

?>